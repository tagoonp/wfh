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

// if($stage == 'linelink'){
//     if(
//         (!isset($_REQUEST['username'])) ||
//         (!isset($_REQUEST['password'])) ||
//         (!isset($_REQUEST['token'])) ||
//         (!isset($_REQUEST['photo']))
//       ){
//         $return['status'] = 'Fail';
//         $return['error_message'] = 'Error x1001';
//         echo json_encode($return);
//         mysqli_close($conn);
//         die();
//     }
//     $username = mysqli_real_escape_string($conn, $_POST['username']);
//     $token = mysqli_real_escape_string($conn, $_POST['token']);
//     $photo = mysqli_real_escape_string($conn, $_POST['photo']);
//     $password = mysqli_real_escape_string($conn, base64_encode($_POST['password']));

//     $strSQL = "SELECT * FROM mym_useraccount 
//                WHERE 
//                ((USERNAME = '$username' AND PASSWORD = '$password')
//                OR
//                (EMAIL = '$username' AND PASSWORD = '$password'))
//                AND ACTIVE_STATUS = 'Y' 
//                AND DELETE_STATUS = 'N'
//                ";
//     $res = $db->fetch($strSQL, false, false);

//     if($res){
//         $access_token = base64_encode($dateu.$res['ID']);
//         $uid = $res['UID'];

//         $strSQL = "UPDATE access_token SET tk_timeout = 'Y' WHERE tk_uid = '".$res['UID']."'";
//         $db->execute($strSQL);

//         $exp_datetime = Date("Y-m-d H:i:s", strtotime("$datetime +6 hours"));

//         $strSQL = "INSERT INTO access_token (`tk_token`, `tk_issue`, `tk_expire`, `tk_uid`) 
//                 VALUES ('$access_token', '$datetime', '$exp_datetime', '$uid')
//                 ";
//         $resInsertToken = $db->insert($strSQL, false);

//         $strSQL = "UPDATE mym_useraccount SET LINELOGIN = '$token', PHOTO = '$photo' WHERE UID = '$uid'";
//         $db->execute($strSQL);

//         $return['status'] = 'Success';
//         $return['token'] = $access_token;
//         $return['date'] = $res;
//         $return['uid'] = $uid;

//     }else{
//         $return['status'] = 'Fail';
//         $return['msg'] = 'Invalid user account';
//         $return['sql'] = $strSQL;
//     }

//     echo json_encode($return);
//     mysqli_close($conn);
//     die();
// }

// if($stage == 'register'){
//     if(
//         (!isset($_REQUEST['username'])) ||
//         (!isset($_REQUEST['password']))
//       ){
//         $return['status'] = 'Fail';
//         $return['error_message'] = 'Error x1001';
//         echo json_encode($return);
//         mysqli_close($conn);
//         die();
//     }
//     $username = mysqli_real_escape_string($conn, $_POST['username']);
//     $password = mysqli_real_escape_string($conn, base64_encode($_POST['password']));

//     $strSQL = "SELECT * FROM mym_useraccount 
//                WHERE 
//                ((USERNAME = '$username' AND PASSWORD = '$password')
//                OR
//                (EMAIL = '$username' AND PASSWORD = '$password'))
//                AND ACTIVE_STATUS = 'Y' 
//                AND DELETE_STATUS = 'N'
//                ";
//     $res = $db->fetch($strSQL, false, false);

//     if($res){
//         $access_token = base64_encode($dateu.$res['ID']);
//         $uid = $res['UID'];

//         $strSQL = "UPDATE access_token SET tk_timeout = 'Y' WHERE tk_uid = '".$res['UID']."'";
//         $db->execute($strSQL);

//         $exp_datetime = Date("Y-m-d H:i:s", strtotime("$datetime +6 hours"));

//         $strSQL = "INSERT INTO access_token (`tk_token`, `tk_issue`, `tk_expire`, `tk_uid`) 
//                 VALUES ('$access_token', '$datetime', '$exp_datetime', '$uid')
//                 ";
//         $resInsertToken = $db->insert($strSQL, false);

//         $return['status'] = 'Success';
//         $return['token'] = $access_token;
//         $return['date'] = $res;
//         $return['uid'] = $uid;

