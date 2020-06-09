<?php include("../PHP/manage/scriptSetArticle.php");?>

<!DOCTYPE html>
<html lang="fr">

<?php include("head.php"); ?>

<body>
<?php include("header.php"); ?>
<div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center border-bottom intern">
	<div class="corps">
	    <div class="articles">
	          <div class="img">
	    <a target="_blank" >
	      <img class = "impor" src="<?=$_SESSION['picProduit']?>" alt="article_photo">
	    </a>
	           <div class="desc"><?=$_SESSION['nomProduit']?></div>
	      </div>
	</div>

	<br>
	  <div class="corps">
	    <div class="info">
	        <p>Description:</p>
	            <ul>
	                <li><?=$_SESSION['descProduit']?></li>
	            </ul>
	            <br>
	            <p>Prix:  <?=$_SESSION['prixProduit']?> euros</p>
	            <br>
	            <form method="POST" action="../PHP/manage/scriptAddToCart.php?id_produit=<?=$_GET['id']?>"> 
              <label for="quantity">Quantité</label>
                <select name="quantity" id="quantity" class="form-control input-lg">
                <option>Choisissez...</option>
		              <option value="1">1</option>
		              <option value="2">2</option>
		              <option value="3">3</option>
					  <option value="4">4</option>
		              <option value="5">5</option>
              </select>  
			<input type="submit" value="Ajouter au panier" />   
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