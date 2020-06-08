<?php
include('bdd.php');
     $reqEventI = $bdd->prepare("SELECT * FROM event_pictures WHERE id_BDE_Events = ?");
                $reqEventI->execute(array($_GET['event']));
                $eventExist = $reqEventI->rowCount();
                if($eventExist >= 1) {
                        // use exec() because no results are returned
                            $connexion2 = $reqEventI->fetch(PDO::FETCH_ASSOC);
                        }else {
                            $erreur = "Eh bah non il n'y a pas d'image !";
                            echo $erreur;
                        }
?>