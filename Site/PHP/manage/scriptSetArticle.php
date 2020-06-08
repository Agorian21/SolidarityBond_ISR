<?php
session_start();
include('bdd.php');
if(isset($_GET['article'])) {
    $reqprod = $bdd->prepare("SELECT * FROM shop_products WHERE id = :id_produit");
    $reqprod->bindValue(':id_produit', $_GET['article'], PDO::PARAM_INT);
    $reqprod->execute();
    $prodexist = $reqprod->rowCount();
    if($prodexist == 1) {
    $connexion = $reqprod->fetch(PDO::FETCH_ASSOC);
    $_SESSION['nomProduit'] = $connexion['name'];
    $_SESSION['descProduit'] = $connexion['description'];
    $_SESSION['picProduit'] = $connexion['pic_url'];
    $_SESSION['prixProduit'] = $connexion['price'];
    $_SESSION['stockProduit'] = $connexion['stock'];
    session_write_close();
    }else {
    $erreur = "Eh bah non !";
    echo $erreur;
    }
}
?>