<?php
include('bdd.php');
$insertmbr = $bdd->query("SELECT * FROM raw_material");
$answer = $insertmbr->fetchAll(PDO::FETCH_ASSOC);

echo "<table>
<tr>
<th>ID de la demande</th>
<th>Nom</th>
<th>Descriptif</th>
<th>Raison</th>
<th>Quantité demandée</th>
<th>Demande traitée</th>
</tr>";
foreach($answer as $data){
    echo '<tr>';
    echo '<td>'.$data['matID'].'</td>';
    echo '<td>'.$data['rawMatNAME'].'</td>';
    echo '<td>'.$data['rawMatDESC'].'</td>';
    echo '<td>'.$data['rawMatREASON'].'</td>';
    echo '<td>'.$data['rawMatQUANTITY'].'</td>';
    echo '<td>'.$data['isDemandTreated'].'</td>';
    echo '</tr>';
}
echo "</table>";
?>