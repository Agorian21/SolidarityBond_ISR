<!DOCTYPE html>
<html lang="fr">

<?php include("head.php"); ?>
<body>
<?php include("header.php"); 
if(isset($_SESSION['status'])) {
    $status = $_SESSION['status'];
    } else if (!isset($_SESSION['status'])) {
        echo 'Vous devez être connecté pour effectuer cette opération.';
        include("footer.php");
        exit();
    }?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center border-bottom intern">
        <div class="intermain">
        <p class="text-uppercase pull-center"> Récapitulatif de votre commande </p>
            </h1>
        <div class="corps">
            <table>
                <tr>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Stock</th>
                </tr>
                <?php include('../PHP/manage/scriptShowCart.php'); ?>
            </table>
        </div>
    </div>
</body>
    <?php include("footer.php") ?>
</html>