<!doctype html>
<html lang="fr">
    <?php include("head.php"); ?>
	<title>Demandes de matières premières par le staff</title>

<body>
    <?php include("header.php"); ?>
    <main role="main" class="ml-sm-auto col-lg-10 px-4">
	<p class="text-uppercase pull-center"> Matières premières nécessaires pour le staff </p>

    </head>
    <body>
    <table id="list_table_json" class="table table-responsive table-hover table-bordered">
    <tr>
    <th>ID</th>
    <th>Nom</th>
    <th>Descriptif</th>
	<th>Raison</th>
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