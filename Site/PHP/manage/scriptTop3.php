<?php
include("bdd.php");
$req = $bdd->prepare("SELECT id, name, description, pic_url, price, stock FROM shop_products WHERE stock < 9999 ORDER BY `shop_products`.`stock` ASC LIMIT 3");
$req->execute();

foreach($req->fetchAll(PDO::FETCH_ASSOC) as $answer) {
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