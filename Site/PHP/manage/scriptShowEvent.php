<?php
include('bdd.php');
$id_campus = $_SESSION['id_campus'];
$requete = $bdd->prepare("SELECT id, name, date, description, price, days_recursive FROM bde_events WHERE id_CESI_Campuses = $id_campus");
$requete->execute();
foreach(($requete->fetchAll(PDO::FETCH_ASSOC)) as $answer) {
     echo '<div class="article">
                <div class="event">
                    <div id="id_event" name="'.$answer['id'].'" style="visibility:hidden;"></div>
                    <a target="_blank" href="event.php?event='.$answer['id'].'"><span class="desc">'.$answer['name'].'</span></a>
                </div>
            </div>';
}?>