<?php 
require('../../../configuration/server.inc.php');
require('../../../configuration/configuration.php');
require('../../../configuration/database.php'); 
require('../../../configuration/session.php'); 

$purpose_role = 'staff';
if($purpose_role != $_SESSION['rmis_role']){
    header('Location: '. ROOT_DOMAIN .'application/html/core/login.php');
    die();
}

$db = new Database();
$conn = $db->conn();

require('../../../configuration/user.inc.php'); 
?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="RMIS@MED PSU admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, RMIS@MED PSU admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>RMIS@MED PSU Continuing Report for Staff</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@100;300;400&display=swap" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/dragula.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/semi-dark-layout.css">
    <!-- END: Theme CSS-->

    
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/widgets.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/dashboard-analytics.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/preload.js/dist/css/preload.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css?v=<?php echo filemtime('../../../assets/css/style.css'); ?>">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<style>
    body.dark-layout .card {
        background-color: #272e48;
        box-shadow: none !important;
    }
</style>
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="dark-layout">

    <!-- BEGIN: Header-->
    <div class="header-navbar-shadow"></div>
    <?php require('./comp/header.php'); ?>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="../../../html/ltr/vertical-menu-template-dark/index.html">
                        <div class="brand-logo">
                            <svg class="logo" width="26px" height="26px" viewbox="0 0 26 26" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>icon</title>
                                <defs>
                                    <lineargradient id="linearGradient-1" x1="50%" y1="0%" x2="50%" y2="100%">
                                        <stop stop-color="#5A8DEE" offset="0%"></stop>
                                        <stop stop-color="#699AF9" offset="100%"></stop>
                                    </lineargradient>
                                    <lineargradient id="linearGradient-2" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop stop-color="#FDAC41" offset="0%"></stop>
                                        <stop stop-color="#E38100" offset="100%"></stop>
                                    </lineargradient>
                                </defs>
                                <g id="Sprite" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="sprite" transform="translate(-69.000000, -61.000000)">
                                        <g id="Group" transform="translate(17.000000, 15.000000)">
                                            <g id="icon" transform="translate(52.000000, 46.000000)">
                                                <path id="Combined-Shape" d="M13.5909091,1.77272727 C20.4442608,1.77272727 26,7.19618701 26,13.8863636 C26,20.5765403 20.4442608,26 13.5909091,26 C6.73755742,26 1.18181818,20.5765403 1.18181818,13.8863636 C1.18181818,13.540626 1.19665566,13.1982714 1.22574292,12.8598734 L6.30410592,12.859962 C6.25499466,13.1951893 6.22958398,13.5378796 6.22958398,13.8863636 C6.22958398,17.8551125 9.52536149,21.0724191 13.5909091,21.0724191 C17.6564567,21.0724191 20.9522342,17.8551125 20.9522342,13.8863636 C20.9522342,9.91761479 17.6564567,6.70030817 13.5909091,6.70030817 C13.2336969,6.70030817 12.8824272,6.72514561 12.5388136,6.77314791 L12.5392575,1.81561642 C12.8859498,1.78721495 13.2366963,1.77272727 13.5909091,1.77272727 Z"></path>
                                                <path id="Combined-Shape" d="M13.8863636,4.72727273 C18.9447899,4.72727273 23.0454545,8.82793741 23.0454545,13.8863636 C23.0454545,18.9447899 18.9447899,23.0454545 13.8863636,23.0454545 C8.82793741,23.0454545 4.72727273,18.9447899 4.72727273,13.8863636 C4.72727273,13.5378966 4.74673291,13.1939746 4.7846258,12.8556254 L8.55057141,12.8560055 C8.48653249,13.1896162 8.45300462,13.5340745 8.45300462,13.8863636 C8.45300462,16.887125 10.8856023,19.3197227 13.8863636,19.3197227 C16.887125,19.3197227 19.3197227,16.887125 19.3197227,13.8863636 C19.3197227,10.8856023 16.887125,8.45300462 13.8863636,8.45300462 C13.529522,8.45300462 13.180715,8.48740462 12.8430777,8.55306931 L12.8426531,4.78608796 C13.1851829,4.7472336 13.5334422,4.72727273 13.8863636,4.72727273 Z" fill="#4880EA"></path>
                                                <path id="Combined-Shape" d="M13.5909091,1.77272727 C20.4442608,1.77272727 26,7.19618701 26,13.8863636 C26,20.5765403 20.4442608,26 13.5909091,26 C6.73755742,26 1.18181818,20.5765403 1.18181818,13.8863636 C1.18181818,13.540626 1.19665566,13.1982714 1.22574292,12.8598734 L6.30410592,12.859962 C6.25499466,13.1951893 6.22958398,13.5378796 6.22958398,13.8863636 C6.22958398,17.8551125 9.52536149,21.0724191 13.5909091,21.0724191 C17.6564567,21.0724191 20.9522342,17.8551125 20.9522342,13.8863636 C20.9522342,9.91761479 17.6564567,6.70030817 13.5909091,6.70030817 C13.2336969,6.70030817 12.8824272,6.72514561 12.5388136,6.77314791 L12.5392575,1.81561642 C12.8859498,1.78721495 13.2366963,1.77272727 13.5909091,1.77272727 Z" fill="url(#linearGradient-1)"></path>
                                                <rect id="Rectangle" x="0" y="0" width="7.68181818" height="7.68181818"></rect>
                                                <rect id="Rectangle" fill="url(#linearGradient-2)" x="0" y="0" width="7.68181818" height="7.68181818"></rect>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <h2 class="brand-text mb-0"><span class="text-success">RMIS</span>@Cont</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="bx bx-x d-block d-xl-none font-medium-4 primary"></i><i class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block primary" data-ticon="bx-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="lines">
                
                <li class="active nav-item"><a href="./"><i class="menu-livicon" data-icon="home"></i><span class="menu-title text-truncate" data-i18n="Email">หน้าแรก</span></a></li>
                <li class="nav-item"><a href="./app-search"><i class="menu-livicon" data-icon="search"></i><span class="menu-title text-truncate" data-i18n="Email">ค้นหาข้อมูล</span></a></li>

                
                
                <li class="navigation-header text-truncate"><span data-i18n="Support">สนับสนุน</span>
                </li>
                <li class="nav-item"><a href="page-knowledge-base" target="_blank"><i class="menu-livicon" data-icon="info-alt"></i><span class="menu-title text-truncate" data-i18n="Documentation">ข้อมูลการใช้งาน</span></a>
                </li>
                <li class="nav-item"><a href="https://rmis2.medicine.psu.ac.th/documentation/" target="_blank"><i class="menu-livicon" data-icon="morph-folder"></i><span class="menu-title text-truncate" data-i18n="Documentation">คู่มือการใช้งาน</span></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body" >
                <div class="row">
                    <div class="col-12 d-none d-sm-block pb-2"><h5>โครงการที่อยู่ระหว่างการดำเนินการ (สำหรับเจ้าหน้าที่)</h5></div>
                    <div class="col-6 col-sm-3" style="padding: 0px 5px; cursor: pointer;">
                        <div class="card text-center" style="box-shadow: none; " onclick="window.location = 'progress_btn1'">
                            <div class="card-body py-1">
                                <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                                    <i class="bx bx-check-double font-medium-5"></i>
                                </div>
                                <div class="text-muted line-ellipsis">รอตรวจเอกสาร</div>
                                <?php 
                                $strSQL = "SELECT COUNT(*) cn FROM rec_progress WHERE rp_progress_status = '1' AND rp_sending_status = '1' AND rp_delete_status = '0' AND rp_confirm_1 = '0'";
                                $recCheck =$db->fetch($strSQL, false);
                                if(($recCheck) && ($recCheck['cn'] > 0))
                                    echo '<span class="badge badge-pill badge-danger badge-up" style="padding-left: 8px; padding-right: 8px;">'.$recCheck['cn'].'</span>';
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-3" style="padding: 0px 5px; cursor: pointer;">
                        <div class="card text-center" style="box-shadow: none; " onclick="window.location = 'app-22'">
                            <div class="card-body py-1">
                                <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                                    <i class="bx bx-file font-medium-5"></i>
                                </div>
                                <div class="text-muted line-ellipsis">รอออกใบรับรอง</div>
                                <?php 
                                $strSQL = "SELECT COUNT(*) cn FROM rec_progress WHERE rp_progress_status = '22' AND rp_sending_status = '1' AND rp_delete_status = '0' AND rp_confirm_1 = '1'";
                                $recCheck =$db->fetch($strSQL, false);
                                if(($recCheck) && ($recCheck['cn'] > 0))
                                    echo '<span class="badge badge-pill badge-danger badge-up" style="padding-left: 8px; padding-right: 8px;">'.$recCheck['cn'].'</span>';
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-3" style="padding: 0px 5px; cursor: pointer;">
                        <div class="card text-center" style="box-shadow: none; " onclick="window.location = 'app-users-list'">
                            <div class="card-body py-1">
                                <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                                    <i class="bx bx-info-circle font-medium-5"></i>
                                </div>
                                <div class="text-muted line-ellipsis">รอขอข้อมูลเพิ่มเติมจาก PI</div>
                                <?php 
                                $strSQL = "SELECT COUNT(*) cn FROM rec_progress WHERE rp_progress_status IN ('2', '20') AND rp_sending_status = '1' AND rp_delete_status = '0' AND rp_confirm_1 = '1'";
                                $recCheck =$db->fetch($strSQL, false);
                                if(($recCheck) && ($recCheck['cn'] > 0))
                                    echo '<span class="badge badge-pill badge-danger badge-up" style="padding-left: 8px; padding-right: 8px;">'.$recCheck['cn'].'</span>';
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-3" style="padding: 0px 5px; cursor: pointer;">
                        <div class="card text-center" style="box-shadow: none; " onclick="window.location = 'app-users-list'">
                            <div class="card-body py-1">
                                <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                                    <i class="bx bx-user-plus font-medium-5"></i>
                                </div>
                                <div class="text-muted line-ellipsis">รอทาบทามกรรมการ</div>
                                <?php 
                                $strSQL = "SELECT COUNT(*) cn FROM rec_progress WHERE rp_progress_status IN ('4') AND rp_sending_status = '1' AND rp_delete_status = '0' AND rp_confirm_1 = '1'";
                                $recCheck =$db->fetch($strSQL, false);
                                if(($recCheck) && ($recCheck['cn'] > 0))
                                    echo '<span class="badge badge-pill badge-danger badge-up" style="padding-left: 8px; padding-right: 8px;">'.$recCheck['cn'].'</span>';
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-3" style="padding: 0px 5px; cursor: pointer;">
                        <div class="card text-center" style="box-shadow: none; " onclick="window.location = 'app-users-list'">
                            <div class="card-body py-1">
                                <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                                    <i class="bx bx-paper-plane font-medium-5"></i>
                                </div>
                                <div class="text-muted line-ellipsis">รอสรุปผลประเมินส่งเลขา</div>
                                <?php 
                                $strSQL = "SELECT COUNT(*) cn FROM rec_progress WHERE rp_progress_status IN ('21') AND rp_sending_status = '1' AND rp_delete_status = '0' AND rp_confirm_1 = '1'";
                                $recCheck =$db->fetch($strSQL, false);
                                if(($recCheck) && ($recCheck['cn'] > 0))
                                    echo '<span class="badge badge-pill badge-danger badge-up" style="padding-left: 8px; padding-right: 8px;">'.$recCheck['cn'].'</span>';
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-3" style="padding: 0px 5px; cursor: pointer;">
                        <div class="card text-center" style="box-shadow: none; " onclick="window.location = 'app-users-list'">
                            <div class="card-body py-1">
                                <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                                    <i class="bx bxs-pencil font-medium-5"></i>
                                </div>
                                <div class="text-muted line-ellipsis">รอ PI ตอบข้อเสนอแนะ</div>
                                <?php 
                                $strSQL = "SELECT COUNT(*) cn FROM rec_progress WHERE rp_progress_status IN ('20') AND rp_sending_status = '1' AND rp_delete_status = '0' AND rp_confirm_1 = '1'";
                                $recCheck =$db->fetch($strSQL, false);
                                if(($recCheck) && ($recCheck['cn'] > 0))
                                    echo '<span class="badge badge-pill badge-danger badge-up" style="padding-left: 8px; padding-right: 8px;">'.$recCheck['cn'].'</span>';
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-3" style="padding: 0px 5px; cursor: pointer;">
                        <div class="card text-center" style="box-shadow: none; " onclick="window.location = 'app-users-list'">
                            <div class="card-body py-1">
                                <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                                    <i class="bx bx-group font-medium-5"></i>
                                </div>
                                <div class="text-muted line-ellipsis">รอนำเข้าที่ประชุม</div>
                                <?php 
                                $strSQL = "SELECT COUNT(*) cn FROM rec_progress WHERE rp_progress_status IN ('15') AND rp_sending_status = '1' AND rp_delete_status = '0' AND rp_confirm_1 = '1'";
                                $recCheck =$db->fetch($strSQL, false);
                                if(($recCheck) && ($recCheck['cn'] > 0))
                                    echo '<span class="badge badge-pill badge-danger badge-up" style="padding-left: 8px; padding-right: 8px;">'.$recCheck['cn'].'</span>';
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-3" style="padding: 0px 5px; cursor: pointer;">
                        <div class="card text-center" style="box-shadow: none; " onclick="window.location = 'app-users-list'">
                            <div class="card-body py-1">
                                <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                                    <i class="bx bx-wrench font-medium-5"></i>
                                </div>
                                <div class="text-muted line-ellipsis">รอดำเนินการอื่น ๆ</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-3" style="padding: 0px 5px; cursor: pointer;">
                        <div class="card text-center" style="box-shadow: none; " onclick="window.location = 'app-users-list'">
                            <div class="card-body py-1">
                                <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                                    <i class="bx bxs-group font-medium-5"></i>
                                </div>
                                <div class="text-muted line-ellipsis">รอสรุปผลจากที่ประชุม</div>
                                <?php 
                                $strSQL = "SELECT COUNT(*) cn FROM rec_progress WHERE rp_progress_status IN ('23') AND rp_sending_status = '1' AND rp_delete_status = '0' AND rp_confirm_1 = '1'";
                                $recCheck =$db->fetch($strSQL, false);
                                if(($recCheck) && ($recCheck['cn'] > 0))
                                    echo '<span class="badge badge-pill badge-danger badge-up" style="padding-left: 8px; padding-right: 8px;">'.$recCheck['cn'].'</span>';
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-3" style="padding: 0px 5px; cursor: pointer;">
                        <div class="card text-center" style="box-shadow: none; " onclick="window.location = 'app-users-list'">
                            <div class="card-body py-1">
                                <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                                    <i class="bx bx-menu font-medium-5"></i>
                                </div>
                                <div class="text-muted line-ellipsis">รายงานการดำเนินการวิจัยทั้งหมด</div>
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>  
    </div>

    
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <?php 
    // require('../componants/footer.php');
    ?>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <script src="../../../app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.js"></script>
    <script src="../../../app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js"></script>
    <script src="../../../app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="../../../app-assets/vendors/preload.js/dist/js/preload.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/scripts/configs/vertical-menu-dark.js"></script>
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <script src="../../../app-assets/js/scripts/components.js"></script>
    <script src="../../../app-assets/js/scripts/footer.js"></script>
    <!-- END: Theme JS-->


    <script src="../../../assets/js/core.js?v=<?php echo filemtime('../../../assets/js/core.js'); ?>"></script>
    <script src="../../../assets/js/authen.js?v=<?php echo filemtime('../../../assets/js/authen.js'); ?>"></script>
    <script src="../../../assets/js/wfh.js?v=<?php echo filemtime('../../../assets/js/wfh.js'); ?>"></script>

    <script>
        preload.hide()
    </script>

</body>
<!-- END: Body-->

</html>