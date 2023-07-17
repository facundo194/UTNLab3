<?php
    require('conexion.php');

    $sql = "INSERT INTO articulos VALUES ('DES01','DEST','Atonillador philips','2023/10/06')";
    $stmt= $dbh->prepare($sql);
    $stmt->execute();

    $sql = "INSERT INTO articulos VALUES ('DES02','DEST','Destornillador plano','2023/04/09')";
    $stmt= $dbh->prepare($sql);
    $stmt->execute();

    
    $sql = "INSERT INTO articulos VALUES ('DES03','DEST','ADestornillador Torx','2023/03/11')";
    $stmt= $dbh->prepare($sql);
    $stmt->execute();

    
    $sql = "INSERT INTO articulos VALUES ('DES04','DEST','Destornillador punta magnetica','2023/07/08')";
    $stmt= $dbh->prepare($sql);
    $stmt->execute();

    $sql = "INSERT INTO articulos VALUES ('BSERR01','SERR','Cserrucho bahco','2023/05/03')";
    $stmt= $dbh->prepare($sql);
    $stmt->execute();

    $sql = "INSERT INTO articulos VALUES ('BSER02','SERR','Serrucho Black Jack','2023/01/02')";
    $stmt= $dbh->prepare($sql);
    $stmt->execute();



    $sql = "INSERT INTO articulos VALUES ('BSERR03','SERR','Cserrucho Stanley','2023/05/03')";
    $stmt= $dbh->prepare($sql);
    $stmt->execute();

    $sql = "INSERT INTO articulos VALUES ('BSERR04','SERR','Cserrucho Black jack','2023/03/12')";
    $stmt= $dbh->prepare($sql);
    $stmt->execute();

    
    $sql = "INSERT INTO articulos VALUES ('MART01','MART','Martillo pequeño','2023/09/02')";
    $stmt= $dbh->prepare($sql);
    $stmt->execute();
    
    $sql = "INSERT INTO articulos VALUES ('MART02','MART','martillo carpintero','2023/07/05')";
    $stmt= $dbh->prepare($sql);
    $stmt->execute();

   

    $sql = "INSERT INTO articulos VALUES ('CINT01','CINT','Cinta metrica Black Jack','2023/01/08')";
    $stmt= $dbh->prepare($sql);
    $stmt->execute();

    $sql = "INSERT INTO articulos VALUES ('CINT02','CINT','Cinta metrica Stanley','2023/02/03')";
    $stmt= $dbh->prepare($sql);
    $stmt->execute();

    


    // CARGA FAMILIAS:

    $sql = "INSERT INTO familias VALUES ('DEST','Destornilladores')";
    $stmt= $dbh->prepare($sql);
    $stmt->execute();

    $sql = "INSERT INTO familias VALUES ('SERR','Serruchos')";
    $stmt= $dbh->prepare($sql);
    $stmt->execute();

    $sql = "INSERT INTO familias VALUES ('MART','Martillos')";
    $stmt= $dbh->prepare($sql);
    $stmt->execute();

    $sql = "INSERT INTO familias VALUES ('CINT','Cinta metrica')";
    $stmt= $dbh->prepare($sql);
    $stmt->execute();


    /*
    $sql = "INSERT INTO articulos VALUES ('','','','')";
    $stmt= $dbh->prepare($sql);
    $stmt->execute();
    */
/*

;;
;;;
*/

    $dbh= null;

?>