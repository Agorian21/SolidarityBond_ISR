<?php
        include('bdd.php');
        $event = $_GET['pic_event'];
        $requete = $bdd->prepare("SELECT pictures_comments.id, site_users.name, site_users.surname, pictures_comments.content, pictures_comments.visibility FROM site_users INNER JOIN pictures_comments ON site_users.id = pictures_comments.id_Site_Users INNER JOIN event_pictures ON pictures_comments.id_Event_Pictures = event_pictures.id WHERE event_pictures.id = $event");
        $requete->execute();
        foreach(($requete->fetchAll(PDO::FETCH_ASSOC)) as $answer) {
            echo '<div class="article">
            <div class="event">
            <div id="id_comment" name="'.$answer['id'].'" style="visibility:hidden;"></div>
                <span class="desc"><strong>'.$answer['name']. " ". $answer['surname']. "</strong> : ". $answer['content'].'</span></a>
            </div>
        </div>';}
?>