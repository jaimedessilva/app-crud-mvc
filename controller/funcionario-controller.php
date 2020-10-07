<?php

include '../model/funcionario.php';
include '../model/funcionarioDao.php';

/**
 * @ Author: Jaime Dev
 * @ Create Time: 07-10-2020
 * @ Modified time: 07-10-20 / 03:18:39
 * @ Description:
 */

if (isset($_POST['cadastrar'])) {
   
    //Objetos
    $func = new Funcionario();
    $dao = new FuncionarioDao ();

    //Request
    $nome   = $_POST['nome'];
	$email = $_POST['email'];
    $telefone  = $_POST['telefone'];
    $url = $_POST['url'];
    //Insert
    $func->setAll(1,$nome,$email,$telefone,$url);
    $dao->add($func);
     
}
else {
    echo "Nenhuma ação executada";
}

?>
