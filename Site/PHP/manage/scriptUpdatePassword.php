<?php
include('bdd.php');
if($_POST['formForget'] == "Envoyer") {
    $password = htmlspecialchars(sha1($_POST['password']));
    $testval = true;
    session_start();
    $id_UserWhoForgetted = $_SESSION['id_userwhoforgetted'];
    if(isset($password)) {
        if((preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])/', $_POST['password'])) == 1) {
            $testval = true;
            echo "Mot de passe valide";
            $insertmbr = $bdd->prepare("UPDATE site_users SET `password` = '$password' WHERE id = $id_UserWhoForgetted");
            $insertmbr->execute();
            var_dump($insertmbr);
            header('Location: ../../HTML/portal.php');
            unset($_SESSION['id_userwhoforgetted']);
        }
        }else{
            $testval = false;
            echo "Mot de passe non conforme, on requiert au moins une majuscule et un chiffre ";
            }
}
?>