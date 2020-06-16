<?php
// Initialisation de la session PHP et inclusion du fichier BDD
session_start();
include('bdd.php');
// Ajout des variables récupérées dans le POST précédemment envoyé par la page accounts.php
$mail = htmlspecialchars($_POST['mail']);
$pass = htmlspecialchars($_POST['password']);
$encpass = sha1($pass);
// Requête préparée pour empêcher les injections SQL 
$requete = $bdd->prepare("SELECT * FROM user WHERE userMAIL=:mail AND userPASSWORD=:pass"); 
// Liaison des variables de la requête préparée aux variables PHP 
$requete->bindValue(':mail', $mail, PDO::PARAM_STR);
$requete->bindValue(':pass', $encpass, PDO::PARAM_STR);
// Exécution de la requête 
$requete->execute();
$answer = $requete->fetch() ? 'Connexion réussie.' : 'Connexion échouée. Soit votre mot de passe, soit votre adresse est inconnue de nos serveurs.';
echo $answer;
$requete->closeCursor();
// Injection des données utilisateur dans les données de session PHP
if ($answer == "Connexion réussie.") {
    // Données session : Récupération nom, prénom et statut depuis la BDD
    $requete2 = $bdd->prepare("SELECT * FROM user WHERE userMAIL=:mail AND userPASSWORD=:pass");
    $requete2->bindValue(':mail', $mail, PDO::PARAM_STR);
    $requete2->bindValue(':pass', $encpass, PDO::PARAM_STR);
    $requete2->execute();
    $answer2 = $requete2->fetch(PDO::FETCH_ASSOC);
    // Ajout des données en session
    $_SESSION['id'] = $answer2['userID'];
    $_SESSION['name'] = $answer2['userFIRSTNAME'];
    $_SESSION['surname'] = $answer2['userLASTNAME'];
    $_SESSION['mail'] = $answer2['userMAIL'];
    $_SESSION['status'] = $answer2['userSTATUS'];
    // Fermeture et écriture de la session, et redirection vers la page d'accueil.
    session_write_close();
    header('Location: ../../HTML/index.php');
}
?>