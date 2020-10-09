<?php

require ("../model/funcionario.php");
require_once ("../model/dao.php");
require_once ("resize-class.php");

/**
 * @ Author: Jaime Dev
 * @ Create Time: 09-10-2020
 * @ Modified time: 09-10-20 / 05:32:47
 * @ Description:**/
 
 class FuncionarioController {
    
    /**
     *  Listar Funcionario
     */
    public static function listar(){ 
      
      $lista = Dao::list();
    
    }
    /**
     *  Criar Funcionario
     */
    public function criar(){

        $func = new Funcionario();
        $dao = new Dao ();
        
        //Request
        $nome   = $_POST['nome'];
        $email = $_POST['email'];
        $telefone  = $_POST['telefone'];
        $url = $_FILES['url'];
    
      
        //File Upload
        $caminho = "../view/repositorio/"; //define o diretorio para onde enviaremos o arquivo
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
    /**
     *  Alterar
     */
    public function alterar(){
      
        $func = new Funcionario();
        $dao = new Dao ();
        
        //Post
        $id = $_POST['id'];
        $nome   = $_POST['nome'];
        $email = $_POST['email'];
        $telefone  = $_POST['telefone'];
        $url = $_FILES['url'];
    
        //Diretorio e nome
        $caminho = "../view/repositorio/"; //define o diretorio para onde enviaremos o arquivo
        $extensao = strtolower(substr($_FILES['url']['name'], -4)); //pega a extensao do arquivo
        $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
    
        //Upload
        move_uploaded_file($_FILES['url']['tmp_name'], $caminho.$novo_nome); //efetua o upload
        
        $url_img = $caminho.$novo_nome;
      
        //Resize Imagem
        $resize = new resize($url_img);
        $resize->resizeImage(350,200, 'auto');
        $resize->saveImage($url_img,100);
    
        //Set Campos
        $func->setCampos($nome,$email,$telefone,$novo_nome,$id);
        //Update DB
        $dao->update($func);
        
    }
    /**
     *  Excluir
     */
    public function remover (){
      
        $id = $_GET['id'];
        $dao = new Dao ();
        $dao->remove($id);
        echo "<a href='../view/index.php'>Voltar</a><br>";
    
    }
    /**
     *  Adicionar Telefone
     */
    public function addTel(){
      
        $id   = $_POST['id'];
        $telefone1  = $_POST['novo'];

        $dao = new Dao();
        $dao->addTelefone($id, $telefone1);

    }
 }
 
