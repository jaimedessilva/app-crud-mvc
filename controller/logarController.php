<?php

/**
 * @ Author: Jaime Dev
 * @ Create Time: 09-10-2020
 * @ Modified time: 09-10-20 / 16:50:10
 * @ Description: Controller Login **/

Class Logar {

    public function autenticar(){
        
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        
        $u = 'user';
        $p = '123';

        if ($user == $u && $pass == $p){
            header("Location: ../view/index.php");
        }else {
            echo "<h2 style='color: red;'>Credenciais Inválidas</h2>";
            echo "<a href='../view/login.html'>Voltar</a>";
        }

    }
}
?>