<?php 
require('../config/server.inc.php');
require('../config/config.php');
require('../config/database.php'); 

$db = new Database();
$conn = $db->conn();

require('../config/sendemail.php'); 

$uid = mysqli_real_escape_string($conn, $_SESSION['doe_uid']);


unset($_SESSION['doe_uid']);
unset($_SESSION['doe_wfh_role']);
unset($_SESSION['doe_id']);
session_destroy();

$db->close();
header('Location: '.ROOT_DOMAIN);
die();

?>