//     }else{
//         $return['status'] = 'Fail';
//         $return['msg'] = 'Invalid user account';
//         $return['sql'] = $strSQL;
//     }

//     echo json_encode($return);
//     mysqli_close($conn);
//     die();
// }

if($stage == 'create_session'){
    if(
        (!isset($_REQUEST['uid'])) ||
        (!isset($_REQUEST['name'])) ||
        (!isset($_REQUEST['surname'])) ||
        (!isset($_REQUEST['dept'])) ||
        (!isset($_REQUEST['dept_id'])) ||
        (!isset($_REQUEST['position'])) ||
        (!isset($_REQUEST['stdid'])) ||
        (!isset($_REQUEST['email']))
      ){
        $return['status'] = 'Fail';
        $return['error_message'] = 'Error x1001';
        echo "Invalid parameters<br>";
        echo json_encode($return);
        mysqli_close($conn);
        die();
    }

    $uid = mysqli_real_escape_string($conn, $_REQUEST['uid']);
    $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
    $surname = mysqli_real_escape_string($conn, $_REQUEST['surname']);
    $dept = mysqli_real_escape_string($conn, $_REQUEST['dept']);
    $dept_id = mysqli_real_escape_string($conn, $_REQUEST['dept_id']);
    $position = mysqli_real_escape_string($conn, $_REQUEST['position']);
    $stdid = mysqli_real_escape_string($conn, $_REQUEST['stdid']);
    $email = mysqli_real_escape_string($conn, $_REQUEST['email']);

    if($config_department_id != $dept_id){
        $return['status'] = 'Fail';
        $return['error_message'] = 'Error x1001';
        echo "Invalid parameters<br>";
        echo json_encode($return);
        mysqli_close($conn);
        die();
    }

    $strSQL = "SELECT * FROM wfh_useraccount WHERE USERNAME = '$uid' AND DELETE_STATUS = '0'";
    $res = $db->fetch($strSQL, false, false);
    if($res){

        echo "a";
        die();
        $_SESSION['doe_uid'] = $uid; // username

        if($res['WFH_ADMIN'] == '1'){
            $_SESSION['doe_wfh_role'] = 'admin';
        }else{
            if($res['WFH_STAFF'] == '1'){
                $_SESSION['doe_wfh_role'] = 'staff';
            }else{
                $_SESSION['doe_wfh_role'] = 'common';
            }
        }
        
        $_SESSION['doe_id'] = session_id();
        $db->close();
        header('Location: ../html/core/'.$_SESSION['doe_wfh_role'].'/');       

        die();

    }else{

        // $uid_tmp = base64_encode($dateu.$uid);
        // $strSQL = "INSERT INTO wfh_useraccount (`UID`, `USERNAME`, `FNAME`, `LNAME`, `POSITION`, `PID`, `EMAIL`)
        //            VALUES ('$uid_tmp', '$uid', '$name', '$surname', '$position', '$uid', '$email')
        //            ";
        // $resInsert = $db->insert($strSQL, false);
        // if($resInsert){
        //     $_SESSION['doe_id'] = session_id();
        //     $_SESSION['doe_uid'] = $uid; 
        //     $db->close();
        //     header('Location: ../html/core/auth/');       
        //     die();
        // }else{
        //     echo "Can not register";
        //     die();
        // }

        // echo "b";
        // die();
        $db->close();
        header('Location: ../html/core/auth/register?uid='.$uid.'&name='.$name.'&surname='.$surname.'&dept='.$dept.'&dept_id='.$dept_id.'&position='.$position.'&stdid='.$stdid.'&email='.$email);        
        die();
    }
}

