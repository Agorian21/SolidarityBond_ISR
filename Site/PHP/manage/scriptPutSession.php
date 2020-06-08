<?php
$campus = $_GET['campus'];

include('bdd.php');
$ineedthissessionplease = $bdd->prepare("SELECT id, name FROM cesi_campuses WHERE id = $campus");
$ineedthissessionplease->execute();
$answer = $ineedthissessionplease->fetch(PDO::FETCH_ASSOC);
session_start();
$_SESSION['id_campus'] = $answer['id'];
$_SESSION['campus'] = $answer['name'];
var_dump($_SESSION);
session_write_close();

header('Location: ../../HTML/portal.php');
?>