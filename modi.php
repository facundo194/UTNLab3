
<?php

require('conexion.php');

     $codArt =$_POST['codArt'];
     $familia =$_POST['familia'];
     $um =$_POST['um'];
     $fechaAlta =$_POST['fechaAlta'];
     //$saldoStock =$_POST['saldoStock'];

    $respuesta_estado="Respuesta del servidor a la modificacion:";
    $respuesta_estado= $respuesta_estado."corArt:".$codArt;
    $respuesta_estado= $respuesta_estado."familia:".$familia;

    //update articulos set codArt='DES07',familia='4324' where codArt='DES01'
    $sql = "update articulos set codArt='$codArt',familia='$familia', um= '$um', fechaAlta='$fechaAlta' where codArt='$codArt'";
    //$sql = "insert into articulos(codArt,familia,um,fechaAlta,saldoStock)values(:codArt,:familia,:um,:fechaAlta,:saldoStock);";

    $stmt= $dbh->prepare($sql);

    $stmt->execute();
    $dbh= null;

    echo $respuesta_estado;
?>