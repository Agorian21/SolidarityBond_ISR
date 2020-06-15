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
    </head>
    <body>
    <table id="list_table_json" class="table table-responsive table-hover table-bordered">
    <tr>
    <th>ID</th>
    <th>Nom</th>
    <th>Prénom</th>
	<th>Mot de passe</th>
	<th>Adresse mail</th>
	<th>Statut</th>
    </tr>
    </table>
	<script type="text/javascript">
    $(document).ready(function(){
        $.ajax({
         url: "http://localhost:8080/api/list_users",
         dataType: 'json',
         type: 'get',
         cache: false,
            success: function(data){
             var event_data = '';
             $.each(data, function(index, value){
                 console.log("data.user");
                    event_data += '<tr>';
                    event_data += '<td>'+value.id+'</td>';
                    event_data += '<td>'+value.name+'</td>';
                    event_data += '<td>'+value.surname+'</td>';
                    event_data += '<td>'+value.password+'</td>';
                    event_data += '<td>'+value.mail+'</td>';
                    event_data += '<td>'+value.status+'</td>';
                    event_data += '</tr>';
                });
            $("#list_table_json").append(event_data);
        },
        error: function(d){
            alert("L'API ne répond pas, veuillez relancer le serveur.");
        }
    });
});
</script>
	<p class="text-uppercase pull-center"> Télécharger la liste des utilisateurs au format CSV </p>
	<form role="form" method="get" action="../PHP/manage/scriptUsersCSV.php">
						<fieldset>							
								<input type="submit" class="btn btn-md" value="Télécharger">
                        </fieldset>
                    </form>
 					<form role="form" method="post" action="../PHP/manage/scriptAddUserAdmin.php">
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
                            <div class="form-check">
								<legend>Statut</legend>
									<input class="form-check-input" type="radio" name="status" id="status" value="Staff" >
										<label class="form-check-label" for="status">
											Membre du staff organisationnel
										</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="status" id="status" value="Partenaire">
									<label class="form-check-label" for="status">
										Partenaire de l'organisation
									</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="status" id="status" value="Entreprise">
									<label class="form-check-label" for="status">
										Entreprise nécessitant nos services
									</label>
							</div>
							<div class="form-group">
								<input type="email" name="mail" id="mail" class="form-control input-lg" placeholder="Adresse mail">
							</div>
								<input type="submit" name="formInscription" class="btn btn-md" value="Ajouter">
							</div> 
                        </fieldset>
                    </form>
                    <div class="col-lg-2"></div>
                    <form role="form" method="post" action="../PHP/manage/scriptModifyUser.php">
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
                            <div class="form-check">
								<legend>Statut</legend>
									<input class="form-check-input" type="radio" name="status" id="status" value="Staff" >
										<label class="form-check-label" for="status">
											Membre du staff organisationnel
										</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="status" id="status" value="Partenaire">
									<label class="form-check-label" for="status">
										Partenaire de l'organisation
									</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="status" id="status" value="Entreprise">
									<label class="form-check-label" for="status">
										Entreprise nécessitant nos services
									</label>
							</div>
							<div class="form-group">
								<input type="email" name="mail" id="mail" class="form-control input-lg" placeholder="Adresse mail">
							</div>  
								<input type="submit" name="formScript" class="btn btn-md" value="Modifier">
							</div> 
                        </fieldset>
                    </form>
                    <form role="form" method="post" action="../PHP/manage/scriptDeleteUser.php">
						<fieldset>							
							<p class="text-uppercase pull-center"> Supprimer un utilisateur </p>	
 							<div class="form-group">
								<input type="text" name="id" id="id" class="form-control input-lg" placeholder="Identifiant de l'utilisateur à supprimer">
                            </div>
								<input type="submit" class="btn btn-md" value="Supprimer">
                        </fieldset>
                    </form>

    </main>
</body>
<footer>
	<?php include("footer.php"); ?>
</footer>
</html>