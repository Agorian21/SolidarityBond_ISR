<?php
include('bdd.php');
// Check connection
$result = $bdd->query("SELECT * FROM user");
$result->execute();
$fp = fopen('users.csv', 'w');
foreach(($result->fetchAll(PDO::FETCH_ASSOC)) as $row) {
    fputcsv($fp, $row);
    }
fclose($fp);
ob_clean();
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=users.csv');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
readfile('users.csv');
ignore_user_abort(true);
unlink('users.csv');
exit;
?>