<?php
session_start();
if (isset($_SESSION['name']) && isset($_SESSION['surname'])) {
    echo '<li class="nav-item">
            <a class="nav-link" href="../PHP/manage/disconnect.php">Déconnexion</a>
        </li>';}
else if (!isset($_SESSION['name']) && !isset($_SESSION['surname'])) {
    echo '<li class="nav-item">
            <a class="nav-link" href="accounts.php">Connexion</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="accounts.php">Inscription</a>
        </li>';}
if (isset($_SESSION['status']) && $_SESSION['status'] == 0) {
    echo '<li class="nav-item">
            <a class="nav-link" href="staffChat.php">Discuter avec le staff</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="cart.php">Votre panier</a>
            </li>';}
if (isset($_SESSION['status']) && $_SESSION['status'] == 1) {
    echo '<li class="nav-item">
            <a class="nav-link" href="staffChat.php">Discuter avec le staff</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="partnerStaffDemands.php">Demandes de matière première par le staff</a>
            </li>';}
if (isset($_SESSION['status']) && $_SESSION['status'] == 2){
    echo '<li class="nav-item">
            <a class="nav-link" href="adminArticles.php">Gestion articles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="adminUsers.php">Gestion utilisateurs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="adminOrders.php">Gestion commandes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="adminRawMatDemands.php">Gestion demandes matière première</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="staffEntChat.php">Discussion entreprises</a>
          </li>';}
session_write_close();
?>