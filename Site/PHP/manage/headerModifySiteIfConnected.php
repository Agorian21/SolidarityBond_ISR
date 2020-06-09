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
if (isset($_SESSION['status']) && $_SESSION['status'] == "Entreprise") {
    echo '<li class="nav-item">
            <a class="nav-link" href="staffChat.php">Discuter avec le staff</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="cart.php">Votre panier</a>
            </li>';}
if (isset($_SESSION['status']) && $_SESSION['status'] == "Partenaire") {
    echo '<li class="nav-item">
            <a class="nav-link" href="staffChat.php">Discuter avec le staff</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="partnerStaffDemands.php">Demandes de matière première par le staff</a>
            </li>';}
if (isset($_SESSION['status']) && $_SESSION['status'] == "Staff"){
    echo '<li class="nav-item">
            <a class="nav-link" href="adminArticles.php">Gérer les articles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="adminUsers.php">Gérer les utilisateurs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="adminOrders.php">Gérer les commandes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="staffEntChat.php">Discuter avec les entreprises</a>
          </li>';}
session_write_close();
?>