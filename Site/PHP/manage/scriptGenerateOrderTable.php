<?php
include('bdd.php');
$insertmbr = $bdd->query("SELECT * FROM orders");
$answer = $insertmbr->fetchAll(PDO::FETCH_ASSOC);

echo "<table>
<tr>
<th>Utilisateur qui à commandé</th>
<th>Nom du produit</th>
<th>Quantité</th>
<th>Statut de la livraison</th>
<th>Date de livraison</th>
</tr>";
foreach($answer as $data){
    echo '<tr>';
    echo '<td>'.$userInfo.'</td>';
    echo '<td>'.$productInfo.'</td>';
    echo '<td>'.$data['orderQUANTITY'].'</td>';
    echo '<td>'.$data['orderSTATUS'].'</td>';
    echo '<td>'.$data['orderDELIDATE'].'</td>';
    echo '</tr>';
}
echo "</table>";
?>