<?php
header('Location: ../../HTML/adminComments.php');
$id = htmlspecialchars($_POST['id']);
include('bdd.php');                             
if(isset($id)) {
$req = $bdd->prepare("SELECT * FROM pictures_comments WHERE id = '$id'");
$req->execute();
$commentexist = $req->rowCount();
if($commentexist == 1) {                                           
  $insertmbr = $bdd->prepare("DELETE FROM pictures_comments WHERE id = '$id'");
  $insertmbr->execute();
  }
}
?>