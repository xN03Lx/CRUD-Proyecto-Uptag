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
			$this->pdo = Database::StartUp();     
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

    public function eliminar(int $id){
        try{
            $stm = $this->pdo->prepare("DELETE FROM :table WHERE id = :id");
            $stm->bindParam(":table", $this->getTable(), PDO::PARAM_STR);
            $stm->bindParam(":id", $id, PDO::PARAM_INT);
            return $stm->execute();

        }
        catch(Exception $e){
            die($e->getMessage());
        }

    }

    public function actualizar(int $id){
        try {
            
            $sql = "UPDATE";
            $sql .= $this->getTable();
            $sql .= " SET ";


            foreach ($this->atributos as $clave => $valor){

                $sql .= $clave." = ";
                $sql .= $valor.",";
            }
            $sql = rtrim($sql, ",");
            $sql .= " WHERE id= ".$id;

            $this->pdo->prepare($sql)->execute();
        
        } catch (Exception $e) {
            die($e->getMessage());
        }

    }

    public function obtener(int $id){
        try{
            $stm = $this->pdo->prepare("SELECT * FROM :table WHERE id = :id");
            $stm->bindParam(":table", $this->getTable(), PDO::PARAM_STR);
            $stm->bindParam(":id", $id, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_OBJ);

        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
}