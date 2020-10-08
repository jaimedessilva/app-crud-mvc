<?php

/**
 * @ Author: Jaime Dev
 * @ Create Time: 08-10-2020
 * @ Modified time: 08-10-20 / 03:07:51
 * @ Description:
 */

class DB {

public static function connect() {
    
    $mysqli = new mysqli("localhost","root","","db_app");

    if ($mysqli->connect_errno){      
        echo "Ocorreu um erro na conexão com o banco de dados.";
	exit;
    }else {
        echo "...";
        return $mysqli; 
        }      
    }
}
?>