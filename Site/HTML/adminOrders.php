<!doctype html>
<html lang="fr">
<head>
    <?php include("head.php"); ?>
	<title> Gérer les commandes </title>
	<link rel="stylesheet" href="../CSS/admin.css">
</head>

<body>
    <?php include("header.php"); ?>
    <main role="main" class="ml-sm-auto col-lg-10 px-4">
	<p class="text-uppercase pull-center"> Liste des commandes validées </p>

    </head>
    <body>
    <table id="list_table_json" class="table table-responsive table-hover table-bordered">
    <thead>
        <tr>
            <th>Nom du produit</th>
            <th>Quantité</th>
            <th>Nom de l'entreprise</th>
            <th>Adresse de l'entreprise</th>    
        </tr>                   
    </thead></table>
    <script type="text/javascript">
    $(document).ready(function(){
        $.ajax({
         url: "http://localhost:8080/api/list_orders",
         dataType: 'json',
         type: 'get',
         cache: false,
            success: function(data){
             var event_data = '';
             $.each(data, function(index, value){
                    event_data += '<tr>';
                    event_data += '<td>'+value.product_name+'</td>';
                    event_data += '<td>'+value.quantity+'</td>';
                    event_data += '<td>'+value.enterprise_name+'</td>';
                    event_data += '<td>'+value.entreprise_address+'</td>';
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
    </main>
</body>
<footer>
	<?php include("footer.php"); ?>
</footer>
</html>
