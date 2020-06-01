<?php
session_start();
$i = $_GET['cart_id'];
unset($_SESSION['Cart'][$i]);
$_SESSION['Cart'] = array_values($_SESSION['Cart']);
header('Location: cart.php?Del=true');
?>
