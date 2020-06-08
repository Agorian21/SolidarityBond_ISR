<!doctype html>
<html lang="fr">
<head>
    <?php include("head.php"); ?>
	<title>Gérer les photos</title>
	<link rel="stylesheet" href="../CSS/admin.css">
</head>

<body>
    <?php include("header.php"); ?>
    <main role="main" class="ml-sm-auto col-lg-10 px-4">
	<p class="text-uppercase pull-center"> Liste des photos </p>
    <form role="form" method="post" action="../PHP/manage/scriptDownloadPicture.php">
						<fieldset>							
							<legend class="text-uppercase pull-center"> Vous voulez télécharger toutes les photos ? C'est compréhensible, allez-y ! </p>	
                                <input type="submit" name="formDownload" class="btn btn-md" value="Télécharger tout"> 
                                <p>(Attention ! Pour accéder aux images, il vous faut 7-Zip, et une fois l'archive ouverte, revenez deux fois en avant pour voir les images)</p>
                        </fieldset>
                    </form>
    <?php include("../PHP/manage/scriptGetPics.php"); ?>

    </main>
</body>
<footer>
	<?php include("footer.php"); ?>
</footer>
</html>