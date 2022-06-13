<?php 
require('../../../config/server.inc.php');
require('../../../config/config.php');
require('../../../config/database.php'); 

$db = new Database();
$conn = $db->conn();

// if((isset($_SESSION['doe_id'])) && ($_SESSION['doe_id'] == session_id())){
//     $strSQL = "SELECT * FROM "
// }
?>


<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Department of Epidemiology, Faculty of medicine, Prince of Songkla University">
    <meta name="keywords" content="DOE, MED, PSU, Department of Epidemiology">
    <meta name="author" content="Department of Epidemiology">
    <title>DOE Work from Home :: Department of Epidemilogy</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@100;300;400&display=swap" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/authentication.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/preload.js/dist/css/preload.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <!-- <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">    -->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css?v=<?php echo filemtime('../../../assets/css/style.css'); ?>">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern dark-layout 1-column  navbar-sticky footer-static bg-full-screen-image  blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column" data-layout="dark-layout">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- login page start -->
                <section id="auth-login" class="row flexbox-container">
                    <div class="col-xl-8 col-11">
                        <div class="card bg-authentication mb-0">
                            <div class="row m-0">
                                <!-- left section-login -->
                                <div class="col-md-6 col-12 px-0">
                                    <div class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                                <!-- <img src="http://localhost/rmis2021/application/img/logo-20190225.png" alt="" style="width: 80%"> -->
                                                <h1 class="text-dark text-center text-sm-left"><span class="text-dark">Work from Home</span></h1>
                                                <h4 class="text-muted text-center text-sm-left">Department of Epidemiology</h4>
                                            </div>
                                        </div>
                                        <div class="card-body pt-2">
                                            <h4 class="text-dark text-center text-sm-left">Sign in</h4>

                                            <div class="text-center text-sm-left">
                                                <img src="../../../img/psu-passport.png" class="zoom" alt="" width="100"  onclick="psupassport()" style="cursor: pointer;">
                                                <!-- <img src="../../../img/line.png" alt="" class="zoom" width="100" style="cursor: pointer;" onclick="line()"> -->
                                            </div>

                                            <div class="row">
                                                <div class="col-12 pt-3">
                                                    <!-- <hr> -->
                                                    <div class="pt-2 text-muted text-center text-sm-left" style="font-size: 0.9em;">
                                                        Copyright © <?php echo $year; ?> <a href="https://medipe2.psu.ac.th/" target="_blank" class="text-success">Department of Epidemiology</a><br>
                                                        Faculty of Medicine, Princeof Songkla University
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- right section image -->
                                <div class="col-md-6 d-md-block d-none text-center align-self-center p-3">
                                    <div >
                                        <h5 class="f500 text-dark" style="border: dashed; border-width: 0px 0px 0px 0px; border-color: rgb(232, 232, 232); font-weight: 300;"><i class="fa fa-rss"></i>DOE Announcement</h5>
                                        <div class="p-2 mt-1 fs08 text-left" style="background: #fff; border-radius: 0px; border: solid; border-width: 0px 0px 0px 3px; border-color: rgb(255, 0, 38); cursor: pointer;" onclick="showModal('NewsModal2')" id="">
                                            <!-- ขอความร่วมมือสำหรับโครงการ Multicenter sponsor trial <small class="text-danger">[Click เพื่ออ่าน]</small> -->
                                            No annoucement
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- login page ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <script src="../../../app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.js"></script>
    <script src="../../../app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js"></script>
    <script src="../../../app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/scripts/configs/vertical-menu-dark.js"></script>
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <script src="../../../app-assets/js/scripts/components.js"></script>
    <script src="../../../app-assets/js/scripts/footer.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="../../../app-assets/vendors/preload.js/dist/js/preload.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="https://medhr.medicine.psu.ac.th/SingleSign/services?js"></script>
    <script src="../../../assets/js/core.js?v=<?php echo filemtime('../../../assets/js/core.js'); ?>"></script>
    <script src="../../../assets/js/authen.js?v=<?php echo filemtime('../../../assets/js/authen.js'); ?>"></script>

    <script>

        preload.hide()

        var param = {
            'redirect_uri' : api + 'php/auth',
            'responses' : 'uid,name,surname,department,departmentId,position,studentId,email',
            'redirect_mode' : true
        };

        function showModal(id){
            $("#" + id).modal();
        }

        function psupassport(){
            param.option = 'psupassport';
            popupLogin(param);
        }

        function line(){
            // window.location = './line.php'
            alert('This function not available.')
        }
    </script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>
