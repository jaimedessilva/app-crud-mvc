<?php

include '../model/funcionario.php';
include '../model/dao.php';
include 'resize-class.php';

/**
 * @ Author: Jaime Dev
 * @ Create Time: 07-10-2020
 * @ Modified time: 07-10-20 / 03:18:39
 * @ Description:
 */
if (isset($_POST['cadastrar'])) {
   
    //Objetos
    $func = new Funcionario();
    $dao = new Dao ();
    
    //Request
    $nome   = $_POST['nome'];
	$email = $_POST['email'];
    $telefone  = $_POST['telefone'];
    $url = $_FILES['url'];

  
    //File Upload
    $caminho = "../repositorio/"; //define o diretorio para onde enviaremos o arquivo
    $extensao = strtolower(substr($_FILES['url']['name'], -4)); //pega a extensao do arquivo
    $novo_nome = md5(time()) . $extensao; //define o nome do arquivo

    //Upload de Imagem
    move_uploaded_file($_FILES['url']['tmp_name'], $caminho.$novo_nome); //efetua o upload

     //Caminho completo
     $url_img = $novo_nome;

    $resize = new resize($url_img);
    $resize->resizeImage(400,300, 'auto');
    $resize->saveImage($url_img,100);

    //Insert
    $func->setAll($nome,$email,$telefone,$url_img);
    $dao->save($func);
    //$dao->add($func); 
} if (isset($_POST['salvar'])){
    echo "banana";
}
else {
    echo "Nenhuma ação executada";
}

?>
