<!doctype html>
<html lang="fr">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=no">
	<?php include("head.php"); 
	include("header.php"); 
	include("../PHP/manage/scriptSetArticle.php");?>
	<title>Votre article</title>
	<body>
	<div class="container-fluid">
		<div class="container">
			<h2 class="text-center" id="title"> <?=$nomProduit?> </h2>
			 <p class="text-center">
			</p>
 			<hr>
			<div class="row">
				<div class="col-md-5">
				<form method="POST" action="../PHP/manage/scriptAddToCart.php?id_produit=<?=$_GET['id']?>">						
							<p class="text-uppercase pull-center"> Description du produit </p>	
								<?=$descProduit?>
                            <p class="text-uppercase pull-center"> Prix du produit </p>
                                <?=$prixProduit?> euros/unité.
                            <p class="text-uppercase pull-center"> Stock disponible </p>	
								<?=$stockProduit?> exemplaires disponibles.
                            <p class="text-uppercase pull-center"> Quantité </p>
                			<select name="quantity" id="quantity" class="form-control input-lg">
                			<option>Choisissez...</option>
		        			<option value="1">1</option>
		        			<option value="5">5</option>
		        			<option value="10">10</option>
							<option value="50">50</option>
		        			<option value="100">100</option>
							<option value="500">500</option>
              				</select>
              				<div class="form-group">
              				<?php if(isset($_SESSION['id'])) {	  
							echo '<input type="submit" class="btn btn-md" value="Ajouter au panier" />';
							}; ?>   
							<input type="reset" href="index.php" class="btn btn-md" value="Annuler">
	          				</div>
					</form>
				</div>
				
				<div class="col-md-2"></div>
				
				<div class="col-md-5">
					<p class="text-uppercase pull-center"> Image de l'article </p>
					<img class = "impor" src="<?=$picProduit?>" alt="article_photo">
				</div>
			</div>
		</div>
	</div>
	</body>
	<?php include("footer.php"); ?>
</html>