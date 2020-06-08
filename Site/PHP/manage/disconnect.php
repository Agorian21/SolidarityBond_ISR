<?php
header('Location: ../../HTML/index.html');
session_start();
session_unset();
session_destroy();
?>