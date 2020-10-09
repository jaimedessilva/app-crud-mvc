<?php

include 'funcionarioController.php';
include 'logarController.php';
/**
 * @ Author: Jaime Dev
 * @ Create Time: 09-10-2020
 * @ Modified time: 09-10-20 / 06:43:02
 * @ Description: Fluxo de Requisição de Formulario **/

if (isset($_POST['cadastrar'])) {
    
    $controller = new FuncionarioController();
    $controller->criar();
}

if (isset($_POST['salvar'])){
    
    $controller = new FuncionarioController();
    $controller->alterar();
}

if (isset($_POST['adicionar'])){
    
    $controller = new FuncionarioController();
    $controller->addTel();
}
if (isset($_GET['id'])){
    
    $controller = new FuncionarioController();
    $controller->remover ();
}
if (isset($_POST['logar'])){
    
    $logar = new Logar();
    $logar->autenticar();  
}

else {
    echo "......";
}



