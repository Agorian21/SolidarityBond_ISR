<!DOCTYPE html>
<html>
<?php include("head.php");
include("header.php"); ?>
        <meta charset="utf-8" />
        <title>Mini-chat</title>
    <style>
    form
    {
        text-align:center;
    }
    </style>
    <body>
    
    <form action="../PHP/manage/staffChatPost.php" method="post">
        <p>
        <label for="message">Message</label> :  <input type="text" name="message" id="message" /><br />

        <input type="submit" value="Envoyer" />
	</p>
    </form>

<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=solidarity_bond;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Récupération des 10 derniers messages
$reponse = $bdd->query('SELECT userID, chatMESSAGE FROM chat ORDER BY ID DESC LIMIT 0, 10');
$idUser = $reponse['userID'];
$requeteForUser = $bdd->prepare('SELECT userFIRSTNAME, userLASTNAME from user WHERE id=:id');
$requeteForUser->bindValue(':id', $idUser, PDO::PARAM_STR);
$requeteForUser->execute();
$userInfo = $bdd->fetch(PDO::FETCH_ASSOC);
$userData = implode(' ', $userInfo);
$requeteForUser->closeCursor();
// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
	echo '<p><strong>' . htmlspecialchars($userData) . '</strong> : ' . htmlspecialchars($donnees['chatMESSAGE']) . '</p>';
}

$reponse->closeCursor();

?>
    </body>
<?php include("footer.php"); ?>
</html>