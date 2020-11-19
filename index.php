<?php
include_once 'config/core.php';
include_once 'nav_header.php';
include_once 'config/database.php';
include 'objects/customer.php';
$action = isset($_GET['action']) ? $_GET['action'] : "";

echo $_SESSION['firstname'];

include_once 'nav_footer.php';
 ?>
