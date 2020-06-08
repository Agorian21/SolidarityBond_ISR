<?php
$id = htmlspecialchars($_POST['id']);
include('bdd.php');                             
if(isset($id)) {
$req = $bdd->prepare("SELECT * FROM site_users WHERE id = '$id'");
$req->execute();
$commentexist = $req->rowCount();
if($commentexist == 1) {                                           
  $insertmbr = $bdd->prepare("DELETE FROM site_users WHERE id = '$id'");
  $insertmbr->execute();
  }
  else {
       echo "Message non supprimé"; 
        }
}
?>