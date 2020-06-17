<!doctype html>
<html lang="fr">
<head>
    <?php include("head.php"); ?>
	<title> Gérer les commandes </title>
	<link rel="stylesheet" href="../CSS/admin.css">
</head>

<body>
    <?php include("header.php"); 
    if(isset($_SESSION['status'])) {
        $status = $_SESSION['status'];
        } else if (!isset($_SESSION['status'])) {
            echo 'Vous devez être connecté pour effectuer cette opération.';
            include("footer.php");
            exit();
        }?>
    <main role="main" class="ml-sm-auto col-lg-10 px-4">
	<p class="text-uppercase pull-center"> Liste des commandes validées </p>

    <?=include('../PHP/manage/scriptGenerateOrderTable.php');?>
    </main>
</body>
<footer>
	<?php include("footer.php"); ?>
</footer>
</html>
