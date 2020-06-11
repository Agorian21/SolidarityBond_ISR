<!doctype html>
<html lang="fr">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=no">
<?php include("head.php"); ?>
<title>Mot de passe oublié</title>
<body>
	<div class="container-fluid">
		<div class="container">
			<h2 class="text-center" id="title">Renseignez votre nouveau mot de passe</h2>
			<div class="row">
				<div class="col-md-5">
 					<form role="form" method="post" action="../PHP/manage/scriptUpdatePassword.php">
						<fieldset>							
							<div class="form-group">
								<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Mot de passe">
             				</div>
                			<div>
								<input type="submit" name="formForget" class="btn btn-md" value="Envoyer">
							</div> 
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>