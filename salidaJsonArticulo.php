
<?php

require('conexion.php');

$f_articulos_codArt =$_GET['codArt'];
                
$sql= "select * from articulos where codArt = '$f_articulos_codArt'";   // SELECT * FROM `articulos` WHERE familia LIKE 'AACC'.  // $sql= "select * from $tabla where familia LIKE '$f_articulos_familia'"; Forma en que funcionaba bien    



$stmt= $dbh->prepare($sql);
$stmt -> setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();


while ($fila = $stmt->fetch()){
    $objArticulo= new stdClass();
    $objArticulo->codArt=$fila['codArt'];
    $objArticulo->familia=$fila['familia'];
  // $objArticulo->descrip=$fila['descrip'];
    $objArticulo->um=$fila['um'];
    $objArticulo->fechaAlta=$fila['fechaAlta'];
}

$salidaJson= json_encode($objArticulo);

$dbh= null;

echo  $salidaJson;



?>