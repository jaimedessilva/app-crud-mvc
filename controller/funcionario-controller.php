<?php

include '../model/funcionario.php';
include '../model/dao.php';
include ("resize-class.php");

/**
 * @ Author: Jaime Dev
 * @ Create Time: 07-10-2020
 * @ Modified time: 07-10-20 / 03:18:39
 * @ Description: controle de fluxos das operações CRUD
 */

/**---------------------------------------------------------
 *    METODO PARA ADICIONAR FUNCIONARIO
 *    SALVA DADOS NO BANCO  TB_FUNCIONARIO
 *----------------------------------------------------------*/
    if (isset($_POST['cadastrar'])) {
    //Cadastrar novo Funcionario

    //Instancia Objetos
    $func = new Funcionario();
    $dao = new Dao ();
    
    //Recebe dados do formulário
    $nome   = $_POST['nome'];
	$email = $_POST['email'];
    $telefone  = $_POST['telefone'];
    $url = $_FILES['url'];

  
    //File Upload
    $caminho = "../repositorio/"; //define o diretorio para onde enviaremos o arquivo
    $extensao = strtolower(substr($_FILES['url']['name'], -4)); //pega a extensao do arquivo
    $novo_nome = md5(time()) . $extensao; //define o nome do arquivo

    //Salva no diretório
    move_uploaded_file($_FILES['url']['tmp_name'], $caminho.$novo_nome); //efetua o upload

    //nome
    $url_img = $caminho.$novo_nome;

    $resize = new resize($url_img);
    $resize->resizeImage(400,300, 'auto');
    $resize->saveImage($url_img,100);

    //Salvar no Banco
    $func->setAll($nome,$email,$telefone,$novo_nome);
    //Metodo Dao
    $dao->save($func);
     
} 
/**---------------------------------------------------------
 *    METODO PARA ATUALIZAR FUNCIONARIO
 *    SALVA DADOS NO BANCO  TB_FUNCIONARIO
 *----------------------------------------------------------*/
    if (isset($_POST['salvar'])){
    //Atualizar Dados
    echo "Atalizar \n";

    //Instancia Objetos
    $func = new Funcionario();
    $dao = new Dao ();
    
    //Recebe dados do formulário
    $id = $_POST['id'];
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
   $url_img = $caminho.$novo_nome;
   //Resize Imagem
   $resize = new resize($url_img);
   $resize->resizeImage(350,200, 'auto');
   $resize->saveImage($url_img,100);

    //Atualizar no Banco
    $func->setCampos($nome,$email,$telefone,$novo_nome,$id);
    //Metodo Dao
    $dao->update($func);
    
}
/**---------------------------------------------------------
 *    METODO PARA ADICIONAR NOVO TELEFONE
 *    SALVA DADOS NO BANCO 
 *----------------------------------------------------------*/

  if (isset($_POST['adicionar'])){
    //Adicionar novo Telefone
    echo "Adicionar novo numero \n";
    
    //Recebe dados do form
    $id   = $_POST['id'];
    $telefone1  = $_POST['novo'];

    $dao = new Dao();
    $dao->addTelefone($id, $telefone1);
    
  }
else {
    echo "Nenhuma ação executada";
}

?>