if($stage == 'register'){
    if(
        (!isset($_REQUEST['username'])) ||
        (!isset($_REQUEST['fname'])) ||
        (!isset($_REQUEST['lname'])) ||
        (!isset($_REQUEST['dept_name'])) ||
        (!isset($_REQUEST['dept_id'])) ||
        (!isset($_REQUEST['position'])) ||
        (!isset($_REQUEST['stdid'])) ||
        (!isset($_REQUEST['email']))
      ){
        $return['status'] = 'Fail';
        $return['error_message'] = 'Error x1001';
        echo "Invalid parameters<br>";
        echo json_encode($return);
        mysqli_close($conn);
        die();
    }

    $uid = generateRandomString(20).$dateu;
    $username = mysqli_real_escape_string($conn, $_REQUEST['username']);
    $name = mysqli_real_escape_string($conn, $_REQUEST['fname']);
    $surname = mysqli_real_escape_string($conn, $_REQUEST['lname']);
    $dept = mysqli_real_escape_string($conn, $_REQUEST['dept_name']);
    $dept_id = mysqli_real_escape_string($conn, $_REQUEST['dept_id']);
    $position = mysqli_real_escape_string($conn, $_REQUEST['position']);
    $stdid = mysqli_real_escape_string($conn, $_REQUEST['stdid']);
    $email = mysqli_real_escape_string($conn, $_REQUEST['email']);

    $strSQL = "SELECT * FROM wfh_useraccount WHERE USERNAME = '$username' AND DELETE_STATUS = '0'";
    $res = $db->fetch($strSQL, false, false);
    if($res) // Duplicate
    {
        $return['status'] = 'Fail';
        $return['error_message'] = 'Error x1002';
        echo "Already register<br>";
        echo json_encode($return);
        mysqli_close($conn);
        die();
    }

    $strSQL = "INSERT INTO wfh_useraccount (`UID`, `USERNAME`, `FNAME`, `LNAME`, `EMAIL`, `DEPT_ID`, `DEPT_NAME`, `UDATETIME`) VALUES ('$uid', '$username', '$name', '$surname', '$email', '$dept_id', '$dept', '$datetime')";
    $resInsert = $db->insert($strSQL, false);

    
    if($resInsert){

        $strSQL = "INSERT INTO wfh_log (`wl_ip`, `wl_datetime`, `wl_uid`, `wl_activity`, `wl_message`, `wl_relate_uid`) 
                   VALUES ('$ip', '$datetime', '$uid', 'Register', '-', '$uid')
                  ";
        $res = $db->insert($strSQL, false);

        $_SESSION['doe_uid'] = $username; // username
        $_SESSION['doe_wfh_role'] = 'common';

        // $title = "[DOE-WFH] Register nofification";
        // $content = '<p>Dear user</p>';
        // $content .= '<p>You have registered to DOE-WFH system.</p>';
        // $content .= '<p>Regards,<br>DOR-WFH auto mailer system.</p>';
        // sendEmail($db, 'DOE-WFH Register notification', '', '', $uid, $email, "DOE-WFH Register notification", $content, '');

        $return['status'] = 'Success';
        $return['role'] = 'common';
    }else{
        $return['status'] = 'Fail';
        $return['message'] = 'Command -> ' . $strSQL;
    }
    echo json_encode($return);
    mysqli_close($conn);
    die();
}

// if($stage == 'updateprofile'){
//     if(
//         (!isset($_REQUEST['uid'])) ||
//         (!isset($_REQUEST['prefix_th'])) ||
//         (!isset($_REQUEST['prefix_en'])) ||
//         (!isset($_REQUEST['fname_th'])) ||
//         (!isset($_REQUEST['lname_th']))
//       ){
//         $return['status'] = 'Fail';
//         $return['error_message'] = 'Error x1001';
//         echo json_encode($return);
//         mysqli_close($conn);
//         die();
//     }

//     $uid = mysqli_real_escape_string($conn, $_REQUEST['uid']);
//     $sid = mysqli_real_escape_string($conn, $_REQUEST['sid']);
//     $prefix_th = mysqli_real_escape_string($conn, $_REQUEST['prefix_th']);
//     $prefix_en = mysqli_real_escape_string($conn, $_REQUEST['prefix_en']);
//     $fname_th = mysqli_real_escape_string($conn, $_REQUEST['fname_th']);
//     $fname_en = mysqli_real_escape_string($conn, $_REQUEST['fname_en']);
//     $lname_th = mysqli_real_escape_string($conn, $_REQUEST['lname_th']);
//     $lname_en = mysqli_real_escape_string($conn, $_REQUEST['lname_en']);
//     $position = mysqli_real_escape_string($conn, $_REQUEST['position']);
//     $position_other = mysqli_real_escape_string($conn, $_REQUEST['position_other']);
//     $dept = mysqli_real_escape_string($conn, $_REQUEST['dept']);
//     $dept_th = mysqli_real_escape_string($conn, $_REQUEST['dept_th']);
//     $dept_en = mysqli_real_escape_string($conn, $_REQUEST['dept_en']);
//     $exp = mysqli_real_escape_string($conn, $_REQUEST['exp']);
//     $ri = mysqli_real_escape_string($conn, $_REQUEST['ri']);

