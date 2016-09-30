<?php
    try{
        $pdo = new PDO("mysql:host=mysql.hostinger.com.br;dbname=u692230175_app","u692230175_app1","123456");
    }catch(PDOException $e){
        echo $e->getMessage();
    }
?>