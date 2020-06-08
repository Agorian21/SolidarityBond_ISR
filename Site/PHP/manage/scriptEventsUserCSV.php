<?php
include('bdd.php');
// Check connection
$result = $bdd->query("SELECT site_users.name AS user_name, site_users.surname AS user_surname, site_users.mail, bde_events.name AS event_name, cesi_campuses.name AS campus FROM can_participate INNER JOIN bde_events ON can_participate.id = bde_events.id INNER JOIN site_users ON can_participate.id_Site_Users = site_users.id INNER JOIN cesi_campuses ON site_users.id_CESI_Campuses = cesi_campuses.id");
$result->execute();
$fp = fopen('participants.csv', 'w');
foreach(($result->fetchAll(PDO::FETCH_ASSOC)) as $row) {
    fputcsv($fp, $row);
    }
fclose($fp);
ob_clean();
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=participants.csv');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
readfile('participants.csv');
ignore_user_abort(true);
unlink('participants.csv');
exit;
?>