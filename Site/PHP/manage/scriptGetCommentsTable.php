<?php
include('bdd.php');
$requete = $bdd->prepare("SELECT pictures_comments.id, site_users.name, site_users.surname, pictures_comments.content, pictures_comments.visibility, bde_events.name AS event_name FROM site_users INNER JOIN pictures_comments ON site_users.id = pictures_comments.id_Site_Users INNER JOIN event_pictures ON pictures_comments.id_Event_Pictures = event_pictures.id INNER JOIN bde_events ON event_pictures.id_BDE_Events = bde_events.id ORDER BY bde_events.name ASC");
$requete->execute();
foreach(($requete->fetchAll(PDO::FETCH_ASSOC)) as $answer) {
    echo "<tr><td>" . $answer['id']. "</td><td>" . $answer['content'] . "</td><td>" . $answer['visibility'] . "</td><td>" . $answer['name']." ". $answer['surname'] . "</td><td>"
    . $answer['event_name'] . "</td></tr>";}
?>