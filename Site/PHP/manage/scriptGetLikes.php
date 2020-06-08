<?php
include('bdd.php');
// Check connection
$result2 = $bdd->prepare("SELECT * from likes_pictures WHERE id_Event_Pictures = :idevent");
$result2->bindValue(':idevent', $_GET['pic_event'], PDO::PARAM_INT);
$result2->execute();
$likes = count($result2->fetchAll(PDO::FETCH_ASSOC));
echo '<legend>'. $likes .' personne(s) ont liké cette photo.</legend>';
$result = $bdd->prepare("SELECT * FROM likes_pictures WHERE id_Site_Users = :iduser AND id_Event_Pictures = :idevent");
$result->bindValue(':iduser', $_SESSION['id'], PDO::PARAM_INT);
$result->bindValue(':idevent', $_GET['pic_event'], PDO::PARAM_INT);
$result->execute();
if((count($result->fetchAll(PDO::FETCH_ASSOC))) == 1){
    echo '<input type="submit" id="button" value="Vous avez liké" disabled>';} 
else if ((count($result->fetchAll(PDO::FETCH_ASSOC)))  == 0){
    echo '<form method="post" action="../PHP/manage/scriptLikePicture.php?pic_event='. $_GET['pic_event'] .'">
            <p>
                <label for="content">Si vous aimez à mort cette photo, hésitez pas à liker !</label><br />
                    <input type="submit" value="Liker" />
                    <br /> <br />
            </p>
        </form>';}
?>