<?php
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=app_teste','root','');
    }catch(PDOException $e){
        echo $e->getMessage();
    }
?>

