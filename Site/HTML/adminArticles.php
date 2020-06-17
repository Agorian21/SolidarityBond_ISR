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

    <?=include('../PHP/manage/scriptGenerateArticleTable.php');?>

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
