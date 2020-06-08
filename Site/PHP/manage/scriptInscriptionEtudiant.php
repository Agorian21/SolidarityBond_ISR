<?php
session_start();
$id_event = $_GET['id_event'];
$id_user = $_SESSION['id'];
session_write_close();
include('bdd.php');
$reqinscription = $bdd->prepare("INSERT INTO can_participate VALUES ('$id_event','$id_user')");
$reqinscription->execute();
$connexion = $reqinscription->fetch() ? 'OK' : 'NOK';
header('Location: ../../HTML/events.php');
?>