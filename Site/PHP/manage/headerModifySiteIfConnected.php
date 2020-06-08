<?php 
$name = $_SESSION['name'];
$surname = $_SESSION['surname'];
if (isset($name) && isset($surname))
    echo '</th><th class="nav-item text-nowrap ">
    <a class="nav-link antiblue" href="../PHP/manage/disconnect.php">Déconnexion</a>
    <th class="nav-item text-nowrap ">
    <a class="nav-link antiblue" href="">'.$name.' '.$surname.'</a></th>';
else
    echo '</th><th class="nav-item text-nowrap ">
    <a class="nav-link antiblue" href="accounts.php">Connexion</a>
    <th class="nav-item text-nowrap ">
    <a class="nav-link antiblue" href="accounts.php">Inscription</a></th>';

$placewhereyouare = basename($_SERVER['PHP_SELF']);
if ($placewhereyouare == "shop.php")
    echo '<a class="nav-link antiblue" href="cart.php">Panier</a>';
?>