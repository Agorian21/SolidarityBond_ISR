<?php

include("bdd.php");

if (isset($_GET["formSearch"]) && $_GET["formSearch"] == "Rechercher")
{
    $terme = htmlspecialchars($_GET["terme"]); //pour sécuriser le formulaire contre les failles html
    if (isset($terme))
    {
        $terme = strtolower($terme);
        $terme = substr($terme, 1);
		session_start();
		$id_campus = $_SESSION['id_campus'];
		session_write_close();
        $select_terme = $bdd->prepare("SELECT id, name, description, pic_url FROM shop_products WHERE name LIKE '%$terme%' AND id_CESI_Campuses = $id_campus");
        $select_terme->execute();
            foreach($select_terme->fetchAll(PDO::FETCH_ASSOC) as $answer) {
                echo '<div class="article">
                        <div class="img">
                            <div id="id_product" name="'.$answer['id'].'" style="visibility:hidden;"></div>
                                <a target="_blank" href="article.php?article='.$answer['id'].'">
                                    <img src="'.$answer['pic_url'].'" alt="bdd_pic">
                                </a>
                            <div class="desc">'.$answer['name'].'</div>
                        </div>
                    </div>';}
            $select_terme->closeCursor();
            unset($_GET["terme"]);
        }
}
?>