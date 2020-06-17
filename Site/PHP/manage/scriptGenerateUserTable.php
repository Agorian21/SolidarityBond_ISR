<?php
include('bdd.php');
$insertmbr = $bdd->query("SELECT * FROM user");
$answer = $insertmbr->fetchAll(PDO::FETCH_ASSOC);

echo "<table>
<tr>
<th>ID</th>
<th>Nom</th>
<th>Prénom</th>
<th>Mot de passe</th>
<th>Adresse mail</th>
<th>Statut</th>
</tr>";
foreach($answer as $data){
    echo '<tr>';
    echo '<td>'.$data['userID'].'</td>';
    echo '<td>'.$data['userFIRSTNAME'].'</td>';
    echo '<td>'.$data['userLASTNAME'].'</td>';
    echo '<td>'.$data['userPASSWORD'].'</td>';
    echo '<td>'.$data['userMAIL'].'</td>';
    echo '<td>'.$data['userSTATUS'].'</td>';
    echo '</tr>';
}
echo "</table>";
?>