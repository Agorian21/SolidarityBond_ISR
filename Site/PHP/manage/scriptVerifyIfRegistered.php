<?php
include('bdd.php');
// Check connection
$result = $bdd->prepare("SELECT * FROM can_participate WHERE id_user = :iduser AND id = :idevent");
$result->bindValue(':iduser', $_SESSION['id'], PDO::PARAM_INT);
$result->bindValue(':idevent', $_GET['event'], PDO::PARAM_INT);
$result->execute();
if((count($result->fetchAll(PDO::FETCH_ASSOC))) == 1){
    echo '<input type="submit" id="button" value="Vous êtes inscrit" disabled>
		  <p> Si vous devez vous désinscrire (pour quelconque raison), veuillez appeler le numéro suivant : 06 76 67 59 80 </p>
          <br /><h2>Photos :</h2><br />
            <form action="../PHP/manage/postpic.php?id_event='. $_GET['event'] .'" method="post" enctype="multipart/form-data">
                Sélectionnez une image à uploader
                <input type="file" name="content" id="fileToUpload">
                <input type="submit" value="Upload Image" name="submit">
            </form>
        </div>';} 
else if ((count($result->fetchAll(PDO::FETCH_ASSOC))) == 0){
     echo '<form method="post" action="../PHP/manage/scriptInscriptionEtudiant.php?id_event='. $_GET['event'] .'">
            <input type="submit" id="button" value="Inscrivez-vous">
            </form>';
}
?>       