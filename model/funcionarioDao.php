<?php 

include 'conn.php';

/**
 * @ Author: Jaime Dev
 * @ Create Time: 07-10-2020
 * @ Modified time: 07-10-20 / 03:59:17
 * @ Description:
 */
 class FuncionarioDao {

    public function add(Funcionario $funcionario){
        $conn = new Conn ();
        $funcionario->getObject();
    }


 }


