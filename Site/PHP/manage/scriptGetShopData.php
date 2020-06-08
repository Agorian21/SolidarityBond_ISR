<?php
include('bdd.php');
$id_campus = $_SESSION['id_campus'];
$requete = $bdd->prepare("SELECT id, name, description, pic_url, price FROM `shop_products` WHERE id_CESI_Campuses = $id_campus ORDER BY price DESC");
$requete->execute();
foreach(($requete->fetchAll(PDO::FETCH_ASSOC)) as $answer) {
    echo '<div class="article">
            <div class="img">
                <div id="id_product" name="'.$answer['id'].'" style="visibility:hidden;"></div>
                    <a target="_blank" href="article.php?article='.$answer['id'].'">
                        <img src="'.$answer['pic_url'].'" alt="bdd_pic">
                    </a>
                <div class="desc">'.$answer['name'].'</div>
            </div>
        </div>';}
?>