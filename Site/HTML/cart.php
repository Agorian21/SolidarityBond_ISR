<!DOCTYPE html>
<html lang="fr">

<?php include("head.php"); ?>
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
</body>
    <?php include("footer.php") ?>
</html>