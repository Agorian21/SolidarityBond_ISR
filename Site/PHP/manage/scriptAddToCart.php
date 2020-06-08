<?php
session_start();
include('bdd.php');
$quantity = $_POST['quantity'];
$products = $_GET['id_produit'];
$id = $_SESSION['id'];
if(isset($_GET['id_produit'])) {
    $reqprod = $bdd->prepare("INSERT INTO shop_orders (quantity, products, status, id_Site_Users) VALUES ($quantity, $products, 0, $id)");
    $reqprod->execute();
    var_dump($reqprod);
    header("Location: ../../HTML/shop.php");
}
?>