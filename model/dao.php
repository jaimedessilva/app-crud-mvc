<?php 

include 'conn.php';
include 'pdo.php';
include 'mysqli.php';

/**
 * @ Author: Jaime Dev
 * @ Create Time: 07-10-2020
 * @ Modified time: 07-10-20 / 03:59:17
 * @ Description: Classe de Acesso a Dados DAO
 */
 class Dao {

    
    public static function list (){
        //List
        $conn = DB::connect();
        $rs = $conn->query("SELECT * FROM db_app.tb_funcionario");
        while($linha = $rs->fetch_assoc()){
            echo "<td>".$linha['id']."</td>";
            echo "<td>"."<img class='avatar' src='./repositorio/"
            .$linha['url_img']."'>"."</td>";
            echo "<td>".$linha['nome']."</td>";
            echo "<td>".$linha['email']."</td>";
            echo "<td>".$linha['telefone']."</td>";
            echo "<td><a href='form-edit.php?id=".$linha['id']
                           ."&nome=".$linha['nome']
                           ."&url=".$linha['url_img']
                           ."&email=".$linha['email']
                           ."&telefone=".$linha['telefone']."'>
            
            <i style='font-size:24px' class='fa'>&#xf044;</i>
            </a></td>";
            echo "<td><a href='recebe.php?id=".$linha['id']."'>
            <i style='font-size:24px' class='glyphicon'>&#xe020;</i>
            </a></td></tr>";  
        }
    }
    public function save(Funcionario $obj){
        //salavar
        $pdo = Conexao::pdo();
        
            $query = "INSERT INTO db_app.tb_funcionario
                            (nome,email,telefone,url_img) 
                            VALUES (?,?,?,?)";
            
            $st = $pdo->prepare($query);
            $st->bindValue(1,$obj->getNome());
            $st->bindValue(2,$obj->getEmail()); 
            $st->bindValue(3,$obj->getTelefone()); 
            $st->bindValue(4,$obj->getImg());                     
            $st->execute ();
            echo "Dados Salvos com sucesso";
       
            header("Location: ../index.php");   
    }
    public function update(Funcionario $obj){
       //atualizar
       $pdo = Conexao::pdo();
            $query = "UPDATE db_app.tb_funcionario 
                            SET nome = ?, 
                            email = ?, 
                            telefone = ?, 
                            url_img = ?
                            WHERE id = ?";
            $st = $pdo->prepare($query);
            $st->bindValue(1,$obj->getNome());
            $st->bindValue(2,$obj->getEmail());
            $st->bindValue(3,$obj->getTelefone());
            $st->bindValue(4,$obj->getImg());
            $st->bindValue(5,$obj->getId());
            $st->execute ();
            echo "Dados Atualizados com sucesso";
    }
    public function remove ($id){
      //Remover
      $conn = DB::connect();

    } 
 }
 $var = new Dao();
 //$var->list();

?>
