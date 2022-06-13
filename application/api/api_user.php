<?php 
require('../config/server.inc.php');
require('../config/config.php');
require('../config/database.php'); 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db = new Database();
$conn = $db->conn();

if(!isset($_REQUEST['stage'])){
  mysqli_close($conn);
  die();
}
$return = array();
$stage = mysqli_real_escape_string($conn, $_REQUEST['stage']);

if($stage == 'list_user'){
    // ptype => all, admin, staff, common
    $ptype = mysqli_real_escape_string($conn, $_REQUEST['ptype']);

    // TODO
    if($ptype == 'all'){
        $strSQL = "SELECT * FROM `wfh_useraccount` WHERE 1";
    }else if($ptype == 'admin'){
        $strSQL = "SELECT * FROM `wfh_useraccount` WHERE WFH_ADMIN = '1'";
    }else if($ptype == 'staff'){
        $strSQL = "SELECT * FROM `wfh_useraccount` WHERE WFH_STAFF = '1'";
    }else if($ptype == 'common'){
        $strSQL = "SELECT * FROM `wfh_useraccount` WHERE WFH_COMMON = '1'";
    }
    
    // 

    $res = $db->fetch($strSQL, true, false);
    if(($res) && ($res['status'])){
        $return['status'] = 'Success';
        $return['data'] = $res['data'];
    }else{
        $return['status'] = 'Fail';
    }

    echo json_encode($return, JSON_PRETTY_PRINT);
    mysqli_close($conn);
    die();
}

if($stage == 'update_role'){
    $username = mysqli_real_escape_string($conn, $_REQUEST['username']);
    $target_role = mysqli_real_escape_string($conn, $_REQUEST['target_role']);

    $strSQL = "SELECT $target_role FROM wfh_useraccount WHERE USERNAME = '$username'";
    $res = $db->fetch($strSQL, false, false);
    if($res){
        $next = '1';
        if($res[$target_role] == '1'){ $next = '0'; }
        $strSQL = "UPDATE wfh_useraccount SET  $target_role = '$next' WHERE USERNAME = '$username'";
        $res = $db->execute($strSQL);
        $return['status'] = 'Success';
    }else{
        $return['status'] = 'Fail';
    }
    echo json_encode($return, JSON_PRETTY_PRINT);
    mysqli_close($conn);
    die();
}

if($stage == 'delete_user'){
    // TODO
    $strSQL = "SELECT * FROM `wfh_log`";

    // 

    $res = $db->fetch($strSQL, true, false);
    if(($res) && ($res['status'])){
        $return['status'] = 'Success';
        $return['data'] = $res['data'];
    }else{
        $return['status'] = 'Fail';
    }

    echo json_encode($return);
    mysqli_close($conn);
    die();
}

if($stage == 'get_info'){
    $username = mysqli_real_escape_string($conn, $_REQUEST['username']);

    $strSQL = "SELECT * FROM wfh_useraccount WHERE USERNAME = '$username'";
    $res = $db->fetch($strSQL, true, false);
    if(($res) && ($res['status'])){
        $return['status'] = 'Success';
        $return['data'] = $res['data'];
    }else{
        $return['status'] = 'Fail';
    }

    echo json_encode($return);
    mysqli_close($conn);
    die();
}