//     $strSQL = "UPDATE userinfo
//                SET 
//                prefix_th = '$prefix_th',
//                prefix_en = '$prefix_en',
//                fname = '$fname_th',
//                lname = '$lname_th',
//                fname_en = '$fname_en',
//                lname_en = '$lname_en',
//                id_dept = '$dept',
//                id_personnel = '$position',
//                person_other = '$position_other',
//                dept = '$dept_th',
//                dept_en = '$dept_en',
//                expertise = '$exp',
//                rs_interest = '$ri'
//                WHERE 
//                user_id = '$uid'
//               ";
//     $res = $db->execute($strSQL);

//     $strSQL = "INSERT INTO log_pm (log_activity, log_ip, log_datetime, user_id ) VALUES ('Update profile', '$ip', '$datetime', '$uid')";
//     $res = $db->execute($strSQL);

//     $strSQL = "SELECT email FROM useraccount WHERE id = '$uid'";
//     $resUser = $db->fetch($strSQL, false, false);
//     if($resUser){
//         $email = $resUser['email'];
//         $title = "[RMIS] แจ้งเตือนการแก้ไขข้อมูลส่วนตัว";
//         $content = '<p>เรียน นักวิจัยที่นับถือ</p>';
//         $content .= '<p>เนื่องด้วยท่านได้ทำการปรับปรุงข้อมูลส่วนตัวของท่านภายในระบบ RMIS ระบบจึงทำการแจ้งเตือนมายังอีเมลฉบับนี้เพื่อแจ้งให้ท่านทราบ และหากการดำเนินการนี้ไม่ได้เกิดการตัวท่าน กรุณาตรวจสอบและดำเนินการแจ้งเจ้าหน้าที่ต่อไป</p>';
//         $content .= '<p>จึงเรียนมาเพื่อทราบ หากมีข้อสงสัยกรุณาโทรติดต่อสำนักงาน</p>';
//         $content .= '<p>ด้วยความเคารพอย่างสูง</p>';
//         sendEmail($db, 'นักวิจัยแก้ไขข้อมูลส่วนตัว', $sid, '', $uid, $email, "นักวิจัยแก้ไขข้อมูลส่วนตัว", $content, '');
//     }   

//     $return['status'] = 'Success';
//     echo json_encode($return);
//     mysqli_close($conn);
//     die();

// }

// if($stage == 'updatepassword'){
//     if(
//         (!isset($_REQUEST['uid'])) ||
//         (!isset($_REQUEST['sid'])) ||
//         (!isset($_REQUEST['old_pwd'])) ||
//         (!isset($_REQUEST['new_pwd'])) 
//       ){
//         $return['status'] = 'Fail';
//         $return['error_message'] = 'Error x1001';
//         echo json_encode($return);
//         mysqli_close($conn);
//         die();
//     }

//     $uid = mysqli_real_escape_string($conn, $_REQUEST['uid']);
//     $sid = mysqli_real_escape_string($conn, $_REQUEST['sid']);
//     $old_pwd = mysqli_real_escape_string($conn, $_REQUEST['old_pwd']);
//     $new_pwd = mysqli_real_escape_string($conn, $_REQUEST['new_pwd']);

//     $op = base64_encode($old_pwd);
//     $np = base64_encode($new_pwd);

//     $strSQL = "SELECT * FROM useraccount WHERE id = '$uid' AND password = '$op' ";
//     $res = $db->fetch($strSQL, false);
//     if($res){
//         $strSQL = "UPDATE useraccount SET password = '$np' WHERE id = '$uid'";
//         $resUpdate = $db->execute($strSQL);
//         $return['status'] = 'Success';

