<?php
session_start();
include('bdd.php');
if($_POST['check'] == "Envoyer") {
   $iduser = ($_SESSION['id']);
   $comment = htmlspecialchars($_POST['commentaire']);
   $commentmagique = addslashes($comment);
   $ideventpic = ($_GET['pic_event']);

    if(isset($iduser) && isset($comment) && isset($ideventpic)) {
                        // use exec() because no results are returned
                            $insertcmt = $bdd->prepare("INSERT INTO pictures_comments (content, id_Site_Users, id_Event_Pictures) VALUES ('$commentmagique', '$iduser', '$ideventpic')");
                            $insertcmt->execute();
                            header('Location: ../../HTML/events.php');
                        }
                    }
?>