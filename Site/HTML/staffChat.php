<!DOCTYPE html>
<html>
<meta charset="utf-8" />
<title>Mini-chat</title>
<?php include("head.php");
include("header.php"); 
if(isset($_SESSION['status'])) {
$status = $_SESSION['status'];
} else if (!isset($_SESSION['status'])) {
    echo 'Vous devez être connecté pour effectuer cette opération.';
    include("footer.php");
    exit();
}?>
    <style>
    form
    {
        text-align:center;
    }
    </style>
    <body>
    
    <?php if ($_SESSION['status'] == 0) {
        echo "Nous sommes désolés, mais vous vous êtes probablement trompés d'endroit.
        Soit vous n'avez pas les permissions nécessaires pour accéder à cette page, soit vous
        l'avez mal tapée.";
        include("footer.php");
        exit();}
        else if ($_SESSION['status'] == 1 || $_SESSION['status'] == 2) {
        echo '<form action="../PHP/manage/staffChatPost.php" method="post">
        <p>
        <label for="message">Message</label> :  <input type="text" name="message" id="message" /><br />

        <input type="submit" value="Envoyer" />
	</p>
    </form>';};?>

<?=include("../PHP/manage/showStaffChat.php"); ?>
    </body>
<?php include("footer.php"); ?>
</html>