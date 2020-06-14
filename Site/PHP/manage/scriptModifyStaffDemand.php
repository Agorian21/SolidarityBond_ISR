<?php
session_start();
include('bdd.php');
$demandToTreat = $_GET['id'];
$partnerAnswer = $_POST['id'];
if(isset($_GET['id'])) {
    $reqprod = $bdd->prepare("UPDATE raw_material SET isDemandTreated = :partnerAnswer WHERE matID = :demandToTreat");
    $reqprod->bindValue(":partnerAnswer", $partnerAnswer, PDO::PARAM_INT);
    $reqprod->bindValue(":demandToTreat", $demandToTreat, PDO::PARAM_INT);
    $reqprod->execute();
    header("Location: ../../HTML/partnerStaffDemands.php");
}
?>