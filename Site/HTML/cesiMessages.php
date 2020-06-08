<!doctype html>
<html lang="fr">
<head>
    <?php include("head.php"); ?>
	<title>Gérer les messages</title>
	<link rel="stylesheet" href="../CSS/admin.css">
</head>

<body>
    <?php include("header.php"); ?>
    <main role="main" class="ml-sm-auto col-lg-10 px-4">
	<p class="text-uppercase pull-center"> Liste des messages </p>

    </head>
    <body>
    <table id="list_table_json" class="table table-responsive table-hover table-bordered">
    <tr>
    <th>ID</th>
    <th>Nom</th>
    <th>Prénom</th>
	<th>Commentaire</th>
	<th>Visibilité</th>
    <th>Evénement concerné</th>
    </tr>
    </table>
	<script type="text/javascript">
    $(document).ready(function(){
        $.ajax({
         url: "http://localhost:8080/api/list_comments",
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
                    event_data += '<td>'+value.content+'</td>';
                    event_data += '<td>'+value.visibility+'</td>';
                    event_data += '<td>'+value.event_name+'</td>';
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
                    <form role="form" method="post" action="../PHP/manage/scriptReportArticle.php">
						<fieldset>							
							<p class="text-uppercase pull-center"> Signaler un message </p>	
							<div class="form-group">
								<input type="text" name="id" id="id" class="form-control input-lg" placeholder="Identifiant du message à signaler">
                            </div>
								<input type="submit" name="formScript" class="btn btn-md" value="Reporter">
                        </fieldset>
                    </form>

    </main>
</body>
<footer>
	<?php include("footer.php"); ?>
</footer>
</html>