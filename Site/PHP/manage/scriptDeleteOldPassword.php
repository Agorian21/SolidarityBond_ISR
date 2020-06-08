<?php
session_start();
$id_campus = $_SESSION['id_campus'];
session_write_close();
$mail = htmlspecialchars($_POST['mail']);
include('bdd.php');                             
if(isset($mail)) {
$req = $bdd->prepare("SELECT id, mail, id_CESI_Campuses FROM site_users WHERE mail = '$mail'");
$req->execute();
$cesi_CampusToCompare = $req->fetch(PDO::FETCH_ASSOC);
session_start();
$_SESSION['id_userwhoforgetted'] = $cesi_CampusToCompare['id'];
$id_userwhoforgetted = $_SESSION['id_userwhoforgetted'];
session_write_close();
if($id_campus == $cesi_CampusToCompare['id_CESI_Campuses']) {                                           
  header('Location: ../../HTML/forgetmdpstep2.php?id='. $id_userwhoforgetted);
  }
  else {
    echo "Vous n'êtes pas dans le même campus que celui que vous avez choisi. La demande est donc rejetée.";
  }
}
?>