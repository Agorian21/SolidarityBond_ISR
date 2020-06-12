<?php
session_start();
include('bdd.php');

if(isset($_GET['id'])) {
    $reqprod = $bdd->prepare("SELECT * FROM product WHERE productID = :id_produit");
    $reqprod->bindValue(':id_produit', $_GET['id'], PDO::PARAM_INT);
    $reqprod->execute();
    $prodexist = $reqprod->rowCount();
    if($prodexist == 1) {
    $connexion = $reqprod->fetch(PDO::FETCH_ASSOC);
    $nomProduit = $connexion['productNAME'];
    $descProduit = $connexion['productDESC'];
    $picProduit = $connexion['picURL'];
    $stockProduit = $connexion['productSTOCK'];
    } else {
    $erreur = "Cet article est indisponible pour le moment.";
    echo $erreur;
    include("footer.php");
    exit();
    }
    session_write_close();
}
?>