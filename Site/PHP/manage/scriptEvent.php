<?php
include('bdd.php');
if($_POST['formScript'] == "Ajouter") {
    $nom = htmlspecialchars($_POST['name']);
    $date = htmlspecialchars($_POST['date']);
    $description = htmlspecialchars($_POST['description']);
    $subcheck = (isset($_POST['paid_event'])) ? 1 : 0;
    $paid_event = htmlspecialchars($subcheck);
    $price = htmlspecialchars($_POST['price']);
    $subcheck2 = (isset($_POST['is_recursive'])) ? 1 : 0;
    $is_recursive = htmlspecialchars($subcheck2);
    $subcheck3 = (isset($_POST['days_recursive'])) ? 0 : 365;
    $days_recursive = htmlspecialchars($subcheck3);
    $campus = htmlspecialchars($_POST['campus']);

    if(isset($nom) && isset($date) && isset($description)) {
                $req = $bdd->prepare("SELECT * FROM bde_events WHERE name = ?");
                $req->execute(array($nom));
                $eventexist = $req->rowCount();
                if($eventexist == 0) {
                        // use exec() because no results are returned
                            $insertmbr = $bdd->prepare("INSERT INTO bde_events (name, date, description, paid_event, price, is_recursive, days_recursive, id_CESI_Campuses) VALUES ('$nom', '$date', '$description', '$paid_event', '$price', '$is_recursive', '$days_recursive', '$campus')");
                            $insertmbr->execute();
                            var_dump($insertmbr);
                            $connexion = "Evénement ajouté !";
                            echo $connexion;
                        } else {
                            echo "Oui mais non";
                        }
                    }
                }
                else if($_POST['formScript'] == "Modifier") {
                    $id = htmlspecialchars($_POST['id']);
                    $nom = htmlspecialchars($_POST['name']);
                    $date = htmlspecialchars($_POST['date']);
                    $description = htmlspecialchars($_POST['description']);
                    $subcheck = (isset($_POST['paid_event'])) ? 1 : 0;
                    $paid_event = htmlspecialchars($subcheck);
                    $price = htmlspecialchars($_POST['price']);
                    $subcheck2 = (isset($_POST['is_recursive'])) ? 1 : 0;
                    $is_recursive = htmlspecialchars($subcheck2);
                    $subcheck3 = (isset($_POST['days_recursive'])) ? 0 : 365;
                    $days_recursive = htmlspecialchars($subcheck3);
                    $id_campus = htmlspecialchars($_POST['campus']);
                 
                     if(isset($id) && isset($nom) && isset($date) && isset($description)) {
                                 $req = $bdd->prepare("SELECT * FROM bde_events WHERE id = ?");
                                 $req->execute(array($id));
                                 $articleexist = $req->rowCount();
                                 if($articleexist == 1) {
                                         // use exec() because no results are returned
                                             $insertmbr = $bdd->prepare("UPDATE bde_events SET name = '$nom', date = '$date', description = '$description', paid_event = '$paid_event', price = '$price', is_recursive = '$is_recursive', days_recursive = '$days_recursive', id_CESI_Campuses = '$id_campus' WHERE id = '$id'");
                                             $insertmbr->execute();
                                             var_dump($insertmbr);
                                             $connexion = "Evénement modifié !";
                                             echo $connexion;
                                         }
                                         else {
                                            echo "Article non existant dans la base de données."; 
                                        }
                                     }
                                 }
                                 else if($_POST['formScript'] == "Supprimer") {
                                    $id = htmlspecialchars($_POST['id']);
                                 
                                     if(isset($id)) {
                                                 $req = $bdd->prepare("SELECT * FROM bde_events WHERE id = ?");
                                                 $req->execute(array($id));
                                                 $articleexist = $req->rowCount();
                                                 if($articleexist == 1) {
                                                         // use exec() because no results are returned
                                                             $insertmbr = $bdd->prepare("DELETE FROM bde_events WHERE id = '$id'");
                                                             $insertmbr->execute();
                                                             $connexion = "Article supprimé !";
                                                             echo $connexion;
                                                         }
                                                         else {
                                                            echo "Evénement non supprimé, une erreur est survenue"; 
                                                        }
                                                     }
                                                 }
?>