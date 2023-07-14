<?php

// para webhost000                                     
$dbname= "id20603786_basedatos1";
$user="id20603786_facundo294";
$password="B/s3d4705";
$host="localhost";



/*
$dbname= "base datos facundo";
$host="localhost";
$user="root";
$password='';

*/
try {
$dsn = "mysql:host=$host;dbname=$dbname";
$dbh= new PDO($dsn, $user,$password);
  //echo "Conexion exitosa";
} catch (PDOException $e) {
   echo $e->getMessage();

}


?>