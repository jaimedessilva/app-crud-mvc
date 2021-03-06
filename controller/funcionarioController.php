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
    
    public static function buscar($id){
        $dao = Dao::find($id);
        $f = $dao;

        return $f;     
    }
    /**
     *  Listar Funcionario
     */
    public static function listar(){ 
      //Recebe Array
      $dao = Dao::list();
      //Object recebe array
      $funcionario = $dao;
        //Percorre o Array
        foreach ($funcionario as $f){
        //Monta a Tabela
        echo "<td>".$f['id']."</td>";
        echo "<td>"."<a href="."form-id.php?id=".$f['id'].">".
                    "<img class='avatar' src='./repositorio/"
                       .$f['url_img']."'>"."</td>";
            echo "<td>".$f['nome']."</td>";
            echo "<td>".$f['email']."</td>";
            echo "<td>".$f['telefone']."</td>";
            echo "<td>".$f['numero']."</td>";
            echo "<td><a href='form-edit.php?id=".$f['id']
                            ."&nome=".$f['nome']
                            ."&url=repositorio/".$f['url_img']
                            ."&email=".$f['email']
                            ."&telefone=".$f['telefone']."'>
            
            <i style='font-size:24px; color: #49b675' class='fa'>&#xf044;</i>
            </a></td>";
            echo "<td><a href='form-phone.php?id=".$f['id']
                            ."&nome=".$f['nome']
                            ."&telefone=".$f['telefone']."'>
            <i style='font-size:24px; color: #31639c;' class='fa fa-phone' aria-hidden='true'></i>
            </a></td>";
            echo "<td><a href='confirm-del.php?id=".$f['id']."&&nome=".$f['nome']."'>
            <i style='font-size:24px; color: red;' class='glyphicon'>&#xe020;</i>
            </a></td><tr>";
            
            }
           
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
     *  Alterar sem Foto
     */
    public function alterar(){
      
        $func = new Funcionario();
        $dao = new Dao ();
        
        //Post
        $id = $_POST['id'];
        $nome   = $_POST['nome'];
        $email = $_POST['email'];
        $telefone  = $_POST['telefone'];
        
        //Dados
        $func->setId($id);
        $func->setNome($nome);
        $func->setEmail($email);
        $func->setTelefone($telefone);

        //Update DB
        $dao->update($func);
        
    }
    /**
     * Alterar dados com foto
     */
    public function alterarDados (){
        
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
        $resize->resizeImage(400,300, 'auto');
        $resize->saveImage($url_img,100);
    
        //Set Campos
        $func->setCampos($nome,$email,$telefone,$novo_nome,$id);
        //Update DB
        $dao->updateFoto($func);
    }
    /**
     *  Excluir
     */
    public function remover (){
      
        $id = $_GET['id'];
        
        $dao = new Dao ();
        $dao->remove($id);
        echo "<h2><a href='../view/index.php'>Voltar</a></h2><br>";
    
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
 //$f = FuncionarioController::buscar(3);
 ?>
