<?php
include("bdd.php");
$campusid = $_POST['campus'];
$requete = $bdd->prepare("SELECT id, name FROM cesi_campuses WHERE id= $campusid");  
$requete->execute();
$answer = $requete->fetch(PDO::FETCH_ASSOC);
session_start();
$_SESSION['campus'] = $answer['name'];
$_SESSION['id_campus'] = $answer['id'];
session_write_close();
$requete->closeCursor();
header('Location: ../../HTML/portal.php');
?>