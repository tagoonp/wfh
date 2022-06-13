<?php 
require('../config/server.inc.php');
require('../config/config.php');
require('../config/database.php'); 

$db = new Database();
$conn = $db->conn();

require('../config/sendemail.php'); 

$to_role = mysqli_real_escape_string($conn, $_REQUEST['to']);


$_SESSION['doe_wfh_role'] = $to_role;

$db->close();
header('Location: '.ROOT_DOMAIN . 'html/core/'.$to_role);
die();

?>