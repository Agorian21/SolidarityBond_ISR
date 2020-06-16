<?php
// Connexion à la base de données
include("bdd.php");
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