<!doctype html>
<html lang="fr">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=no">
    <?php include("head.php"); ?>
	<title>Mot de passe oublié</title>
	<body>
	<div class="container-fluid">
		<div class="container">
			<h2 class="text-center" id="title">Vous avez perdu votre mot de passe ?</h2>
			 <p class="text-center">
			</p>
 			<hr>
			<div class="row">
				<div class="col-md-5">
 					<form role="form" method="post" action="../PHP/manage/scriptDeleteOldPassword.php">
						<fieldset>							
							<div class="form-group">
								<input type="email" name="mail" id="mail" class="form-control input-lg" placeholder="Adresse e-mail">
             				</div>
                			<div>
								<input type="submit" name="formForget" class="btn btn-md" value="Envoyer">
							</div> 
						</fieldset>
					</form>
				</div>
	</body>
	 

</html>