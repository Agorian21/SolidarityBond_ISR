<!doctype html>
<html lang="fr">
<head>
<?php include("head.php"); ?>
<title> Gérer les utilisateurs </title>
<?php include("header.php"); 
if(isset($_SESSION['status'])) {
	$status = $_SESSION['status'];
	} else if (!isset($_SESSION['status'])) {
		echo 'Vous devez être connecté pour effectuer cette opération.';
		include("footer.php");
		exit();
}?>
<main role="main" class="ml-sm-auto col-lg-10 px-4">
<p class="text-uppercase pull-center"> Liste des utilisateurs </p>
<?=include("../PHP/manage/scriptGenerateUserTable.php"); ?>

<p class="text-uppercase pull-center"> Télécharger la liste des utilisateurs au format CSV </p>
<form role="form" method="get" action="../PHP/manage/scriptUsersCSV.php">
	<fieldset>							
		<input type="submit" class="btn btn-md" value="Télécharger">
    </fieldset>
</form>
<form role="form" method="post" action="../PHP/manage/scriptUserAdmin.php">
	<fieldset>							
		<p class="text-uppercase pull-center"> Ajouter un utilisateur </p>	
 			<div class="form-group">
				<input type="text" name="name" id="name" class="form-control input-lg" placeholder="Nom">
            </div>
            <div class="form-group">
				<input type="text" name="surname" id="surname" class="form-control input-lg" placeholder="Prénom">
			</div>
			<div class="form-group">
				<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Mot de passe">
            </div>
			<div class="form-group">
				<input type="email" name="mail" id="mail" class="form-control input-lg" placeholder="Adresse mail">
			</div>
            <div class="form-check">
				<p class="text-uppercase pull-center"> Statut </p>
					<input class="form-check-input" type="radio" name="status" id="status" value="2" >
						<label class="form-check-label" for="status">Membre du staff organisationnel</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="radio" name="status" id="status" value="1">
					<label class="form-check-label" for="status">Partenaire de l'organisation</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="radio" name="status" id="status" value="0">
					<label class="form-check-label" for="status">Entreprise nécessitant nos services</label>
			</div>
			<div class="form-group">
				<input type="submit" name="formScript" class="btn btn-md" value="Ajouter">
			</div> 
    </fieldset>
</form>
<div class="col-lg-2"></div>
<form role="form" method="post" action="../PHP/manage/scriptUserAdmin.php">
	<fieldset>							
		<p class="text-uppercase pull-center"> Modifier un utilisateur </p>
		<div class="form-group">
			<input type="text" name="id" id="id" class="form-control input-lg" placeholder="Identifiant de l'utilisateur">
        </div>
		<div class="form-group">
			<input type="text" name="name" id="name" class="form-control input-lg" placeholder="Nom">
         </div>
         <div class="form-group">
			<input type="text" name="surname" id="surname" class="form-control input-lg" placeholder="Prénom">
		</div>
		<div class="form-group">
			<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Mot de passe">
        </div>
		<div class="form-group">
			<input type="email" name="mail" id="mail" class="form-control input-lg" placeholder="Adresse mail">
		</div> 
        <div class="form-check">
			<p class="text-uppercase pull-center"> Statut </p>
			<input class="form-check-input" type="radio" name="status" id="status" value="Staff" >
				<label class="form-check-label" for="status">Membre du staff organisationnel</label>
		</div>
		<div class="form-check">
			<input class="form-check-input" type="radio" name="status" id="status" value="Partenaire">
				<label class="form-check-label" for="status">Partenaire de l'organisation</label>
		</div>
		<div class="form-check">
			<input class="form-check-input" type="radio" name="status" id="status" value="Entreprise">
				<label class="form-check-label" for="status">Entreprise nécessitant nos services</label>
		</div>
		<div class="form-group">
			<input type="submit" name="formScript" class="btn btn-md" value="Modifier">
		</div> 
   </fieldset>
</form>
<form role="form" method="post" action="../PHP/manage/scriptUserAdmin.php">
	<fieldset>							
		<p class="text-uppercase pull-center"> Supprimer un utilisateur </p>	
		<div class="form-group">
			<input type="text" name="id" id="id" class="form-control input-lg" placeholder="Identifiant de l'utilisateur à supprimer">
        </div>
		<div class="form-group">
			<input type="submit" name="formScript" class="btn btn-md" value="Supprimer">
		</div>
    </fieldset>
</form>
</main>
</body>
<footer>
	<?php include("footer.php"); ?>
</footer>
</html>