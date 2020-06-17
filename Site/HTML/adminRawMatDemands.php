<!doctype html>
<html lang="fr">
    <?php include("head.php"); ?>
	<title>Gérer les demandes de matière première</title>
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
	<p class="text-uppercase pull-center"> Matières premières nécessaires </p>

    <?=include('../PHP/manage/scriptGenerateRawMatTable.php');?>
    
<form role="form" method="post" action="../PHP/manage/scriptRawMat.php">
	<fieldset>							
	    <p class="text-uppercase pull-center"> Ajouter une demande de matière première </p>	
            <div class="form-group">
                <input type="text" name="name" id="name" class="form-control input-lg" placeholder="Nom">
            </div>
            <div class="form-group">
                <input type="text" name="description" id="description" class="form-control input-lg" placeholder="Description">
            </div>
            <div class="form-group">
                <input type="text" name="reason" id="reason" class="form-control input-lg" placeholder="Raison de la demande">
            </div>
            <div class="form-group">
                <input type="text" name="quantity" id="quantity" class="form-control input-lg" placeholder="Quantité demandée">
            </div>
            <div>
                <input type="submit" name="formScript" class="btn btn-md" value="Ajouter">
            </div> 
    </fieldset>
</form>
<div class="col-lg-2"></div>
<form role="form" method="post" action="../PHP/manage/scriptRawMat.php">
	<fieldset>							
		<p class="text-uppercase pull-center"> Modifier une demande </p>
			<div class="form-group">
				<input type="text" name="id" id="id" class="form-control input-lg" placeholder="Identifiant de la demande à modifier">
            </div>
 			<div class="form-group">
				<input type="text" name="name" id="name" class="form-control input-lg" placeholder="Nom">
            </div>
            <div class="form-group">
				<input type="text" name="description" id="description" class="form-control input-lg" placeholder="Description">
			</div>
			<div class="form-group">
				<input type="text" name="reason" id="reason" class="form-control input-lg" placeholder="Raison de la demande">
            </div>
            <div class="form-group">
                <input type="text" name="quantity" id="quantity" class="form-control input-lg" placeholder="Quantité demandée">
            </div>
            <div>
				<input type="submit" name="formScript" class="btn btn-md" value="Modifier">
			</div> 
    </fieldset>
</form>
<form role="form" method="post" action="../PHP/manage/scriptRawMat.php">
	<fieldset>							
		<p class="text-uppercase pull-center"> Supprimer une demande </p>	
			<div class="form-group">
				<input type="text" name="id" id="id" class="form-control input-lg" placeholder="Identifiant de la demande à supprimer">
            </div>
			<input type="submit" name="formScript" class="btn btn-md" value="Supprimer">
    </fieldset>
</form>
</main>
</body>
	<?php include("footer.php"); ?>
</html>