//         $email = $res['email'];
//         $title = "[RMIS] แจ้งเตือนการแก้ไขข้อมูลรหัสผ่าน";
//         $content = '<p>เรียน นักวิจัยที่นับถือ</p>';
//         $content .= '<p>เนื่องด้วยท่านได้ทำการปรับปรุงรหัสผ่านของในระบบ RMIS ระบบจึงทำการแจ้งเตือนมายังอีเมลฉบับนี้เพื่อแจ้งให้ท่านทราบ และหากการดำเนินการนี้ไม่ได้เกิดการตัวท่าน กรุณาตรวจสอบและดำเนินการแจ้งเจ้าหน้าที่ต่อไป</p>';
//         $content .= '<p>จึงเรียนมาเพื่อทราบ หากมีข้อสงสัยกรุณาโทรติดต่อสำนักงาน</p>';
//         $content .= '<p>ด้วยความเคารพอย่างสูง</p>';

//         sendEmail($db, 'นักวิจัยแก้ไขข้อมูลการติดต่อ', $sid, '', $uid, $email, 'นักวิจัยแก้ไขข้อมูลการติดต่อ', $content, '');

//     }else{
//         $return['status'] = 'invalidpwd';
//     }
//     echo json_encode($return);
//     mysqli_close($conn);
//     die();
// }

// if($stage == 'updatecontact'){
//     if(
//         (!isset($_REQUEST['uid'])) ||
//         (!isset($_REQUEST['sid'])) ||
//         (!isset($_REQUEST['phone'])) ||
//         (!isset($_REQUEST['office'])) 
//       ){
//         $return['status'] = 'Fail';
//         $return['error_message'] = 'Error x1001';
//         echo json_encode($return);
//         mysqli_close($conn);
//         die();
//     }

//     $uid = mysqli_real_escape_string($conn, $_REQUEST['uid']);
//     $sid = mysqli_real_escape_string($conn, $_REQUEST['sid']);
//     $phone = mysqli_real_escape_string($conn, $_REQUEST['phone']);
//     $office = mysqli_real_escape_string($conn, $_REQUEST['office']);
//     $address = mysqli_real_escape_string($conn, $_REQUEST['address']);
//     $fax = mysqli_real_escape_string($conn, $_REQUEST['fax']);

//     $strSQL = "UPDATE userinfo
//                SET 
//                address = '$address',
//                tel_mobile = '$phone',
//                tel_office = '$office',
//                tel_fax = '$fax'
//                WHERE 
//                user_id = '$uid'
//               ";
//     $res = $db->execute($strSQL);

//     $strSQL = "INSERT INTO log_pm (log_activity, log_ip, log_datetime, user_id ) VALUES ('Update contact', '$ip', '$datetime', '$uid')";
//     $res = $db->execute($strSQL);
    
//     $strSQL = "SELECT email FROM useraccount WHERE id = '$uid'";
//     $resUser = $db->fetch($strSQL, false, false);
//     if($resUser){
//         $email = $resUser['email'];
//         $title = "[RMIS] แจ้งเตือนการแก้ไขข้อมูลการติดต่อ";
//         $content = '<p>เรียน นักวิจัยที่นับถือ</p>';
//         $content .= '<p>เนื่องด้วยท่านได้ทำการปรับปรุงข้อมูลการติดต่อของท่านภายในระบบ RMIS ระบบจึงทำการแจ้งเตือนมายังอีเมลฉบับนี้เพื่อแจ้งให้ท่านทราบ และหากการดำเนินการนี้ไม่ได้เกิดการตัวท่าน กรุณาตรวจสอบและดำเนินการแจ้งเจ้าหน้าที่ต่อไป</p>';
//         $content .= '<p>จึงเรียนมาเพื่อทราบ หากมีข้อสงสัยกรุณาโทรติดต่อสำนักงาน</p>';
//         $content .= '<p>ด้วยความเคารพอย่างสูง</p>';
//         sendEmail($db, 'นักวิจัยแก้ไขข้อมูลการติดต่อ', $sid, '', $uid, $email, "นักวิจัยแก้ไขข้อมูลการติดต่อ", $content, '');
//     }   

//     $return['status'] = 'Success';
//     echo json_encode($return);
//     mysqli_close($conn);
//     die();

// }