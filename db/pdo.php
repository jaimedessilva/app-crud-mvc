<?php

include 'config.php';
/**
 * @ Author: Jaime Dev
 * @ Create Time: 06-10-2020
 * @ Modified time: 08-10-20 / 19:48:47
 * @ Description: Conexao PDO 
 * possibilitando portabilidade posterior p outro DataBase
 */

 class Conexao {
 
    public static $instance;

    private function __construct() {
        //
    }
    /**
     *  Conexão PDO
     */
    public static function pdo() {
        
        if (!isset(self::$instance)) {
            self::$instance = null;
            try{
                self::$instance = new PDO("mysql:host=".HOST."; dbname=".DB, USER, PASS);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION);
                self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS,
                PDO::NULL_EMPTY_STRING);
                echo "...";
            }catch (PDOException $e) {
                echo "? ? ? Erro na conexao PDO:". $e->getMessage ();
            }  
        }
        return self::$instance;
    }
    public static function close(){
        self::$instance=null;  
    }
    /**
     * Conexao MySQLi
     */
    public static function connect() {
        
        $mysqli = new mysqli(HOST,USER,PASS,DB);
    
        if ($mysqli->connect_errno){      
            echo "Ocorreu um erro na conexão com o banco de dados.";
        exit;
        }else {
            echo "...";
            return $mysqli; 
            }      
        }
}
//Testa
/* $conn = Conexao::connect();
$pdo = Conexao::pdo();
 */

?>