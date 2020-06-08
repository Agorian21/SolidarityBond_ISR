<?php
include('bdd.php');
$reqEvent = $bdd->prepare("SELECT * FROM bde_events WHERE id = ?");
$reqEvent->execute(array($_GET['event']));
$eventExist = $reqEvent->rowCount();
if($eventExist >= 1) {
    $connexion = $reqEvent->fetch(PDO::FETCH_ASSOC);}
    else {
            $erreur = "Eh bah non pas d'Event!";
            echo $erreur;
        }
?>