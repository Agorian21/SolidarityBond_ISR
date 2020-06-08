<?php
$target_dir_for_bdd = "../Images/event_pictures/";
$target_dir = "../../Images/event_pictures/";
$target_file = $target_dir . basename($_FILES["content"]["name"]);
$target_file_for_bdd = $target_dir_for_bdd . basename($_FILES["content"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["content"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
        // Connexion à la base de données
        include('bdd.php');
        $event_id = $_GET['id_event'];
        // Insertion de la photo à l'aide d'une requête préparée
        $req = $bdd->prepare("INSERT INTO event_pictures (pic_url, id_BDE_Events) VALUES('$target_file_for_bdd', '$event_id')");
        $req->execute();
        header('Location: ../../HTML/events.php');
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["content"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    echo "Sorry, only JPG, JPEG & PNG files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["content"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["content"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>