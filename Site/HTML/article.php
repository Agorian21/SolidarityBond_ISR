<!DOCTYPE html>
<html lang="fr">

<?php include("head.php"); ?>

<body>
<?php include("header.php"); 
include("../PHP/manage/scriptSetArticle.php");?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center border-bottom intern">
	<div class="corps">
	    <div class="articles">
	          <div class="img">
	    <a target="_blank" >
	      <img class = "impor" src="<?=$picProduit?>" alt="article_photo">
	    </a>
	    <div class="desc"><?=$nomProduit?></div>
	    </div>
	</div>
	<br>
	  <div class="corps">
	    <div class="info">
	        <p>Description:</p>
	            <ul>
	                <li><?=$descProduit?></li>
	            </ul>
	            <form method="POST" action="../PHP/manage/scriptAddToCart.php?id_produit=<?=$_GET['id']?>"> 
              <label for="quantity">Quantité</label>
                <select name="quantity" id="quantity" class="form-control input-lg">
                <option>Choisissez...</option>
		        <option value="1">1</option>
		        <option value="5">5</option>
		        <option value="10">10</option>
				<option value="50">50</option>
		        <option value="100">100</option>
				<option value="500">500</option>
              	</select>
			<?php if(isset($_SESSION['id'])) {	  
			echo '<input type="submit" value="Ajouter au panier" />';
			}; ?>   
			<input type="reset" href="shop.php" value="Annuler">        
			</form>
	        </p>
	    </div>
	</div>

	</div>
</div>
    <?php include("footer.php") ?>
</body>

</html>