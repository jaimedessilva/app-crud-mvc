<?php 
/**
 * @ Author: Jaime Dev
 * @ Create Time: 06-10-2020
 * @ Modified time: 07-10-20 / 03:52:21
 * @ Description:
 */
class Conn {

public  $pdo;
    /**
     * Construct
     */
 	public function __construct (){
 		if (!isset($this->pdo)){
 			try{
 			//Conexão PDO
 			$this->pdo = new PDO ('mysql:host=localhost;dbname=db_app','root','');
 			//Tratamento de erros
 			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
			if (isset($this->pdo)){
				echo "...\n";
			}	
 	    }
 		catch (PDOException $e) {
 			echo "? ? ? Erro na conexao PDO:". $e->getMessage ();
 		}
 		     }
 		     return $this->pdo;
 	}
    /**
     * Destruct
     */
    public function __destruct (){
     $this->pdo;
    }
 }
 ?>