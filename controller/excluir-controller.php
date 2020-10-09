<?php

include '../model/dao.php';

/**
 * @ Author: Jaime Dev
 * @ Create Time: 08-10-2020
 * @ Modified time: 08-10-20 / 15:35:23
 * @ Description:
 */

/**---------------------------------------------------------
 *    METODO PARA ATUALIZAR FUNCIONARIO
 *    SALVA DADOS NO BANCO  
 *----------------------------------------------------------*/

$id = $_GET['id'];

//Implementa o metodo Dao Excluir
$dao = new Dao ();
$dao->remove($id);
echo "<a href='../index.php'>Voltar</a>";

?>