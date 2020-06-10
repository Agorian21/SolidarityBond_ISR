<?php
session_start();
$id = $_SESSION['id'];
$time = date_create();
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=solidarity_bond;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO chat (userID, chatMESSAGE, chatTIMER) VALUES(?, ?, ?)');
$req->execute(array($id, $_POST['message'], $time));

// Redirection du visiteur vers la page du minichat
header('Location: minichat.php');
?>