<?php
$id_campus = $_SESSION['id_campus'];
if($_POST['formSearch'] == "Valider votre recherche par thème")
{
    if(isset($_POST['price'])){	
        if($_POST['price']=="range1"){
            $low = 1; $high = 20;
        }
        else if($_POST['price']=="range2"){
            $low = 20; $high = 40;
        }
        else if($_POST['price']=="range3"){
            $low = 40; $high = 60;
        } 
    }
    
    $category = $_POST['category'];
        if(isset($_POST['price']) && isset($_POST['category'])) { 
            $req = $bdd->prepare("SELECT id, name, description, pic_url, price FROM shop_products WHERE category ='$category' AND price BETWEEN $low AND $high WHERE id_CESI_Campuses = $id_campus");
            $req->execute();
        } if(isset($_POST['price']) && empty($_POST['category'])){
            $req = $bdd->prepare("SELECT id, name, description, pic_url, price FROM shop_products WHERE price BETWEEN $low AND $high WHERE id_CESI_Campuses = $id_campus");
            $req->execute();
        } if(isset($_POST['category']) && empty($_POST['price'])){
            $req = $bdd->prepare("SELECT id, name, description, pic_url, price FROM shop_products WHERE category ='$category' WHERE id_CESI_Campuses = $id_campus");
            $req->execute();
        } if(empty($_POST['category']) && empty($_POST['price'])){
            $req = $bdd->prepare("SELECT id, name, description, pic_url, price FROM shop_products WHERE id_CESI_Campuses = $id_campus");
            $req->execute();
        };
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
}
?>