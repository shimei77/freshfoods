<?php
    require_once('../../connection/connection.php');
    $sql= "DELETE FROM products WHERE productID=".$_GET['productID'];
    $sth = $db ->prepare($sql);
    $sth ->execute();  
    // echo $_GET["productID"];
   header("Location: list.php?categoryID=".$_GET["categoryID"]);

?>