<?php
include('bdd.php');
$event = $_GET['pic_event'];
    $reqEventI = $bdd->prepare("SELECT * FROM pictures_comments WHERE id_Event_Pictures = $event");
    $reqEventI->execute();
    $eventExist = $reqEventI->rowCount();
    foreach(($reqEventI->fetchAll(PDO::FETCH_ASSOC)) as $connexion2){
            $answer= "<p>Commentaire :</p>
			<p><?=$connexion2['content']?></p>
			<br>";
}
?>