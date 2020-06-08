<?php
include('bdd.php');
$requete = $bdd->prepare('SELECT * FROM `event_pictures`');
$requete->execute();
foreach(($requete->fetchAll(PDO::FETCH_ASSOC)) as $answer) {
    echo '<div class="article">
            <div class="img">
                <div id="id_product" name="'.$answer['id'].'" style="visibility:hidden;"></div>
                        <img src="'.$answer['pic_url'].'" style="max-width: 100%;" alt="bdd_pic">
                <div class="desc">'.basename($answer['pic_url']).'</div>
                <form method="post" action="../PHP/manage/scriptDownloadPicture.php?id_pic='.$answer['id'].'"> 
                <input type="submit" name="formDownload" value="Télécharger">
                </form>
            </div>
        </div>';}
?>