<?php
include('bdd.php');
if($_POST['formDownload'] == "Télécharger"){
$fileyouwant = $bdd->prepare("SELECT pic_url FROM event_pictures WHERE id = :id");
$fileyouwant->bindValue(':id', $_GET['id_pic'], PDO::PARAM_INT);
$fileyouwant->execute();
$fileyougot = $fileyouwant->fetch(PDO::FETCH_ASSOC);
$file = "../" . implode(' ,',$fileyougot);
if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);    
    ignore_user_abort(true);
    unlink($file);
    exit;
    }
}else if ($_POST['formDownload'] == "Télécharger tout") {
$filesyouwant = $bdd->query("SELECT pic_url FROM event_pictures");
$filesyouwant->execute();
$files = $filesyouwant->fetchAll(PDO::FETCH_ASSOC);
$date = date('Y-m-d');
$zip = new ZipArchive;
$zipname = "Photos-CESI-$date.zip";
$zip->open($zipname, ZIPARCHIVE::CREATE | ZIPARCHIVE::OVERWRITE);
foreach ($files as $file) {
  $filesImploded = implode(' ,', $file);
  echo $path = $filesImploded;
  if(file_exists($path)){
  $zip->addFile($path);  
  }
  else{
   echo "file does not exist";
  }
}
$zip->close();
ob_clean();
header("Content-disposition: inline; filename=$zipname");
header('Content-type: application/zip');
readfile($zipname);
ignore_user_abort(true);
unlink($zipname);
    exit;
}
?>