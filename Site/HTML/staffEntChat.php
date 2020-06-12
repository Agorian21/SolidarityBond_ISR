<!DOCTYPE html>
<html>
<meta charset="utf-8" />
<title>Mini-chat</title>
<?php include("head.php");
include("header.php"); 
if(isset($_SESSION['status'])) {
$status = $_SESSION['status'];
} else if (!isset($_SESSION['status'])) {
    echo 'Vous devez être connecté pour effectuer cette opération.';
    include("footer.php");
    exit();
}?>
    <style>
    form
    {
        text-align:center;
    }
    </style>
    <body>
    
    <?php if ($_SESSION['status'] == 1) {
        echo "Nous sommes désolés, mais vous vous êtes probablement trompés d'endroit.
        Soit vous n'avez pas les permissions nécessaires pour accéder à cette page, soit vous
        l'avez mal tapée.";} 
        else if ($_SESSION['status'] == 0 || $_SESSION['status'] == 2) {
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
	include("../PHP/manage/bdd.php");
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Vérification utilisateur pour éviter tout conflit de chat avec des messages
$userStatus = $_SESSION['status'];

// Récupération des 10 derniers messages
$reponse = $bdd->prepare("SELECT userID, chatMESSAGE FROM chat WHERE userSTATUS = :userstatus ORDER BY chatID DESC LIMIT 0, 10");
$reponse->bindValue(':userstatus', $userStatus, PDO::PARAM_INT);
$reponse->execute();
$answer1 = $reponse->fetchAll(PDO::FETCH_ASSOC);
$idUser = $answer1[0]['userID'];
// Récupération nom et prénom utilisateur
$requeteForUser = $bdd->prepare('SELECT userFIRSTNAME, userLASTNAME from user WHERE userID=:id');
$requeteForUser->bindValue(':id', $idUser, PDO::PARAM_STR);
$requeteForUser->execute();
$userInfo = $requeteForUser->fetchAll(PDO::FETCH_ASSOC);
if ($userInfo == false){
    echo "Aucun message envoyé dans le chat à ce jour.";
}
else {
    $userData = implode(' ', $userInfo[0]);
}
$requeteForUser->closeCursor();
// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
foreach ($answer1 as $donnees)
{
    echo '<p><strong>' . htmlspecialchars($userData) . '</strong> : ' . htmlspecialchars($donnees['chatMESSAGE']) . '</p>';
}

$reponse->closeCursor();

?>
    </body>
<?php include("footer.php"); ?>
</html>