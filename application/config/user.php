<?php 

if(!isset($_SESSION['doe_uid'])){
    echo "Session denine<br>";
    echo '<a href="' . ROOT_DOMAIN . '">-Back to login-</a>';
    die();
}

$username = $_SESSION['doe_uid'];

$strSQL = "SELECT * FROM wfh_useraccount WHERE USERNAME = '$username' AND DELETE_STATUS = '0'";
$resUser = $db->fetch($strSQL, false, false);

$currentUser = null;
if($resUser){
    $currentUser = $resUser;
    $uid = $_SESSION['doe_uid'];
    $current_role = $_SESSION['doe_wfh_role'];
}else{
    // echo "asd";
    session_destroy();
    header('Location: '.ROOT_DOMAIN);
    die();
}
?>
