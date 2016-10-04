<?php
ob_start();
session_start();


if(isset($_GET['out'])):
    $out  = $_GET['out'];
else:
    $out = NULL;
endif;

if(isset($_SESSION['usuarioSession']) AND $out=='true' OR !isset($_SESSION['usuarioSession']) AND isset($_COOKIE['cookie_pass'])AND isset($_COOKIE['cookie_user']) AND $out=='true'):
    unset($_SESSION["usuarioSession"]);
    session_destroy();
    setcookie("cookie_user","",time() - 1,"/ProjetoApp","localhost","0","0");
    setcookie("cookie_pass","",time() - 1,"/ProjetoApp","localhost","0","0");
    header("Location: ../index.html");
elseif(!isset($_SESSION['usuarioSession']) AND !isset($_COOKIE['cookie_user']) AND !isset($_COOKIE['cookie_pass'])):
    unset($_SESSION["usuarioSession"]);
    session_destroy();
    setcookie("cookie_user","",time()-1);
    setcookie("cookie_pass","",time()-1);
    header("location:cadastro.php");
endif;
?>