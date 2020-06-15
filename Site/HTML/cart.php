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
        <p class="text-uppercase pull-center"> Votre panier </p>
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
    <?php include("footer.php"); ?>
</html>