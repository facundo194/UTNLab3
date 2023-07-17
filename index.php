<?php

   
    Session_start();
    if(!isset($_SESSION['idEjer14Session'])){
        header('location:./formularioDeLogin.html');
        exit();
    }
    else{
        header('location:./ingresoAlSitema.php');
        exit();
    }


?>