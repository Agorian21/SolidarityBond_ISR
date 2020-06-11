<?php
include('bdd.php');
if($_POST['formInscription'] == "S'inscrire") {
    $nom = htmlspecialchars($_POST['name']);
    $prenom = htmlspecialchars($_POST['surname']);
    $mail = htmlspecialchars($_POST['mail']);
    $mail2 = htmlspecialchars($_POST['mail2']);
    $password = sha1($_POST['password']);
    $password2 = sha1($_POST['password2']);
    $campus = htmlspecialchars($_POST['campus']);
    $testval = true;
    if(isset($nom) && isset($prenom) && isset($mail) && isset($mail2) && isset($password) && isset($password2) && isset($campus)) {
        $nomlength = strlen($nom);
        if($nomlength <= 255) {
            if($mail == $mail2) {
                if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                    $reqmail = $bdd->prepare("SELECT * FROM user WHERE mail = ?");
                    $reqmail->execute(array($mail));
                    $mailexist = $reqmail->rowCount();
                    if($mailexist == 0) {
                        if((preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])/', $_POST['password'])) == 1) {
                            $testval = true;
                            echo "Mot de passe valide ";
                            header('Location: ../../HTML/index.php');
                        }else{
                            $testval = false;
                            echo "Mot de passe non conforme, on requiert au moins une majuscule et un chiffre ";
                        }
                    }
                    if($password == $password2 && $testval == true) {
                        // use exec() because no results are returned
                        $insertmbr = $bdd->prepare("INSERT INTO user (name, surname, mail, password, id_CESI_Campuses) VALUES ('$nom', '$prenom', '$mail', '$password', '$campus')");
                        $insertmbr->execute();
                        $connexion = $insertmbr->fetch() ? "Votre compte a bien été créé !" : "Echec de la création de l'utilisateur";
                        echo $connexion;
                    }else{
                        $erreur = "Vos mots de passes ne correspondent pas !";
                        echo $erreur;
                    }
            }else{
                $erreur = "Adresse mail déjà utilisée !";
                echo $erreur;
            }
            }else{
                $erreur = "Votre adresse mail n'est pas valide !";
                echo $erreur;
            }
            }else{
                $erreur = "Vos adresses mail ne correspondent pas !";
                echo $erreur;
            }
            }else{
        $erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
        echo $erreur;
        }
    }else{
    $erreur = "Tous les champs doivent être complétés !";
    echo $erreur;
}
?>