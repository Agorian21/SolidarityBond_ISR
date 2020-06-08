<?php
session_start();

include('bdd.php');
$mail = htmlspecialchars($_POST['mail']);
$pass = htmlspecialchars($_POST['password']);
$encpass = sha1($pass);

// Requête préparée pour empêcher les injections SQL 
$requete = $bdd->prepare("SELECT * FROM site_users WHERE mail=:mail AND password=:pass"); 
// Liaison des variables de la requête préparée aux variables PHP 
$requete->bindValue(':mail', $mail, PDO::PARAM_STR);
$requete->bindValue(':pass', $encpass, PDO::PARAM_STR);

// Exécution de la requête 
$requete->execute();
 $answer = $requete->fetch() ? 'Connexion réussie.' : 'Connexion échouée. Soit votre mot de passe, soit votre adresse est inconnue de nos serveurs.';
 echo $answer;
 $requete->closeCursor();

if ($answer == "Connexion réussie.") {
    // Données session : Récupération nom, prénom et statut depuis la BDD
    $requete2 = $bdd->prepare("SELECT * FROM site_users WHERE mail=:mail AND password=:pass");
    $requete2->bindValue(':mail', $mail, PDO::PARAM_STR);
    $requete2->bindValue(':pass', $encpass, PDO::PARAM_STR);
    $requete2->execute();
    $answer2 = $requete2->fetch(PDO::FETCH_ASSOC);
    $_SESSION['id'] = $answer2['id'];
    $_SESSION['name'] = $answer2['name'];
    $_SESSION['surname'] = $answer2['surname'];
    $_SESSION['status'] = $answer2['status'];
    $_SESSION['id_campus'] = $answer2['id_CESI_Campuses'];
    $campusid = $answer2['id_CESI_Campuses'];
    $requete2->closeCursor();
    // Etape supplémentaire pour récupérer le nom du campus.
    $requete3 = $bdd->prepare("SELECT name FROM cesi_campuses WHERE id=:id");  
    $requete3->bindValue(':id', $campusid, PDO::PARAM_INT);
    $requete3->execute();
    $answer3 = $requete3->fetch(PDO::FETCH_ASSOC);
    $_SESSION['campus'] = $answer3['name'];
    $requete3->closeCursor();
    session_write_close();
    header('Location: ../../HTML/portal.php');
}
?>