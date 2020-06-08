<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Les Evénements du BDE</title>
    <?php include("head.php"); ?>
    <link rel="stylesheet" href="../CSS/header.css">
    <link rel="stylesheet" href="../CSS/shop.css">
</head>


<body>
<?php include("header.php"); ?>
    <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center border-bottom intern">
        
        <div class="intermain">
        <h1 class="boutitle text-center">
            <br>
            Bienvenue dans les événements !
            <br><br><br>          
        </h1>

        <div class="corps">

        <?php include('../PHP/manage/scriptShowEvent.php'); ?>
        
        <br><br><br><br>
        </div>
        </div>
        </div>
    
    <?php include("footer.php") ?>
</body>

</html>