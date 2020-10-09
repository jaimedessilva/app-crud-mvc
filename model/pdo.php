<?php

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
    public static function pdo() {
        
        if (!isset(self::$instance)) {
            try{
                self::$instance = new PDO('mysql:host=localhost; dbname=db_app', 'root', '');
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

}
//Testa
//$pdo = Conexao::pdo();
?>