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

    public function crear($valores){
        try {
            
            $sql = "INSERT INTO ";
            $sql .= $this->getTable();

            $campos = array();
            $values = array();
            $inconigtos = array();

            foreach ($valores as $clave => $valor){
                $campos[] = $clave;
                $values[] = $valor;
                $inconigtos[] = "?";
            }

            $sql .= " (".join(",",$campos).") VALUES";
            $sql .= " ('".join("','",$inconigtos)."')";

            $this->pdo->prepare($sql)->execute($values);
        
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
}