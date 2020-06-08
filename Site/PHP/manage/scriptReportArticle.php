<?php
session_start();
$namePersonnel = $_SESSION['name'];
$surnamePersonnel = $_SESSION['surname'];
$postSignalé = $_POST['id'];
include('bdd.php');
$reqEvent = $bdd->prepare("SELECT * FROM pictures_comments WHERE id = :id");
$reqEvent->bindValue(':id', $postSignalé, PDO::PARAM_INT);
$reqEvent->execute();
$messageExist = $reqEvent->rowCount();
if($messageExist == 1) {
    $signalMessage = $bdd->prepare("UPDATE pictures_comments SET visibility = '0' WHERE id = :id");
    $signalMessage->bindValue(':id', $postSignalé, PDO::PARAM_INT);
    $signalMessage->execute();
    if ($signalMessage == true){
            $getMessage = $bdd->prepare("SELECT site_users.name, site_users.surname, pictures_comments.content FROM site_users INNER JOIN pictures_comments WHERE site_users.id = pictures_comments.id_Site_Users AND pictures_comments.id = :id");
            $getMessage->bindValue(':id', $postSignalé, PDO::PARAM_INT);
            $getMessage->execute();

            $answerMessages = $getMessage->fetch(PDO::FETCH_ASSOC);
            $nameMessage = $answerMessages['name'];
            $surnameMessage = $answerMessages['surname'];
            $message = $answerMessages['content'];
            $getMessage->closeCursor();
            $notifyMembres = $bdd->query("SELECT mail FROM site_users WHERE status = 0");
            foreach(($notifyMembres->fetchAll(PDO::FETCH_ASSOC)) as $mailBDE){
                $lol[] = $mailBDE['mail'];
            }
            $to = implode(", ", $lol);
            $headers = array(
                'From' => 'bde.personnel@bde_cesi.fr',
                'Reply-To' => 'bde.personnel@bde_cesi.fr',
                'X-Mailer' => 'PHP/' . phpversion()
            );
            $message = "Cher membre BDE,
Conformément aux règles émises par le CESI concernant l'intégrité physique et morale,
ce commentaire ci-joint : $message, écrit par $nameMessage $surnameMessage à été signalé car il nuit à l'image du CESI.
Cordialement, $namePersonnel $surnamePersonnel, Personnel CESI.";
            $message = wordwrap($message, 70, "\r\n");
            mail($to, 'Personnel CESI : un commentaire à été signalé.', $message, $headers);
            };
        }else {
       echo "Message non signalé, une erreur est survenue.";
}
?>