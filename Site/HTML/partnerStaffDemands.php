<!doctype html>
<html lang="fr">
    <?php include("head.php");
    include("header.php");
    if(isset($_SESSION['status'])) {
        $status = $_SESSION['status'];
        } else if (!isset($_SESSION['status'])) {
            echo 'Vous devez être connecté pour effectuer cette opération.';
            include("footer.php");
            exit();
        }?>
	<title>Demandes de matières premières par le staff</title>

<body>
    <main role="main" class="ml-sm-auto col-lg-10 px-4">
	<p class="text-uppercase pull-center"> Matières premières nécessaires pour le staff </p>

    <?=include('../PHP/manage/scriptGenerateRawMatTable.php');?>

    <form role="form" method="post" action="../PHP/manage/scriptModifyStaffDemand.php">
		<fieldset>
			<p class="text-uppercase pull-center"> Valider une demande </p>	
				<div class="form-group">
					<input type="text" name="id" id="id" class="form-control input-lg" placeholder="Identifiant de la demande à valider">
                </div>
					<input type="submit" name="formScript" class="btn btn-md" value="Reporter">
        </fieldset>
    </form>
</main>
</body>
	<?php include("footer.php"); ?>
</html>