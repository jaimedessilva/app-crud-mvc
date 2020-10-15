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
        $db = Conexao::connect();
        $query = "SELECT id,
                        url_img,
                        nome,
                        email,
                        telefone,
                        b.numero  
                        FROM ". self::$funcionario." a 
                        LEFT JOIN " . self::$telefones.
                        " b on a.id = b.id_funcionario 
                        GROUP BY id 
                        order by id LIMIT 50";
    
        $rs = $db->query($query);   
        while($f = $rs->fetch_array(MYSQLI_ASSOC)){
            $list[] = $f;
        }
        return $list;
    }
    /**
     *  Get By Id
     */
    public static function find ($id){
        
        $pdo = Conexao::pdo();
        $query = "SELECT 
                    id,
                    url_img,
                    nome,
                    email,
                    telefone,
                    b.numero
                    FROM ". self::$funcionario.
                    " a LEFT JOIN ". self::$telefones.
                    " b ON a.id = b.id_funcionario
                    WHERE id = ?";
        
        $st = $pdo->prepare($query);
        $st->bindValue(1,$id);
        $st->execute(); 
        $array = $st->fetch(PDO::FETCH_ASSOC);
    
        return $array;   
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
                            telefone = ? 
                            WHERE id = ?";
            $st = $pdo->prepare($query);
            $st->bindValue(1,$obj->getNome());
            $st->bindValue(2,$obj->getEmail());
            $st->bindValue(3,$obj->getTelefone());
            $st->bindValue(4,$obj->getId());
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
     * Atualizar dados com Foto
     */
    public function updateFoto(Funcionario $obj){
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
            echo "<h2>Funcionario Excluido com sucesso!</h2>";
        }else {
            echo "Ops... parece que não deu bom...";
            }
            Conexao::close(); 
      }
 }//End Class
 //var_dump ($dao = Dao::find(3));
 

?>

