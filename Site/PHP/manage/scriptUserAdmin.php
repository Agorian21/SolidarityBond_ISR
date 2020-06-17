<?php
include('bdd.php');
if($_POST['formInscription'] == "Ajouter") {
    $nom = htmlspecialchars($_POST['name']);
    $prenom = htmlspecialchars($_POST['surname']);
    $mail = htmlspecialchars($_POST['mail']);
    $password = sha1($_POST['password']);
    $status = htmlspecialchars($_POST['status']);
    if(isset($nom) && isset($prenom) && isset($mail) && isset($password) && isset($status)) {
        $insertmbr = $bdd->prepare("INSERT INTO user (userFIRSTNAME, userLASTNAME, userMAIL, userPASSWORD, userSTATUS) VALUES ('$nom', '$prenom', '$mail', '$password', '$status')");
        $insertmbr->execute();
        var_dump($insertmbr);
        $connexion = $insertmbr->fetch() ? "Votre compte a bien été créé !" : "Echec de la création de l'utilisateur";
        echo $connexion;
        } else {
            $erreur = "Vos mots de passes ne correspondent pas !";
            echo $erreur;
    }
} else if($_POST['formScript'] == "Modifier") {
    $id = htmlspecialchars($_POST['id']);
    $nom = htmlspecialchars($_POST['name']);
    $prenom = htmlspecialchars($_POST['surname']);
    $mail = htmlspecialchars($_POST['mail']);
    $password = sha1($_POST['password']);
    $status = htmlspecialchars($_POST['status']);
    $testval = true;

    if(isset($id) && isset($nom) && isset($prenom) && isset($mail) && isset($password)) {
        $insertmbr = $bdd->prepare("UPDATE user SET userFIRSTNAME = '$nom', userLASTNAME = '$prenom', userMAIL = '$mail', userPASSWORD = '$password', userSTATUS = '$status' WHERE userID = '$id'");
        $insertmbr->execute();
        $connexion = $insertmbr->fetch() ? "Votre compte a bien été modifié !" : "Erreur, votre compte n'a pas été modifié.";
        echo $connexion;
        }else {
        $erreur = "Vos mots de passes ne correspondent pas !";
        echo $erreur;
    }
} else if ($_POST['formScript'] == "Supprimer"){
    $id = htmlspecialchars($_POST['id']);                             
    if(isset($id)) {
    $req = $bdd->prepare("DELETE FROM user WHERE $id");
    $req->execute();
    }
}
?>