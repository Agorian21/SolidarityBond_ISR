<!doctype html>
<html lang="fr">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=no">
    <?php include("head.php"); ?>
	<title>Connectez-vous</title>
	<body>
	<div class="container-fluid">
		<div class="container">
			<h2 class="text-center" id="title">Connexion membres</h2>
			 <p class="text-center">
			</p>
 			<hr>
			<div class="row">
				<div class="col-md-5">
 					<form role="form" method="post" action="../PHP/manage/scriptAddUser.php">
						<fieldset>							
							<p class="text-uppercase pull-center"> S'inscrire </p>	
 							<div class="form-group">
								<input type="text" name="name" id="name" class="form-control input-lg" placeholder="Nom">
              				</div>
              				<div class="form-group">
								<input type="text" name="surname" id="surname" class="form-control input-lg" placeholder="Prénom">
							</div>
							<div class="form-group">
								<input type="email" name="mail" id="mail" class="form-control input-lg" placeholder="Adresse e-mail">
             				</div>
              				<div class="form-group">
								<input type="email" name="mail2" id="mail2" class="form-control input-lg" placeholder="Confirmer l'adresse e-mail">
							</div>
							<div class="form-group">
								<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Mot de passe">
							</div>
							<div class="form-group">
                				<input type="password" name="password2" id="password2" class="form-control input-lg" placeholder="Confirmer le mot de passe">
              				</div>
              				<div class="form-group">
              				<label for="campus">Statut</label>
                				<select name="campus" id="campus" class="form-control input-lg">
                					<option>Choisissez...</option>
									<option value="Entreprise">Entreprise</option>
									<option value="Partenaire">Partenaire</option>
              					</select>
	          				</div>    
							<div class="form-check">
								<label class="form-check-label">
								  <input type="checkbox" class="form-check-input">
								  En cliquant sur ce bouton, vous acceptez les <a href="cgu.php">Conditions Générales d'Utilisation</a> du site.
								</label>
							  </div>
                			<div>
								<input type="submit" name="formInscription" class="btn btn-md" value="S'inscrire">
							</div> 
						</fieldset>
					</form>
				</div>
				
				<div class="col-md-2"></div>
				
				<div class="col-md-5">
 				 		<form role="form" action="../PHP/manage/scriptConnect.php" method="post">
						<fieldset>							
							<p class="text-uppercase"> Se connecter </p>		
							<div class="form-group">
								<input type="email" name="mail" id="mail" class="form-control input-lg" placeholder="Adresse e-mail">
							</div>
							<div class="form-group">
								<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Mot de passe">
							</div>
							<div>
								<input type="submit" class="btn btn-md" value="Se connecter">
								<a class="btn btn-md" href="forgetmdp.php">Mot de passe oublié</a>
							</div>
 						</fieldset>
				</form>	
				</div>
			</div>
		</div>
	</div>
	</body>
	 

</html>