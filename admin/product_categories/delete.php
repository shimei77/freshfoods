<?php
    require_once('../../connection/connection.php');
    $sql= "DELETE FROM product_categories WHERE product_categoryID=".$_GET['categoryID'];
    $sth = $db ->prepare($sql);
    $sth ->execute();  
   header('Location: list.php');

?>