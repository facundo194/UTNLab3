<?php include("manejoSesion.inc");    
require('conexion.php');

$sql= "select * from familias";


sleep(1.5);

$stmt= $dbh->prepare($sql);

$stmt -> setFetchMode(PDO::FETCH_ASSOC);

$stmt->execute();

$familias=[];

while ($fila = $stmt->fetch()){
    $objFamilia= new stdClass();
    $objFamilia->codFamilia=$fila['familia'];
    $objFamilia->descripcionFamilia=$fila['descripcionFamilias'];
    array_push($familias,$objFamilia);
}

$objFamilias= new stdClass();
$objFamilias->familias= $familias;
//$objArticulos->cuenta= count($articulos); Esto estaba en el ejemplo pero no hace falta para el ejercicio

$salidaJson= json_encode($objFamilias);

$dbh= null;

echo $salidaJson;




?>