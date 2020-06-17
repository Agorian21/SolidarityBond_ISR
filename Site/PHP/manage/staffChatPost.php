<?php
session_start();
$id = $_SESSION['id'];
$status = $_SESSION['status'];
$message = htmlspecialchars($_POST['message']);
session_write_close();
include("bdd.php");
date_default_timezone_set('UTC');
$time = date('Y-m-d');
if($_SESSION["status"] == 2) {
$chatFor = 1;
} else if ($_SESSION['status'] == 1) {
$chatFor = 2;
}
// Insertion du message à l'aide d'une requête préparée
if (!empty($_POST['message'])){
$req = $bdd->prepare("INSERT INTO chat (userID, userSTATUS, chatMESSAGE, chatTIMER, chatFOR) VALUES ('$id', '$status', '$message', '$time', '$chatFor')");
$req->execute();
}
else if (empty($_POST['message'])) {
echo "Vous avez essayé d'envoyer un message vide...";
}

// Redirection du visiteur vers la page du minichat
header("Location: ../../HTML/staffChat.php")
?>