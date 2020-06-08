<?php
session_start();
$nameWhoOrdered = $_SESSION['name'];
$surnameWhoOrdered = $_SESSION['surname'];
$idWhoOrdered = $_SESSION['id'];
$idCampusForBDE = $_SESSION['id_campus'];
session_write_close();
include('bdd.php');
$reqOrder = $bdd->prepare("SELECT shop_orders.id_Site_Users, shop_products.name, shop_orders.quantity FROM shop_orders INNER JOIN shop_products ON shop_orders.products = shop_products.id WHERE id_Site_Users = :id AND status = 0");
$reqOrder->bindValue(':id', $idWhoOrdered, PDO::PARAM_INT);
$reqOrder->execute();
foreach($reqOrder->fetchAll(PDO::FETCH_ASSOC) as $productsOrdered){
    $products = implode(', ', $productsOrdered);
    $orderUpdateStock = $bdd->prepare("UPDATE shop_products SET stock - :quantity WHERE name = :id");
    $orderUpdateStock->bindValue(':quantity', $products[2], PDO::PARAM_INT);
    $orderUpdateStock->bindValue(':id', $products[1], PDO::PARAM_STR);
    $orderUpdateStock->execute();
}
$orderExists = $reqOrder->rowCount();
if($orderExists >= 1) {
    $orderFinalize = $bdd->prepare("UPDATE shop_orders SET status = '1' WHERE id_Site_Users = :id");
    $orderFinalize->bindValue(':id', $idWhoOrdered, PDO::PARAM_INT);
    $orderFinalize->execute();
    if ($orderFinalize == true){
            $getMessage = $bdd->prepare("SELECT mail FROM site_users WHERE id_CESI_Campuses = :id_campus AND status = 0");
            $getMessage->bindValue(':id_campus', $idCampusForBDE, PDO::PARAM_INT);
            $getMessage->execute();
            foreach(($getMessage->fetchAll(PDO::FETCH_ASSOC)) as $mailBDE){
                $lol[] = $mailBDE['mail'];
            }
            $getMailWhoOrdered = $bdd->prepare("SELECT mail FROM site_users WHERE id = :id");
            $getMailWhoOrdered->bindValue(':id', $idWhoOrdered, PDO::PARAM_INT);
            $getMailWhoOrdered->execute();
            $mailOrdered = $getMailWhoOrdered->fetch(PDO::FETCH_ASSOC);
            $mailWhoOrdered = $mailOrdered['mail'];
            $to = implode(", ", $lol);
            $headers = array(
                'From' => 'noreply@commandes.bde_cesi.fr',
                'Reply-To' => ''. $mailWhoOrdered,
                'X-Mailer' => 'PHP/' . phpversion()
            );
            $message = "Chers membres BDE,
Le membre $nameWhoOrdered $surnameWhoOrdered vient de commander sur le site du BDE.
La commande passée est disponible sur votre interface Administrateur.
Veuillez lui donner les instructions à suivre le plus rapidement possible.";
            $message = wordwrap($message, 70, "\r\n");
            $seeifMailIsGood = mail($to, 'Commande effectuée sur le site du BDE', $message, $headers);
            }
            if($seeifMailIsGood == true){
                header('Location: ../../HTML/commande.php');
            }
        }else {
    echo "Vous n'avez rien commandé, inutile de faire cette opération !";
}
?>