<?php
include('bdd.php');
if($_POST['formScript'] == "Ajouter") {
    $nom = htmlspecialchars($_POST['name']);
    $description = htmlspecialchars($_POST['description']);
    $pic_url = htmlspecialchars($_POST['pic_url']);
    $stock = htmlspecialchars($_POST['stock']);
    if(isset($nom) && isset($description) && isset($pic_url) && isset($stock)) {
        $req = $bdd->prepare("SELECT * FROM product WHERE productNAME = ?");
        $req->execute(array($nom));
        $articleexist = $req->rowCount();
        if($articleexist == 0) {
            // use exec() because no results are returned
            $insertmbr = $bdd->prepare("INSERT INTO product (productNAME, productDESC, picURL, productSTOCK) VALUES ('$nom', '$description', '$pic_url', '$stock')");
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
    $pic_url = htmlspecialchars($_POST['pic_url']);
    $stock = htmlspecialchars($_POST['stock']);
    if(isset($id) && isset($nom) && isset($description) && isset($pic_url) && isset($stock)) {
        $req = $bdd->prepare("SELECT * FROM product WHERE id = ?");
        $req->execute(array($id));
        $articleexist = $req->rowCount();
        if($articleexist == 1) {
            // use exec() because no results are returned
            $insertmbr = $bdd->prepare("UPDATE product SET productNAME = '$nom', productDESC = '$description', picURL = '$pic_url', productSTOCK = '$stock') WHERE productID = '$id'");
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
        $req = $bdd->prepare("SELECT * FROM product WHERE productID = ?");
        $req->execute(array($id));
        $articleexist = $req->rowCount();
        if($articleexist == 1) {
            // use exec() because no results are returned
            $insertmbr = $bdd->prepare("DELETE FROM product WHERE productID = '$id'");
            $insertmbr->execute();
            $connexion = "Article supprimé !";
            echo $connexion;
        }else{
            echo "Article non supprimé, probablement car il n'existe pas dans la base de données."; 
        }
    }
}
?>