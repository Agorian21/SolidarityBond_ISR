<?php
session_start();
$status = $_SESSION['status'] ?? '';
session_write_close();
if (!$status == '')
    echo '[' . $status . ']';
else if ($status == '')
    echo "";

if (isset($_SESSION['status']) && $_SESSION['status'] == "Partenaire") {
    echo '<li class="nav-item"><a class="nav-link" href="staffChat.php">
            <span></span>
            Chatter avec le staff
            </a>
            <li class="nav-item"><a class="nav-link" href="partnerStaffDemands.php">
            <span></span>
            Demandes de matière première par le staff
            </a>';}
else if (isset($_SESSION['status']) && $_SESSION['status'] == "Staff"){
    echo '<li class="nav-item">
            <a class="nav-link" href="adminArticles.php">
                <span></span>
                    Gérer les articles
            </a>
          <li class="nav-item">
            <a class="nav-link" href="adminUsers.php">
                <span></span>
                    Gérer les utilisateurs
            </a>
          <li class="nav-item">
            <a class="nav-link" href="adminComments.php">
                <span></span>
                    Gérer les messages
            </a>
          <li class="nav-item">
            <a class="nav-link" href="adminOrders.php">
                <span></span>
                    Gérer les commandes
            </a>';}?>