<?php
/**
 * @ Author: Jaime Dev
 * @ Create Time: 07-10-2020
 * @ Modified time: 07-10-20 / 04:30:28
 * @ Description:
 */

 Class Funcionario {

    private $id;
    private $nome;
    private $email;
    private $telefone;
    private $url;
    
    public function __construct(){
        $this->id = 1;
        $this->nome = null;
        $this->Email = null;
        $this->telefone = null;
        $this->url = null;
    }
    public function setAll ($id,$nome, $email, $telefone,$url){
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->url = $url;
    }
    public function getAll (){
        return $this->id. 
                $this->nome. 
                $this->email. 
                $this->telefone. 
                $this->url;
    }
    /**
     * Setter
     */
	public function setId($string){
        $this->id = $string;
    }
    public function setNome($string){
        $this->nome = $string;
    }
    public function setEmail($string){
        $this->email = $string;
    }
    public function setTelefone($string){
        $this->telefone = $string;
    }
    public function setImg($string){
        $this->url = $string;
    }
    /**
     * Getter
     */
    public function getId (){
        return $this->id;
    }
    public function getNome (){
        return $this->nome;
    }
    public function getEmail (){
        return $this->email;
    }
    public function getTelefone (){
        return $this->telefone;
    }
    public function getImg (){
        return $this->url;
    }
	public function getObject(){
        
        echo "Cod:".$this->id
            ."\n"
            ."Nome:".$this->nome
            ."\n".
            "Email:".$this->email
            ."\n".
            "Telefone:".$this->telefone
            ."\n".
            "Image:".$this->url; 
    }
 } 
?>

