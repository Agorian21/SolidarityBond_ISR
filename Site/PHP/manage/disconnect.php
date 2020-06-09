<?php
header('Location: ../../HTML/portal.php');
session_start();
session_unset();
session_destroy();
?>