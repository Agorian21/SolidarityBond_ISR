<!doctype html>
<html lang="fr">
<head>
    <title>Photos</title>
    <?php include("head.php"); ?>
    <link rel="stylesheet" href="../CSS/event.css">
    <link rel="stylesheet" href="../CSS/header.css">
</head>

<body>
    <?php include("header.php"); ?>
    <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center border-bottom intern">
    <main>


        <br /><h2>Commentaires :</h2><br />

        <form method="post" action="../PHP/manage/scriptAddComment.php?pic_event=<?=$_GET['pic_event']?>">
             <p>
                <label for="content">Votre commentaire :</label><br />
                  <textarea name="commentaire" id="commentaire" required></textarea> <br />
                  <input type="submit" name="check" value="Envoyer" /> <input type="reset" value="Annuler">
                  <br /> <br />
            </p>
        </form>
        <?php include("../PHP/manage/scriptGetComments.php"); ?>
        <br /><h2>Like :</h2><br />
        <?php include("../PHP/manage/scriptGetLikes.php"); ?>       
    </main>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>