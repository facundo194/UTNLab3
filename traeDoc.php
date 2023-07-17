<?php include("manejoSesion.inc"); 
require('conexion.php');

    $codArt= $f_articulos_codArt =$_POST['codArt'];
    //echo $codArt;
    $sql="select archivo from articulos where codArt='$codArt'";
    //$query = mysqli_query($conexion, $sql);


    $stmt= $dbh->prepare($sql);
    $stmt -> setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();



    
    while ($fila = $stmt->fetch()){
        $objArticulo= new stdClass();
        //echo $fila['archivo_nombre'];
        //echo $fila['archivo_binario'];
        //$objArticulo->documentoPdf=$fila['archivo_binario'];
       $objArticulo->documentoPdf=base64_encode($fila['archivo']);
      //$objArticulo->documentoPdf="hola";
    }
    
    //s$salidaJson= json_encode($objArticulo);

    $dbh= null;

    //$objArticulo->documentoPdf=base64_encode($fila['archivo_binario']);

    
    $salidaJson= json_encode($objArticulo,JSON_INVALID_UTF8_SUBSTITUTE);

    echo $salidaJson;

?>