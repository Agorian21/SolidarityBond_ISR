<!doctype html>
<html lang="fr">
<?php include("head.php"); ?>

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
	<p class="text-uppercase pull-center"> Liste des articles </p>

    </head>
    <body>
    <table id="list_table_json" class="table table-responsive table-hover table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Lien photo</th>
            <th>Stock</th>             
        </tr>                   
    </thead></table>
    <script type="text/javascript">
    $(document).ready(function(){
        $.ajax({
         url: "http://localhost:8080/api/list_products",
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
                    event_data += '<td>'+value.pic_url+'</td>';
                    event_data += '<td>'+value.stock+'</td>';
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
<form role="form" method="post" action="../PHP/manage/scriptArticle.php">
	<fieldset>							
	    <p class="text-uppercase pull-center"> Ajouter un article </p>	
            <div class="form-group">
                <input type="text" name="name" id="name" class="form-control input-lg" placeholder="Nom">
            </div>
            <div class="form-group">
                <input type="text" name="description" id="description" class="form-control input-lg" placeholder="Description">
            </div>
            <div class="form-group">
                <input type="text" name="pic_url" id="pic_url" class="form-control input-lg" placeholder="Lien de la photo">
            </div>
            <div class="form-group">
                <input type="text" name="stock" id="stock" class="form-control input-lg" placeholder="Stock">
            </div>
            <div>
                <input type="submit" name="formScript" class="btn btn-md" value="Ajouter">
            </div> 
    </fieldset>
</form>
<div class="col-lg-2"></div>
<form role="form" method="post" action="../PHP/manage/scriptArticle.php">
	<fieldset>							
		<p class="text-uppercase pull-center"> Modifier un article </p>
			<div class="form-group">
				<input type="text" name="id" id="id" class="form-control input-lg" placeholder="Identifiant de l'article à modifier">
            </div>
 			<div class="form-group">
				<input type="text" name="name" id="name" class="form-control input-lg" placeholder="Nom">
            </div>
            <div class="form-group">
				<input type="text" name="description" id="description" class="form-control input-lg" placeholder="Description">
			</div>
            <div class="form-group">
				<input type="text" name="pic_url" id="pic_url" class="form-control input-lg" placeholder="Lien de la photo">
			</div>
			<div class="form-group">
                <input type="text" name="stock" id="stock" class="form-control input-lg" placeholder="Stock">
            </div>
            <div>
				<input type="submit" name="formScript" class="btn btn-md" value="Modifier">
			</div> 
    </fieldset>
</form>
<form role="form" method="post" action="../PHP/manage/scriptArticle.php">
	<fieldset>							
		<p class="text-uppercase pull-center"> Supprimer un article </p>	
			<div class="form-group">
				<input type="text" name="id" id="id" class="form-control input-lg" placeholder="Identifiant de l'article à supprimer">
            </div>
			<input type="submit" name="formScript" class="btn btn-md" value="Supprimer">
    </fieldset>
</form>
</main>
</body>
	<?php include("footer.php"); ?>
</html>
