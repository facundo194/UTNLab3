<?php


    Session_start();
    if(!isset($_SESSION['identificativoDeSesion'])){
        header('location:./formularioDeLogin.html');
        exit();
    }


?>