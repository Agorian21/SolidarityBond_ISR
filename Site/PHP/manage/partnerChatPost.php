<?php
session_start();
$id = $_SESSION['id'];
$status = $_SESSION['status'];
$message = htmlspecialchars($_POST['message']);
session_write_close();
date_default_timezone_set('UTC');
$time = date('Y-m-d');
// Connexion à la base de données
try
{
	include("bdd.php");
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Insertion du message à l'aide d'une requête préparée
if (!empty($_POST['message'])){
$req = $bdd->prepare("INSERT INTO chat (userID, userSTATUS, chatMESSAGE, chatTIMER) VALUES ('$id', '$status', '$message', '$time')");
$req->execute();
}
else if (empty($_POST['message'])) {
        echo "Vous avez essayé d'envoyer un message vide...";
}

// Redirection du visiteur vers la page du minichat

header('Location: ../../HTML/staffChat.php');
?>