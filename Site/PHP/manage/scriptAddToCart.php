<?php
session_start();
include('bdd.php');
$quantity = $_POST['quantity'];
$products = $_GET['id_produit'];
$id = $_SESSION['id'];
if(isset($_GET['id_produit'])) {
    $reqprod = $bdd->prepare("INSERT INTO basket (productID, userID, basketQUANTITY) VALUES ($products, $id, $quantity)");
    $reqprod->execute();
    header("Location: ../../HTML/cart.php");
}
?>