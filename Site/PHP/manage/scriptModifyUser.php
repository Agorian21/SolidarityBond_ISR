<?php
include('bdd.php');
if($_POST['formScript'] == "Modifier") {
    $id = htmlspecialchars($_POST['id']);
    $nom = htmlspecialchars($_POST['name']);
    $prenom = htmlspecialchars($_POST['surname']);
    $mail = htmlspecialchars($_POST['mail']);
    $password = sha1($_POST['password']);
    $campus = htmlspecialchars($_POST['campus']);
    $testval = true;

    if(isset($id) && isset($nom) && isset($prenom) && isset($mail) && isset($password) && isset($campus)) {
                            $insertmbr = $bdd->prepare("UPDATE site_users SET name = '$nom', surname = '$prenom', mail = '$mail', password = '$password', id_CESI_Campuses = '$campus' WHERE id = '$id'");
                            $insertmbr->execute();
                            $connexion = $insertmbr->fetch() ? "Votre compte a bien été modifié !" : "va te faire voir chez les grecs esti d'enculé";
                            echo $connexion;
                        }else {
                            $erreur = "Vos mots de passes ne correspondent pas !";
                            echo $erreur;
                        }
}
?>