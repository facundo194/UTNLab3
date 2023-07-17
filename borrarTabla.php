<?php

    require('conexion.php');

    $sql = "TRUNCATE articulos";
    $stmt= $dbh->prepare($sql);
    $stmt->execute();

    $sql = "TRUNCATE familias";
    $stmt= $dbh->prepare($sql);
    $stmt->execute();

    $dbh= null;

?>