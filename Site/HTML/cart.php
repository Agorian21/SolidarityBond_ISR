<!DOCTYPE html>
<html lang="fr">

<head>
    <title>La Boutique du BDE - Votre panier</title>
    <?php include("head.php"); ?>
    <link rel="stylesheet" href="../CSS/header.css">
    <link rel="stylesheet" href="../CSS/shop.css">
    <link rel="stylesheet" href="../CSS/admin.css">
</head>


<body>
<?php include("header.php"); ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center border-bottom intern">
        <div class="intermain">
            <h1 class="boutitle text-center">
                <br>
                <a>Votre panier</a>
            </h1>
        <div class="corps">
            <table>
                <tr>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Prix</th>
                    <th>Stock</th>
                </tr>
                <?php include('../PHP/manage/scriptShowCart.php'); ?>
            </table>
        </div>
    </div>
    <?php include("footer.php") ?>
</body>

</html>