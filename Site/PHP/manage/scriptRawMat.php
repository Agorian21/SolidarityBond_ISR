<?php
include('bdd.php');
if($_POST['formScript'] == "Ajouter") {
    $nom = htmlspecialchars($_POST['name']);
    $description = htmlspecialchars($_POST['description']);
    $reason = htmlspecialchars($_POST['reason']);
    $quantity = htmlspecialchars($_POST['quantity']);
    if(isset($nom) && isset($description) && isset($reason) && isset($quantity)) {
        $req = $bdd->prepare("SELECT * FROM raw_material WHERE rawmatNAME = ?");
        $req->execute(array($nom));
        $articleexist = $req->rowCount();
        if($articleexist == 0) {
            // use exec() because no results are returned
            $insertmbr = $bdd->prepare("INSERT INTO raw_material (rawmatNAME, rawmatDESC, rawmatQUANTITY, rawmatREASON, isDemandTreated) VALUES ('$nom', '$description', '$reason', '$quantity', 0)");
            $insertmbr->execute();
            $connexion = $insertmbr->fetch() ? "OK" : "NOK";
            echo $connexion;
        }else{
            echo "Vous avez déjà déposé une demande similaire dans la base de donnée."; 
        }
    }
}
else if($_POST['formScript'] == "Modifier") {
    $id = htmlspecialchars($_POST['id']);
    $nom = htmlspecialchars($_POST['name']);
    $description = htmlspecialchars($_POST['description']);
    $reason = htmlspecialchars($_POST['reason']);
    $quantity = htmlspecialchars($_POST['quantity']);
    if(isset($id) && isset($nom) && isset($description) && isset($reason) && isset($quantity)) {
        $req = $bdd->prepare("SELECT * FROM raw_material WHERE matID = ?");
        $req->execute(array($id));
        $articleexist = $req->rowCount();
        if($articleexist == 1) {
            // use exec() because no results are returned
            $insertmbr = $bdd->prepare("UPDATE raw_material SET rawmatNAME = '$nom', rawmatDESC = '$description', rawmatREASON = '$reason', rawmatQUANTITY = '$quantity', isDemandTreated = 0) WHERE matID = '$id'");
            $insertmbr->execute();
            $connexion = "Demande modifiée";
            echo $connexion;
        }else{
            echo "Cette demande n'existe pas dans la base de données."; 
        }
    }
}
else if($_POST['formScript'] == "Supprimer") {
    $id = htmlspecialchars($_POST['id']);                                 
    if(isset($id)) {
        $req = $bdd->prepare("SELECT * FROM raw_material WHERE matID = ?");
        $req->execute(array($id));
        $articleexist = $req->rowCount();
        if($articleexist == 1) {
            // use exec() because no results are returned
            $insertmbr = $bdd->prepare("DELETE FROM raw_material WHERE matID = '$id'");
            $insertmbr->execute();
            $connexion = "Demande supprimée !";
            echo $connexion;
        }else{
            echo "Demande non supprimée, probablement car il n'existe pas dans la base de données."; 
        }
    }
}
?>