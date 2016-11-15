<?php
    function Conexao(){
        try{
        $pdo = new PDO('mysql:host=localhost;dbname=app_teste','root','');
        return $pdo;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
?>

