<?php
// Connexion à la base de données
include("bdd.php");
// Récupération des 10 derniers messages
$reponse = $bdd->query("SELECT `user`.userFIRSTNAME, `user`.userLASTNAME, `chat`.userID, `chat`.chatMESSAGE FROM `chat` INNER JOIN `user` ON `chat`.userID = `user`.userID WHERE `chat`.userSTATUS = 2 AND `chat`.chatFOR = 1 OR `chat`.userSTATUS = 1 ORDER BY chatID DESC LIMIT 0, 10");
$userInfo = $reponse->fetchAll(PDO::FETCH_ASSOC);
if ($userInfo == false){
    echo "Aucun message envoyé dans le chat à ce jour.";
}
$reponse->closeCursor();
// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
foreach ($userInfo as $donnees)
{
    echo '<p><strong>' . htmlspecialchars($donnees["userFIRSTNAME"] . " " . $donnees["userLASTNAME"]) . '</strong> : ' . htmlspecialchars($donnees['chatMESSAGE']) . '</p>';
}
?>