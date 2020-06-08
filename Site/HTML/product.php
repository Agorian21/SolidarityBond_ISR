<?php
include("../PHP/manage/scriptSetEvent.php");
include("../PHP/manage/scriptSetImage.php");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>L'événement</title>
    <?php include("head.php"); ?>
    <link rel="stylesheet" href="../CSS/header.css">

    <link rel="stylesheet" href="../CSS/event.css">
</head>
<?php include("header.php"); ?>
<body>
<div
     class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center border-bottom intern">
	<div id="eventpo">	
	<div class="corps">


	<br>
	  <div class="corps">
		<div class="info">

			<p>Description :</p>
				<p><?=$connexion['description']?></p>

				<p>Prix :  <?=$connexion['price']?> euros</p>
				<br>
				<br>
				<p>Date : <?=$connexion['date']?> </p>
				<br>
	            <p>Jours consécutifs : <?=$connexion['days_recursive']?> </p>
				<br>
				<?php include('../PHP/manage/scriptVerifyIfRegistered.php'); ?>
		</div>
	</div>
	<?php include('../PHP/manage/scriptPic.php'); ?>
	</div>
	
	</div>
</div>
	<?php include("footer.php") ?>
    <script src="../JS/text_inscrit_event.js"></script>
</body>

</html>