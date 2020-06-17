<?php
include('bdd.php');
$insertmbr = $bdd->query("SELECT * FROM product");
$answer = $insertmbr->fetchAll(PDO::FETCH_ASSOC);

echo "<table>
<tr>
<th>ID</th>
<th>Nom du produit</th>
<th>Description</th>
<th>Lien image</th>
<th>Stock disponible</th>
</tr>";
foreach($answer as $data){
    echo '<tr>';
    echo '<td>'.$data['productID'].'</td>';
    echo '<td>'.$data['productNAME'].'</td>';
    echo '<td>'.$data['productDESC'].'</td>';
    echo '<td>'.$data['picURL'].'</td>';
    echo '<td>'.$data['productSTOCK'].'</td>';
    echo '</tr>';
}
echo "</table>";
?>