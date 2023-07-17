<?php include("manejoSesion.inc");
if (isset($_POST['codArt'])){
require('conexion.php');
     $codArt =$_POST['codArt'];
     $familia =$_POST['familia'];
     $um =$_POST['um'];
     $fechaAlta =$_POST['fechaAlta'];
     //$saldoStock =$_POST['saldoStock'];

     $binario_nombre_temporal=$_FILES['documentoPdf']['tmp_name'] ;

     $binario_contenido = addslashes(fread(fopen($binario_nombre_temporal, "rb"), filesize($binario_nombre_temporal)));


    $respuesta_estado="Respuesta del servidor a la modificacion:";
    $respuesta_estado= $respuesta_estado."corArt:".$codArt;
    $respuesta_estado= $respuesta_estado."familia:".$familia;

    //update articulos set codArt='DES07',familia='4324' where codArt='DES01'
    $sql = "update articulos set codArt='$codArt',familia='$familia', um= '$um', fechaAlta='$fechaAlta', archivo='$binario_contenido' where codArt='$codArt'";
    //$sql = "insert into articulos(codArt,familia,um,fechaAlta,saldoStock)values(:codArt,:familia,:um,:fechaAlta,:saldoStock);";

    $stmt= $dbh->prepare($sql);

    $stmt->execute();
    $dbh= null;

    echo $respuesta_estado;
}

else
header('Location:./index.php');
?>