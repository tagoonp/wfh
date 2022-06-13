<?php 
require('../config/server.inc.php');
require('../config/config.php');
require('../config/database.php'); 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db = new Database();
$conn = $db->conn();

// require('../config/sendemail.php'); 

if(!isset($_REQUEST['stage'])){
  mysqli_close($conn);
  die();
}

$return = array();
$stage = mysqli_real_escape_string($conn, $_REQUEST['stage']);

if($stage == 'record_screening'){
    if(
        (!isset($_REQUEST['uid'])) ||
        (!isset($_REQUEST['sg'])) ||
        (!isset($_REQUEST['ssg'])) ||
        (!isset($_REQUEST['atk'])) ||
        (!isset($_REQUEST['fever'])) ||
        (!isset($_REQUEST['cough'])) ||
        (!isset($_REQUEST['snot'])) ||
        (!isset($_REQUEST['headache'])) ||
        (!isset($_REQUEST['bodypain'])) ||
        (!isset($_REQUEST['atkreport'])) ||
        (!isset($_REQUEST['headreport'])) ||
        (!isset($_REQUEST['cireport'])) ||
        (!isset($_REQUEST['sonkhlacare'])) ||
        (!isset($_REQUEST['wfh'])) ||
        (!isset($_REQUEST['leave'])) ||
        (!isset($_REQUEST['dmmht'])) ||
        (!isset($_REQUEST['sdate'])) ||
        (!isset($_REQUEST['edate']))
        ){
        $return['status'] = 'Fail';
        $return['error_message'] = 'Error x1001';
        echo json_encode($return);
        mysqli_close($conn);
        die();
    }

    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $sg = mysqli_real_escape_string($conn, $_POST['sg']);
    $ssg = mysqli_real_escape_string($conn, $_POST['ssg']);
    $atk = mysqli_real_escape_string($conn, $_POST['atk']);
    $fever = mysqli_real_escape_string($conn, $_POST['fever']);
    $cough = mysqli_real_escape_string($conn, $_POST['cough']);
    $snot = mysqli_real_escape_string($conn, $_POST['snot']);
    $headache = mysqli_real_escape_string($conn, $_POST['headache']);
    $bodypain = mysqli_real_escape_string($conn, $_POST['bodypain']);
    $atkreport = mysqli_real_escape_string($conn, $_POST['atkreport']);
    $headreport = mysqli_real_escape_string($conn, $_POST['headreport']);
    $cireport = mysqli_real_escape_string($conn, $_POST['cireport']);
    $sonkhlacare = mysqli_real_escape_string($conn, $_POST['sonkhlacare']);
    $wfh = mysqli_real_escape_string($conn, $_POST['wfh']);
    $leave = mysqli_real_escape_string($conn, $_POST['leave']);
    $dmmht = mysqli_real_escape_string($conn, $_POST['dmmht']);
    // $numdate = mysqli_real_escape_string($conn, $_POST['numdate']);
    $sdate = mysqli_real_escape_string($conn, $_POST['sdate']);
    $edate = mysqli_real_escape_string($conn, $_POST['edate']);
    $sgroup = mysqli_real_escape_string($conn, $_POST['sgroup']);

    $strSQL = "SELECT * FROM wfh_screening WHERE ws_uid = '$uid' AND ws_approve_stage = 'waitreview' AND ws_delete = '0'";
    $res = $db->fetch($strSQL, false, false);
    if($res){
        $return['status'] = 'Fail';
        $return['message'] = 'Duplicate';
        echo json_encode($return);
        $db->close();
        die();
    }

    $g = 'na';
    $sg = 'na';

    if($sgroup == '1_1'){ $g = '1'; $sg = '1'; }
    if($sgroup == '1_2'){ $g = '1'; $sg = '2'; }

    $earlier = new DateTime($sdate);
    $later = new DateTime($edate);

    $numdate = $later->diff($earlier)->format("%a"); //3

    $strSQL = "INSERT INTO wfh_screening 
               (
                `ws_screengroup`, `ws_screensubgroup`, `ws_fever`, `ws_cough`, `ws_snot`, 
                `ws_headache`, `ws_bodypain`, `ws_atk`, `ws_atkreport`, `ws_headreport`, 
                `ws_cireport`, `ws_sonkhlacare`, `ws_oper_wfh`, `ws_oper_leave`, `ws_oper_dmmht`,
                 `ws_wfhday`, `ws_wfh_start`, `ws_wfh_end`, `ws_gendatetime`, `ws_uid`
               )
               VALUES 
               (
                    '$g', '$sg', '$fever', '$cough', '$snot', 
                    '$headache', '$bodypain', '$atk', '$atkreport', '$headreport', 
                    '$cireport', '$sonkhlacare', '$wfh', '$leave', '$dmmht', 
                    '$numdate', '$sdate', '$edate', '$datetime', '$uid'
               )";
    $resInsert = $db->insert($strSQL, true);
    if($resInsert){
        for ($i=0; $i < $numdate; $i++) { 

            $recdate = $sdate;

            $strSQL = "INSERT INTO wfh_workplan (`plan_uid`, `plan_date`, `plan_status`, `plan_createdatetime`, `plan_udatetime`)
                       VALUES ('$uid', '$recdate', 'dummy', '$datetime', '$datetime')
                      ";
            $resInsertRecord = $db->insert($strSQL, false);
            if(!$resInsertRecord){
                echo $strSQL;
            }
            $sdate = date('Y-m-d', strtotime($sdate .' +1 day'));
        }
        $return['status'] = 'Success';
        $return['record_id'] = $resInsert;
    }else{
        $return['status'] = 'Fail';
        $return['message'] = $strSQL;
    }
    echo json_encode($return);
    $db->close();
    die();

}
