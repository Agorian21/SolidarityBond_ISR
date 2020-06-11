<!DOCTYPE html>
<html>
<?php include("head.php");
include("header.php"); 
session_start();
$status = $_SESSION['status'];
session_write_close();
?>
        <meta charset="utf-8" />
        <title>Mini-chat</title>
    <style>
    form
    {
        text-align:center;
    }
    </style>
    <body>
    
    
    <? if ($status != 1 || $status != 2) {
        echo "Nous sommes désolés, mais vous vous êtes probablement trompés d'endroit.
        Soit vous n'avez pas les permissions nécessaires pour accéder à cette page, soit vous
        l'avez mal tapée.";} 
        else if ($status == 1 || $status == 2) {
        echo '<form action="../PHP/manage/staffChatPost.php" method="post">
        <p>
        <label for="message">Message</label> :  <input type="text" name="message" id="message" /><br />

        <input type="submit" value="Envoyer" />
	</p>
    </form>';};?>

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

// Vérification utilisateur pour éviter tout conflit de chat avec des messages
$userStatus = $_SESSION['status'];

// Récupération des 10 derniers messages
$reponse = $bdd->prepare("SELECT userID, chatMESSAGE FROM chat ORDER BY ID DESC LIMIT 0, 10 WHERE userSTATUS = $userStatus");
$reponse->execute();
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