<?php
include('bdd.php');
if($_POST['formScript'] == "Ajouter") {
    $nom = htmlspecialchars($_POST['name']);
    $description = htmlspecialchars($_POST['description']);
    $category = htmlspecialchars($_POST['category']);
    $pic_url = htmlspecialchars($_POST['pic_url']);
    $price = htmlspecialchars($_POST['price']);
    $stock = htmlspecialchars($_POST['stock']);
    $campus = htmlspecialchars($_POST['campus']);
    if(isset($nom) && isset($description) && isset($category) && isset($pic_url) && isset($price) && isset($stock) && isset($campus)) {
        $req = $bdd->prepare("SELECT * FROM shop_products WHERE name = ?");
        $req->execute(array($nom));
        $articleexist = $req->rowCount();
        if($articleexist == 0) {
            // use exec() because no results are returned
            $insertmbr = $bdd->prepare("INSERT INTO shop_products (name, description, category, pic_url, price, stock, id_CESI_Campuses) VALUES ('$nom', '$description', '$category', '$pic_url', '$price', '$stock', '$campus')");
            $insertmbr->execute();
            $connexion = $insertmbr->fetch() ? "OK" : "NOK";
            echo $connexion;
        }else{
            echo "Article déjà existant dans la base de données."; 
        }
    }
}
else if($_POST['formScript'] == "Modifier") {
    $id = htmlspecialchars($_POST['id']);
    $nom = htmlspecialchars($_POST['name']);
    $description = htmlspecialchars($_POST['description']);
    $category = htmlspecialchars($_POST['category']);
    $pic_url = htmlspecialchars($_POST['pic_url']);
    $price = htmlspecialchars($_POST['price']);
    $stock = htmlspecialchars($_POST['stock']);
    $campus = htmlspecialchars($_POST['campus']);
    if(isset($id) && isset($nom) && isset($description) && isset($category) && isset($pic_url) && isset($price) && isset($stock) && isset($campus)) {
        $req = $bdd->prepare("SELECT * FROM shop_products WHERE id = ?");
        $req->execute(array($id));
        $articleexist = $req->rowCount();
        if($articleexist == 1) {
            // use exec() because no results are returned
            $insertmbr = $bdd->prepare("UPDATE shop_products SET name = '$nom', description = '$description', category = '$category', pic_url = '$pic_url', price = '$price', stock = '$stock', id_CESI_Campuses = '$campus') WHERE id = '$id'");
            $insertmbr->execute();
            $connexion = "Article modifié !";
            echo $connexion;
        }else{
            echo "Article non existant dans la base de données."; 
        }
    }
}
else if($_POST['formScript'] == "Supprimer") {
    $id = htmlspecialchars($_POST['id']);                                 
    if(isset($id)) {
        $req = $bdd->prepare("SELECT * FROM shop_products WHERE id = ?");
        $req->execute(array($id));
        $articleexist = $req->rowCount();
        if($articleexist == 1) {
            // use exec() because no results are returned
            $insertmbr = $bdd->prepare("DELETE FROM shop_products WHERE id = '$id'");
            $insertmbr->execute();
            $connexion = "Article supprimé !";
            echo $connexion;
        }else{
            echo "Article non créé, une erreur est survenue"; 
        }
    }
}
?>