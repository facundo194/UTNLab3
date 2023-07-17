<?php include("manejoSesion.inc"); 
session_start(); // Tuve que poner esto para que funcione session_destroy();
session_destroy();

header('Location:./formularioDeLogin.html');


?>