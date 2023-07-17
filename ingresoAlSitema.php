<?php 

session_start();

if (isset($_POST['nombre'])){

    $logNombre =$_POST['nombre'];
    $logClave =$_POST['clave'];
    require('conexion.php');
    $registrado= false;
    $sql= "select * from usuarios where nombre='$logNombre' and password ='$logClave'";
    $stmt= $dbh->prepare($sql);
    $stmt->execute();

    while ($fila = $stmt->fetch()){
        if (($fila['nombre'] == $logNombre) )  { // & (isset($_SESSION['idEjer14Session'])
            $valor= $fila['numeroSesiones'];
            //echo $valor;
            $registrado= true;  
            $_SESSION['idEjer14Session'] = session_id();//session_create_id();
            $_SESSION['login'] = $logNombre;
            $_SESSION['numeroSesion'] = $valor;
        }
        
    }
    $valor++;
    $sql = "update usuarios set numeroSesiones='$valor' where nombre='$logNombre'";
    $stmt= $dbh->prepare($sql);
    $stmt->execute();
    }




if (isset($_SESSION['idEjer14Session'])) { // ESto lo pongo aca por si abro una nueva ventana de ingresarAlSitema.php
    echo '<h2> Informacion de sesion:</h2>';
    echo '<h3> Numero de sesion: '. $_SESSION['numeroSesion'] . "</h3>" ;
    echo '<h3> Identificativo de sesion: '.$_SESSION['idEjer14Session']. "</h3>" ;
    echo '<h3> Login: '. $_SESSION['login'] . "</h3>" ;
    // echo '<p> <a href="./app_modulo1" target="blank">Ingrese a la aplicacion </a> </p>';
    echo "<p> <button onClick=\"location.href='./app_modulo1'\"> Ingrese a la aplicacion </button> </p>";
    echo "<p> <button onClick=\"location.href='./destruirSesion.php'\">Terminar sesion </button> </p>";
}

if (!isset($_SESSION['idEjer14Session']) && !isset($_POST['nombre'])) {
     header('Location:./formularioDeLogin.html');
     exit();
}

if (!isset($_SESSION['idEjer14Session'])) {
    header('Location:./formularioDeLogin.html');
    exit();
}




?>

