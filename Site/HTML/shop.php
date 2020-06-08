<!DOCTYPE html>
<html lang="fr">

<head>
    <title>La Boutique du BDE</title>
    <?php include("head.php"); ?>
    <link rel="stylesheet" href="../CSS/header.css">
    <link rel="stylesheet" href="../CSS/shop.css">
</head>


<body>
<?php include("header.php"); ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center border-bottom intern">
            <div class="intermain">
                <h1 class="boutitle text-center">Bienvenue dans la boutique !</h1>
                    <div class="corps">
                        <a href="top3.php">Cliquez ici pour voir le top 3 des articles</a>
                         <br /><br />
                            <div class="container">
                            <form action ="" method = "get">
                                <input type = "search" name = "terme">
                                <input type = "submit" name = "formSearch" value = "Rechercher">
                            </form>
                                <br />
                            <form action="shop.php" method="post">
                                <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <select class="form-control" name="category">
                                            <option value="">Sélectionnez la catégorie</option>
                                            <option value="meuble">Meuble</option>
                                            <option value="fourniture">Fourniture</option>
                                            <option value="vetements">Vêtements</option>
                                            <option value="autre">Autres</option>
                                        </select>
                                    </div>
                                </div>
                                    <div class="col-sm-3">
                                    <div class="form-group">
                                        <select class="form-control" name="price">
                                            <option value="">Sélectionnez votre tranche de prix</option>
                                            <option value="range1">1€ - 20€</option>
                                            <option value="range2">20€ - 40€</option>
                                            <option value="range3">40€ - 60€</option>
                                        </select>
                                    </div>
                                </div>
                                <input type="submit" name="formSearch" class="btn btn-primary" value="Valider votre recherche par thème" />
                            </div>
                            </form>
        <div class="corps">
         <?php
              include('../PHP/manage/scriptSearchProductsByName.php'); 
              include('../PHP/manage/scriptSearchProductsByCategory.php'); ?>
        </div>
        </div>
        </div>
    
    <?php include("footer.php") ?>
</body>

</html>