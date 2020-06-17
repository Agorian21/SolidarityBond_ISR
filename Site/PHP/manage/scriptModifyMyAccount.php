<?php
include('bdd.php');
if(empty($_POST['formPasswordChange']) && !empty($_POST['formEmailChange'] && $_POST['formEmailChange'] == "Modifier")) {
    session_start();
    $mail = $_POST["mail"];
    $mail2 = $_POST["mail2"];
    $id = $_SESSION['id'];
    session_write_close();
    if(isset($mail) && isset($mail2) && ($mail == $mail2) && filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            // use exec() because no results are returned
            $insertmbr = $bdd->prepare("UPDATE user SET userMAIL = '$mail' WHERE userID = '$id'");
            $insertmbr->execute();
            session_start();
            $_SESSION['mail'] = $mail;
            session_write_close();
            header("Location: ../../HTML/myAccount.php");
        }else{
            echo "L'email entré est invalide, veuillez réessayer"; 
        }
}
else if(empty($_POST['formEmailChange']) && !empty($_POST['formPasswordChange']) && $_POST['formPasswordChange'] == "Modifier") {
    session_start();
    $password = sha1($_POST['password']);
    $password2 = sha1($_POST['password2']);
    $id = $_SESSION['id'];
    session_write_close();
    if(isset($id) && isset($password) && isset($password2)) {
        if((preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])/', $_POST['password'])) == 1) {
        $req = $bdd->prepare("UPDATE user SET userPASSWORD = $password WHERE userID = $id");
        $req->execute();
        header("Location: ../../HTML/myAccount.php");
        echo "Mot de passe modifié.";
        }else{
            echo "Le mot de passe renseigné ne correspond pas aux critères demandés."; 
        }
    }
}
?>