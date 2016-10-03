<?php
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=app_teste','root','ROOT');
    }catch(PDOException $e){
        echo $e->getMessage();
    }
?>

