<?php
/**
 * @ Author: Jaime Dev
 * @ Create Time: 07-10-2020
 * @ Modified time: 11-10-20 / 00:36:40
 * @ Description: Classe modelo Funcionario
 */

 Class Funcionario {

    private $id;
    private $nome;
    private $email;
    private $telefone;
    private $url;
    
    public function __construct(){
        $this->id = 0;
        $this->nome = 'Guest';
        $this->Email = null;
        $this->telefone = null;
        $this->url = null;
    }
    /**
     *  Setter todos os Dados s/ id
     */
    public function setAll ($nome, $email, $telefone,$url){
        $this->nome = $nome;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->url = $url;
    }
    /**
     *  Setter todos os dados + id
     */
    public function setCampos ($nome, $email, $telefone,$url,$id){
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->url = $url;
    }
    /**
     * Setter / Setter 
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
    /**
     *  Metodo que imprime o Objeto/toString
     */
	public function getObject(){
        
        echo "Cod:".$this->id
            ."\n"
            ."Nome:".$this->nome
            ."\n".
            "Email:".$this->email
            ."\n".
            "Telefone:".$this->telefone
            ."\n".
            "Image:"./* implode("",$this->url). */"\n"; 
    }
 } 
?>

