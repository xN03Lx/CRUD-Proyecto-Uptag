<?php

require_once('database.php'); 

class BaseModel
{
    private $pdo;

    public $atributos;
    public $tableName;

    public function __construct(){
        $this->atributos = [];
        $this->tableName = "";

        try
		{
			$this->pdo = Database::StartDb();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
    }

    public function getTable(){
        return "";
    }

    public function crear(){
        try {
            
            $sql = "INSERT INTO ";
            $sql .= $this->getTable();

            $campos = array();
            $values = array();
            $inconigtos = array();

            foreach ($this->atributos as $clave => $valor){
                $campos[] = $clave;

                $values[] = $valor;
            }

            $sql .= " (".join(",",$campos).") VALUES";
            $sql .= " ('".join("','",$values)."')";

            $this->pdo->prepare($sql)->execute($this->atributos);
        
        } catch (Exception $e) {
			die($e->getMessage());
		}
    }

    public function listar(){
		try{   
            $sql = "SELECT * FROM ".$this->getTable();

            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            
            return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
    public function eliminar($id){
        try{
            $table = $this->getTable();
            $sql = "DELETE FROM ".$this->getTable();
            $sql .= " WHERE id = ".$id;
            $stm = $this->pdo->prepare($sql);
            return $stm->execute();

        }
        catch(Exception $e){
            die($e->getMessage());
        }

    }

    public function actualizar($id){
        try {        

            $values = array();
            $sql = "UPDATE ";
            $sql .= $this->getTable();
            $sql .= " SET ";
            
            foreach ($this->atributos as $clave => $valor){
                 $values[] = $valor;
                $sql .= $clave." = ";
                $sql .= "?, ";
            }

            $values[] = $id;
            $sql = substr($sql, 0, -2);
            $sql .= " WHERE id = ? ";

            $this->pdo->prepare($sql)->execute($values);

        } catch (Exception $e) {
            die($e->getMessage());
        }

    }

    public function obtener($id){
        $table = $this->getTable();
        try{
            $sql = "SELECT * FROM ";
            $sql .= $table;
            $sql .= " WHERE id = ?";
            $query = $this->pdo->prepare($sql);
            $query->execute(array($id));
            return $query->fetch(PDO::FETCH_OBJ);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
}