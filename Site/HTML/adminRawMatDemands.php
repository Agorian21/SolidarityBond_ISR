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

    </head>
    <body>
    <table id="list_table_json" class="table table-responsive table-hover table-bordered">
    <tr>
    <th>ID</th>
    <th>Nom</th>
    <th>Descriptif</th>
	<th>Raison</th>
    <th>Quantité voulue</th>
	<th>Demande traitée</th>
    </tr>
    </table>
	<script type="text/javascript">
    $(document).ready(function(){
        $.ajax({
         url: "http://localhost:8080/api/list_rawmaterialdemands",
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
                    event_data += '<td>'+value.description+'</td>';
                    event_data += '<td>'+value.reason+'</td>';
                    event_data += '<td>'+value.quantity+'</td>';
                    event_data += '<td>'+value.isTreated+'</td>';
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