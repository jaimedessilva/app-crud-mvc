<?php 

include '../db/pdo.php';

/**
 * @ Author: Jaime Dev
 * @ Create Time: 07-10-2020
 * @ Modified time: 07-10-20 / 03:59:17
 * @ Description: Classe de Acesso a Dados DAO
 * e executa as operações de CRUD
 */
 
 class Dao {

    /**
     * Tabelas Banco de Dados
     */
    public static $funcionario ="tb_funcionario";
    public static $telefones ="tb_telefones";
    /**
     *  Listar Funcionarios
     */
    public static function list (){
        //List
        $conn = Conexao::connect();
        $query = "SELECT id,url_img,nome,email,telefone,b.numero  FROM ". self::$funcionario." a 
        LEFT JOIN tb_telefones b on a.id = b.id_funcionario GROUP BY id order by id LIMIT 50";
        
        $rs = $conn->query($query);
        while($linha = $rs->fetch_assoc()){
            echo "<td>".$linha['id']."</td>";
            echo "<td>"."<a href="."repositorio/".$linha['url_img'].">"."<img class='avatar' src='./repositorio/"
            .$linha['url_img']."'>"."</td>";
            echo "<td>".$linha['nome']."</td>";
            echo "<td>".$linha['email']."</td>";
            echo "<td>".$linha['telefone']."</td>";
            echo "<td>".$linha['numero']."</td>";
            echo "<td><a href='form-edit.php?id=".$linha['id']
                           ."&nome=".$linha['nome']
                           ."&url=repositorio/".$linha['url_img']
                           ."&email=".$linha['email']
                           ."&telefone=".$linha['telefone']."'>
            
            <i style='font-size:24px' class='fa'>&#xf044;</i>
            </a></td>";
            echo "<td><a href='form-phone.php?id=".$linha['id']
                            ."&nome=".$linha['nome']
                            ."&telefone=".$linha['telefone']."'>
            <i style='font-size:24px' class='fa fa-phone' aria-hidden='true'></i>
            </a></td>";
            echo "<td><a href='../controller/request.php?id=".$linha['id']."'>
            <i style='font-size:24px' class='glyphicon'>&#xe020;</i>
            </a></td></tr>"; 
               
        }
    }
    /**
     *  Cadastrar Funcionários
     */
    public function save(Funcionario $obj){
        //salvar
        $pdo = Conexao::pdo();

        try {
            $query = "INSERT INTO ". self::$funcionario."
            (nome,email,telefone,url_img) 
            VALUES (?,?,?,?)";

            $st = $pdo->prepare($query);
            $st->bindValue(1,$obj->getNome());
            $st->bindValue(2,$obj->getEmail()); 
            $st->bindValue(3,$obj->getTelefone()); 
            $st->bindValue(4,$obj->getImg());                     
            if ($st->execute ()){
                echo "Funcionario Cadastrado com Sucesso!";
                header("Location: ../view/index.php");
            }else {
                echo "Ops... parece que não deu bom...";
                }   
            
        }catch (Exception $e){
            echo "Ops... Não foi possível Salvar dados";
        }
        Conexao::close();     
    }
    /**
     *  Atulizar Dados Funcionario
     */
    public function update(Funcionario $obj){
       //atualizar
       $pdo = Conexao::pdo();
       try {
            $query = "UPDATE ". self::$funcionario." 
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
            if ($st->execute ()){
                
                echo "Atalizado com sucesso";
                header("Location: ../view/index.php");
            }else {
                echo "Ops... parece que não deu bom...";
                }       

        } catch (Exception $e){
             echo "Ops... Não foi possível Salvar dados";
            } 
            echo Conexao::close();     
    }
    /**
     *  Adiciona Telefone
     */
    public function addTelefone ($id , $telefone){
        //Adicionar Telefone
         $pdo = Conexao::pdo();
            
             $query = "INSERT INTO ". self::$telefones."
             (id_funcionario,numero) 
             VALUES (?,?)";
             $st = $pdo->prepare($query);
             $st->bindValue(1,$id);
             $st->bindValue(2,$telefone); 
            
             if ($st->execute ()){
                echo "Telefone adicionado com sucesso";
                header("Location: ../view/index.php");
            }else {
                echo "Ops... parece que não deu bom...";
                } 
                Conexao::close();       
    } 
    /**
     *  Metodo Excluir Funcionario
     */
    public function remove ($id){
        //Remover
        $pdo = Conexao::pdo();
        $query = "DELETE FROM ". self::$funcionario." WHERE id = ?";
        $st = $pdo->prepare($query);
        $st->bindValue(1,$id);
        if ($st->execute ()){
            echo "Funcionario Excluido com sucesso";
        }else {
            echo "Ops... parece que não deu bom...";
            }
            Conexao::close(); 
      }
 }//End Class
 //$dao = Dao::list();

?>

