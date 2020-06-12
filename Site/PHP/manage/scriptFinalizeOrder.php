<?php
session_start();
$nameWhoOrdered = $_SESSION['name'];
$surnameWhoOrdered = $_SESSION['surname'];
$idWhoOrdered = $_SESSION['id'];
session_write_close();
include('bdd.php');
$reqOrder = $bdd->prepare("SELECT userID, productID, basketQUANTITY FROM basket INNER JOIN product ON basket.productID = product.productID WHERE userID = :id");
$reqOrder->bindValue(':id', $idWhoOrdered, PDO::PARAM_INT);
$reqOrder->execute();
foreach($reqOrder->fetchAll(PDO::FETCH_ASSOC) as $productsOrdered){
    $products = implode(', ', $productsOrdered);
    $orderedProduct = $productsOrdered['productID'];
    $modifyStock = $bdd->prepare("SELECT productID, productSTOCK from product INNER JOIN basket on basket.productID = product.productID WHERE productID = $orderedProduct");
    $modifyStock->execute();
    $getOldStock = $modifyStock->fetchAll(PDO::FETCH_ASSOC);
    $oldStock[] = $getOldStock['productSTOCK'];
    $newStock = $oldStock - $products[2];
    $modifyStock->closeCursor();
    $orderUpdateStock = $bdd->prepare("UPDATE product SET productSTOCK=:quantity WHERE productID = :id");
    $orderUpdateStock->bindValue(':quantity', $newStock, PDO::PARAM_INT);
    $orderUpdateStock->bindValue(':id', $products[1], PDO::PARAM_STR);
    $orderUpdateStock->execute();
}
$orderExists = $reqOrder->rowCount();
if($orderExists >= 1) {
    $getMessage = $bdd->query("SELECT userMAIL FROM user WHERE status = 2");
    foreach(($getMessage->fetchAll(PDO::FETCH_ASSOC)) as $mailBDE){
        $lol[] = $mailBDE['userMAIL'];
    }
    $getMailWhoOrdered = $bdd->prepare("SELECT userNAME FROM user WHERE userID = :id");
    $getMailWhoOrdered->bindValue(':id', $idWhoOrdered, PDO::PARAM_INT);
    $getMailWhoOrdered->execute();
    $mailOrdered = $getMailWhoOrdered->fetch(PDO::FETCH_ASSOC);
    $mailWhoOrdered = $mailOrdered['userMAIL'];
    $to = implode(", ", $lol);
    $headers = array(
        'From' => 'noreply@solidaritybond51.yo.fr',
        'Reply-To' => ''. $mailWhoOrdered,
        'X-Mailer' => 'PHP/' . phpversion()
    );
    $message = "Chers membres de l'organisation,
    Le membre $nameWhoOrdered $surnameWhoOrdered vient de commander sur le site.
    La commande passée est disponible sur votre interface Administrateur.
    Veuillez lui donner les instructions à suivre le plus rapidement possible.";
    $message = wordwrap($message, 70, "\r\n");
    $seeifMailIsGood = mail($to, 'Commande effectuée sur le site', $message, $headers);
    }
if($seeifMailIsGood == true){
    header('Location: ../../HTML/commande.php');
};
?>