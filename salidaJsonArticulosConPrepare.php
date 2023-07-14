<?php 



    require('conexion.php');




    $orden =$_GET['orden'];
    $f_articulos_codArt =$_GET['f_articulos_codArt'];
    $f_articulos_familia =$_GET['f_articulos_familia'];
   // $f_articulos_descrip =$_GET['f_articulos_descrip'];
    $f_articulos_um =$_GET['f_articulos_um'];  
    $f_articulos_fechaAlta =$_GET['f_articulos_fechaAlta'];
   
                    
    $sql= "select * from articulos where ";   // SELECT * FROM `articulos` WHERE familia LIKE 'AACC'.  // $sql= "select * from $tabla where familia LIKE '$f_articulos_familia'"; Forma en que funcionaba bien    
    $sql= $sql. "codArt LIKE CONCAT('%',:codArt,'%')and ";
    $sql= $sql. "familia LIKE CONCAT('%',:familia,'%')and ";
    //$sql= $sql. "descrip LIKE CONCAT('%',:descrip,'%')and ";
    $sql= $sql. "um LIKE CONCAT('%',:um,'%')and ";
    $sql= $sql. "fechaAlta LIKE CONCAT('%',:fechaAlta,'%')";
    $sql= $sql. "ORDER BY $orden";


    $stmt= $dbh->prepare($sql);
    $stmt->bindParam(':codArt',$f_articulos_codArt);
    $stmt->bindParam(':familia',$f_articulos_familia);
    //$stmt->bindParam(':descrip',$f_articulos_descrip);
    $stmt->bindParam(':um',$f_articulos_um);
    $stmt->bindParam(':fechaAlta',$f_articulos_fechaAlta);
//

    
    
    sleep(1.5);

    $stmt -> setFetchMode(PDO::FETCH_ASSOC);

    $stmt->execute();

    $articulos=[];

    while ($fila = $stmt->fetch()){
        $objArticulo= new stdClass();
        $objArticulo->codArt=$fila['codArt'];
        $objArticulo->familia=$fila['familia'];
      // $objArticulo->descrip=$fila['descrip'];
      $objArticulo->um=$fila['um'];
       $objArticulo->fechaAlta=$fila['fechaAlta'];
        
        
        array_push($articulos,$objArticulo);
    }

    $objArticulos= new stdClass();
    $objArticulos->articulos= $articulos;
    //$objArticulos->cuenta= count($articulos); Esto estaba en el ejemplo pero no hace falta para el ejercicio

    $salidaJson= json_encode($objArticulos);

    $dbh= null;


    echo  $salidaJson;




?>