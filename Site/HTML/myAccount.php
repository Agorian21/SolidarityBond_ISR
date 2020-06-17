<!doctype html>
<html lang="fr">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=no">
	<?php include("head.php"); 
	include("header.php"); ?>
	<title>Mon compte</title>
	<body>
	<div class="container-fluid">
		<div class="container">
			<h2 class="text-center" id="title"> Vos données </h2>
			 <p class="text-center">
			</p>
 			<hr>
			<div class="row">
				<div class="col-md-5">						
							<p class="text-uppercase pull-center"> Votre nom et prénom </p>	
 							<div class="form-group">
								<?php echo($_SESSION['name'] . " " . $_SESSION['surname']); ?>
              				</div>
                            <p class="text-uppercase pull-center"> Votre adresse e-mail </p>
                                <?php echo($_SESSION['mail']);?>  
                                <br>
                            <p class="text-uppercase pull-center"> Modifier l'adresse e-mail </p>
							<form method="POST" action="../PHP/manage/scriptModifyMyAccount.php">
							<fieldset>	
							<div class="form-group">
								<input type="email" name="mail" id="mail" class="form-control input-lg" placeholder="Modifier l'adresse e-mail">
             				</div>
              				<div class="form-group">
								<input type="email" name="mail2" id="mail2" class="form-control input-lg" placeholder="Confirmer l'adresse e-mail">
							</div>
                            <div>
								<input type="submit" name="formEmailChange" class="btn btn-md" value="Modifier">
							</div>
							</fieldset>
							</form>
                            <p class="text-uppercase pull-center"> Votre mot de passe </p>
							<form method="POST" action="../PHP/manage/scriptModifyMyAccount.php">
							<fieldset>
							<div class="form-group">
								<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Mot de passe">
							</div>
							<div class="form-group">
                				<input type="password" name="password2" id="password2" class="form-control input-lg" placeholder="Confirmer le mot de passe">
              				</div>
                            <div>
								<input type="submit" name="formPasswordChange" class="btn btn-md" value="Modifier">
							</div>
							</fieldset>
							</form>
              				<p class="text-uppercase pull-center"> Votre statut au sein de l'organisation </p>
                              <?php if($_SESSION["status"] == 0) {
                                        echo("Entreprise");                                 
                                  } else if ($_SESSION["status"] == 1) {
                                    echo("Partenaire");
                                } else if ($_SESSION["status"] == 2) {
                                    echo("Entreprise");
                                };?>
				</div>
				
				<div class="col-md-2"></div>
				
				<div class="col-md-5">					
							<p class="text-uppercase"> Vos dernières commandes </p>		
								Cette zone est en train d'être fabriquée.
							</div>
				</form>	
				</div>
			</div>
		</div>
	</div>
	</body>
	<?php include("footer.php"); ?>
</html>