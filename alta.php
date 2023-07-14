<?php
 
     require('conexion.php');

     $codArt =$_POST['codArt'];
     $familia =$_POST['familia'];
     $um =$_POST['um'];
     $fechaAlta =$_POST['fechaAlta'];
     $respuesta_estado = "";

    

    $respuesta_estado="Respuesta del servidor al alta. 
    entradas recibidas en el req http:";
    $respuesta_estado= $respuesta_estado."corArt:".$codArt;
    $respuesta_estado= $respuesta_estado."familia:".$familia;


    $sql = "INSERT INTO articulos VALUES ('$codArt','$familia','$um','$fechaAlta')";
    //$sql = "insert into articulos(codArt,familia,um,fechaAlta,saldoStock)values(:codArt,:familia,:um,:fechaAlta,:saldoStock);";

    $stmt= $dbh->prepare($sql);

    $stmt->execute();
    $dbh= null;

    echo $respuesta_estado;

?>