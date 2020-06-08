<?php
session_start();
$id_event = $_GET['pic_event'];
$id_user = $_SESSION['id'];
include('bdd.php');
$reqlike = $bdd->prepare("INSERT INTO likes_pictures (id_Site_Users, id_Event_Pictures) VALUES ('$id_user', '$id_event')");
$reqlike->execute();
header('Location: ../../HTML/events.php');
?>