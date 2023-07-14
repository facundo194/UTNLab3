
<?php 

require('conexion.php');
$codArt =$_POST['codArt'];


$respuesta_estado="Respuesta del servidor al alta. 
entradas recibidas en el req http:";
$respuesta_estado= $respuesta_estado."corArt:".$codArt;

$sql= "delete from articulos where codArt='$codArt'";


$stmt= $dbh->prepare($sql);

$stmt->execute();
$dbh= null;

echo $respuesta_estado;




?>