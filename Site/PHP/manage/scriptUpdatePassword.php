<?php
include('bdd.php');
if($_POST['formForget'] == "Envoyer") {
    $password = htmlspecialchars(sha1($_POST['password']));
    session_start();
    $id_UserWhoForgetted = $_SESSION['id_userwhoforgetted'];
    if(isset($password)) {
        if((preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])/', $_POST['password'])) == 1) {
            echo "Mot de passe valide";
            $insertmbr = $bdd->prepare("UPDATE user SET `password` = '$password' WHERE id = $id_UserWhoForgetted");
            $insertmbr->execute();
            unset($_SESSION['id_userwhoforgetted']);
            session_write_close();
            header('Location: ../../HTML/index.php');}
    }else{
        echo "Mot de passe non conforme, on requiert au moins une majuscule et un chiffre ";
    }
}
?>