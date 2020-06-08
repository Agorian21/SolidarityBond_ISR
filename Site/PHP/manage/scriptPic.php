<?php
include('bdd.php');
$event = $_GET['event'];
$requete = $bdd->prepare("SELECT id, pic_url, id_BDE_Events FROM event_pictures WHERE id_BDE_Events = $event");
$requete->execute();
echo '<br><legend> Photos uploadées : </legend>';
foreach(($requete->fetchAll(PDO::FETCH_ASSOC)) as $answer) {
    echo '<div class="article">
    <div class="event">
        <div id="id_event" name="'.$answer['id'].'" style="visibility:hidden;"></div>
            <a href="photo.php?pic_event='.$answer['id'].'"><img src="'.$answer['pic_url'].'" alt="event_photo"></a>   
        </div>
    </div>';}
?>