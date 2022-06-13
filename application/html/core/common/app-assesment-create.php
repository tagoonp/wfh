<?php 
require('../../../config/server.inc.php');
require('../../../config/config.php');
require('../../../config/database.php'); 

$db = new Database();
$conn = $db->conn();

require('../../../config/common.php'); 
require('../../../config/user.php'); 

$page = 'home';

$category = '';
$atk = '';

if((isset($_GET['category'])) && ($_GET['category'] != '')){
    $category = mysqli_real_escape_string($conn, $_REQUEST['category']);
}

if((isset($_GET['atk'])) && ($_GET['atk'] != '')){
    $atk = mysqli_real_escape_string($conn, $_REQUEST['atk']);
}

$filter = 0;
if(($category != '') && ($atk != '')){
    $filter = 1;
}

?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<input type="hidden-" id="txtUid" value="<?php echo $uid; ?>" class="form-control">
<input type="hidden-" id="txtRole" value="<?php echo $resUser['ROLE']; ?>" class="form-control">
<?php 
die(); ?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="DOE Account, Department of Epidemiology, Faculty of Medicine, Prince of Songkla University">
    <meta name="keywords" content="">
    <meta name="author" content="Department of Epidemiology">
    <title>DOE-WFH : Department of Epidemiology Work from home System</title>
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
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/preload.js/dist/css/preload.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/page-knowledge-base.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css?v=<?php echo filemtime('../../../assets/css/style.css'); ?>">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="dark-layout">

    <!-- BEGIN: Header-->
    <div class="header-navbar-shadow"></div>
    <?php 
    require_once('./comp/header.php');
    ?>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="../../../html/ltr/vertical-menu-template-dark/index.php">
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
                        <h2 class="brand-text mb-0 text-shuccess"><span class="text-white">DOE-WFH</span> </h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="bx bx-x d-block d-xl-none font-medium-4 primary"></i><i class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block primary" data-ticon="bx-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <?php require_once('./comp/menu.php'); ?>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper mt-0">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="breadcrumbs-top">
                        <h5 class="content-header-title float-left pr-1 mb-0 text-dark">แบบประเมินความเสี่ยง</h5>
                        <div class="breadcrumb-wrapper d-none d-sm-block">
                            <ol class="breadcrumb p-0 mb-0 pl-1">
                                <li class="breadcrumb-item active"><a href="index.php"><i class="bx bx-home-alt"></i></a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div class="card">
                    <div class="card-body pt-2 text-dark">
                        <!-- <div class="form-group">
                            <label for="" class="text-dark mb-2" style="font-size: 1.1em;">ท่านมีอาการป่วย/ไม่สบายหรือไม่ <span class="text-danger">*</span></label>
                            <div class="pl-1">
                                <ul class="list-unstyled mb-0">
                                    <fieldset class="dn">
                                        <div class="radio radio-primary">
                                            <input type="radio" name="radioCheck1" id="radioCheck1_0" checked value="na">
                                            <label for="radioCheck1_0">ไม่มี</label>
                                        </div>
                                    </fieldset>
                                    <li class="d-inline-block mr-2 mb-1">
                                        <fieldset>
                                            <div class="radio radio-primary">
                                                <input type="radio" name="radioCheck1" id="radioCheck1_1" value="0" class="radioCheck1">
                                                <label for="radioCheck1_1">ไม่มี</label>
                                            </div>
                                        </fieldset>
                                    </li>
                                    <li class="d-inline-block mr-2 mb-1">
                                        <fieldset>
                                            <div class="radio radio-primary">
                                                <input type="radio" name="radioCheck1" id="radioCheck1_2" value="1" class="radioCheck1">
                                                <label for="radioCheck1_2">มี</label>
                                            </div>
                                        </fieldset>
                                    </li>
                                </ul>
                            </div>
                        </div> -->

                        <div id="nodiagPanal1" class="dn-">
                            <div class="form-group">
                                <label for="" class="text-dark mb-2" style="font-size: 1.1em;">1. ท่านมีความเสี่ยงอยู่ในกลุ่มใด <span class="text-danger">*</span></label>
                                
                                <div>
                                    <?php 
                                    if($filter == 0){
                                        ?>
                                        <ul class="list-unstyled mb-0 pl-0">
                                            <div>
                                                <h5 class="text-dark mb-2">มีอาการป่วยใด ๆ</h5>
                                            </div>
                                            <!-- <li class="d-inline mr-2 mb-1">
                                                <fieldset class="dn">
                                                    <div class="radio radio-primary">
                                                        <input type="radio" name="radioCat" id="radioCat0" checked value="na">
                                                        <label for="radioCat0" class="text-dark">มีอาการป่วย / ไม่สบาย โดยเฉพาะโรคทางเดินหายใจ</label>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="radio radio-primary">
                                                        <input type="radio" name="radioCat" id="radioCat1" value="1" <?php if($category == '1'){ echo "checked"; } ?> >
                                                        <label for="radioCat1" class="text-dark">มีอาการป่วย / ไม่สบาย โดยเฉพาะโรคทางเดินหายใจ</label>
                                                    </div>
                                                </fieldset>
                                            </li> -->

                                            <div class="row">
                                                <div class="col-2 col-sm-1">
                                                    <div class="custom-control custom-switch custom-control-inline mb-1">
                                                        <input type="radio" name="radioCat" class="custom-control-input" id="radioCat1" value="1" <?php if($category == '1'){ echo "checked"; } ?> id="customSwitch1">
                                                        <label class="custom-control-label mr-1" for="radioCat1">
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-10 col pl-2 pl-sm-0"><span>มีอาการป่วย / ไม่สบาย โดยเฉพาะโรคทางเดินหายใจ></span></div>
                                            </div>

                                            <div>
                                                <h5 class="text-dark mb-2 mt-2">ไม่มีมีอาการป่วยแต่สัมผัสกลุ่มเสี่ยง</h5>
                                            </div>

                                            <div class="row">
                                                <div class="col-2 col-sm-1">
                                                    <div class="custom-control custom-switch custom-control-inline mb-1">
                                                        <input type="radio" name="radioCat" class="custom-control-input" id="radioCat2" value="2" <?php if($category == '2'){ echo "checked"; } ?> id="customSwitch1">
                                                        <label class="custom-control-label mr-1" for="radioCat2">
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-10 col pl-2 pl-sm-0"><span>ติดต่อหรือสัมผัสกับผู้ที่มีผล Positive (ครอบครัว/มีความใกล้ชิดกลุ่มเสี่ยงในระดับสูง/มีความเสี่ยงของกิจกรรมสูง)  และมี<u>ผล ATK ของตนเอง Negative</u></span></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-2 col-sm-1">
                                                    <div class="custom-control custom-switch custom-control-inline mb-1">
                                                        <input type="radio" name="radioCat" class="custom-control-input"  id="radioCat3" value="3" <?php if($category == '3'){ echo "checked"; } ?> id="customSwitch1">
                                                        <label class="custom-control-label mr-1" for="radioCat3">
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-10 col pl-2 pl-sm-0"><span>ติดต่อหรือสัมผัสกับผู้ที่มีผล Positive (ไม่ใช่บุคคลตามข้อบน) และมี<u>ผล ATK ของตนเอง Negative</u></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-2 col-sm-1">
                                                    <div class="custom-control custom-switch custom-control-inline mb-1">
                                                        <input type="radio" name="radioCat" class="custom-control-input" id="radioCat4"  value="4" <?php if($category == '4'){ echo "checked"; } ?> id="customSwitch1">
                                                        <label class="custom-control-label mr-1" for="radioCat4">
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-10 col pl-2 pl-sm-0"><span>ติดต่อหรือสัมผัสกับผู้ที่มีผล Positive และมี<u>ผล ATK ของตนเอง Positive</u></span></div>
                                            </div>

                                            <!-- ---------------------- -->
                                            
                                            <!-- <li class="d-inline mr-2 mb-1">
                                                <fieldset>
                                                    <div class="radio radio-primary">
                                                        <input type="radio" name="radioCat" id="radioCat2"  value="2" <?php if($category == '2'){ echo "checked"; } ?>>
                                                        <label for="radioCat2" class="text-dark">ติดต่อหรือสัมผัสกับผู้ที่มีผล Positive (ครอบครัว/มีความใกล้ชิดกลุ่มเสี่ยงในระดับสูง/มีความเสี่ยงของกิจกรรมสูง)  และมี<u>ผล ATK ของตนเอง Negative</u></label>
                                                    </div>
                                                </fieldset>
                                            </li>
                                            <li class="d-inline mr-2 mb-1">
                                                <fieldset>
                                                    <div class="radio radio-primary">
                                                        <input type="radio" name="radioCat" id="radioCat3"  value="3" <?php if($category == '3'){ echo "checked"; } ?>>
                                                        <label for="radioCat3" class="text-dark">ติดต่อหรือสัมผัสกับผู้ที่มีผล Positive (ไม่ใช่บุคคลตามข้อบน) และมี<u>ผล ATK ของตนเอง Negative</u></label>
                                                    </div>
                                                </fieldset>
                                            </li>
                                            <li class="d-inline mr-2 mb-1">
                                                <fieldset>
                                                    <div class="radio radio-primary">
                                                        <input type="radio" name="radioCat" id="radioCat4"  value="4" <?php if($category == '4'){ echo "checked"; } ?>>
                                                        <label for="radioCat4" class="text-dark">ติดต่อหรือสัมผัสกับผู้ที่มีผล Positive และมี<u>ผล ATK ของตนเอง Positive</u></label>
                                                    </div>
                                                </fieldset>
                                            </li> -->
                                        </ul>
                                        <?php
                                    }else{
                                        if($category == '1'){ ?><i class="bx bx-check"></i> มีอาการป่วย / ไม่สบาย โดยเฉพาะโรคทางเดินหายใจ<?php }
                                        if($category == '2'){ ?><i class="bx bx-check"></i> ติดต่อหรือสัมผัสกับผู้ที่มีผล Positive (ครอบครัว/มีความใกล้ชิดกลุ่มเสี่ยงในระดับสูง/มีความเสี่ยงของกิจกรรมสูง)  และมี<u>ผล ATK ของตนเอง Negative</u><?php }
                                        if($category == '3'){ ?><i class="bx bx-check"></i> ติดต่อหรือสัมผัสกับผู้ที่มีผล Positive (ไม่ใช่บุคคลตามข้อบน) และมี<u>ผล ATK ของตนเอง Negative</u><?php }
                                        if($category == '4'){ ?><i class="bx bx-check"></i> ติดต่อหรือสัมผัสกับผู้ที่มีผล Positive และมี<u>ผล ATK ของตนเอง Positive</u><?php }
                                    }
                                    ?>
                                    
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div id="atkPanal">
                            <div class="form-group">
                                <label for="" class="text-dark mb-0" style="font-size: 1.1em;">2. ผลตรวจ ATK <span class="text-danger">*</span></label>
                                <p class="text-danger">* กรณีที่ท่านจะเข้าสู่ระบบ WFH ให้ทำการตรวจ ATK ทุกกรณี</p>
                                <div>
                                    <?php 
                                    if($filter == 0){
                                        ?>
                                        <ul class="list-unstyled mb-0 pl-1">
                                            <li class="d-inline-block mr-2 mb-1">
                                                <fieldset class="dn">
                                                    <div class="radio radio-primary">
                                                        <input type="radio" name="radioAtk" id="radioAtk0" checked value="na">
                                                        <label for="radioAtk0" class="text-dark">NA</label>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="radio radio-primary">
                                                        <input type="radio" name="radioAtk" id="radioAtk1" value="neg"  <?php if($atk == 'neg'){ echo "checked"; } ?> >
                                                        <label for="radioAtk1" class="text-dark">ผล Negative</label>
                                                    </div>
                                                </fieldset>
                                            </li>
                                            <li class="d-inline-block mr-2 mb-1">
                                                <fieldset>
                                                    <div class="radio radio-primary">
                                                        <input type="radio" name="radioAtk" id="radioAtk2" value="pos"  <?php if($atk == 'pos'){ echo "checked"; } ?>>
                                                        <label for="radioAtk2" class="text-dark">ผล Positive</label>
                                                    </div>
                                                </fieldset>
                                            </li>
                                        </ul>
                                        <?php
                                    }else{
                                        if($atk == 'neg'){ ?><span class="badge badge-success round" style="padding-bottom: 10px;"><i class="bx bx-minus"></i> Negative</span><?php }
                                        if($atk == 'pos'){ ?><span class="badge badge-danger round" style="padding-bottom: 10px;"><i class="bx bx-plus"></i> Positive</span><?php }
                                    }
                                    ?>
                                    
                                </div>
                            </div>

                            <?php 
                            if(($category == '') || ($atk == '')){
                                ?>
                                <div class="form-group pt-0 float-right">
                                    <button class="btn btn-success" onclick="btnNext()">ถัดไป</button>
                                </div>
                                <?php
                            }
                            ?>
                            
                        </div>

                        <?php 
                        if(($category == '1') && ($atk == 'neg')){
                            require("./comp/form_1_1.php");
                        }else if(($category == '1') && ($atk == 'pos')){
                            require("./comp/form_1_2.php");
                        }else if(($category == '2') && ($atk == 'neg')){
                            require("./comp/form_2.php");
                        }else if(($category == '3') && ($atk == 'neg')){
                            require("./comp/form_3.php");
                        }else if(($category == '4') && ($atk == 'pos')){
                            require("./comp/form_4.php");
                        }else{
                            if(($category != '') && ($atk != ''))
                                require("./comp/form_common.php");
                        }
                        ?>

                        


                        

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="modal fade" id="modalRemark" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white th" id="exampleModalCenterTitle" style="font-family: 'Noto Sans Thai', sans-serif !important;">คำชี้แจง</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="mb-0 text-dark">
                        เพื่อให้เป็นไปตามนโยบายการปฎิบัติตัวก่อนการปฏิบัติงานที่บ้าน (Work From Home) ของสาขาวิชาระบาดวิทยา คณะแพทยศาสตร์ มหาวิทยาลัยสงขลานครินทร์ ท่านจะต้องเป็น/มี/ปรากฏอยู่ในกลุ่มใดกลุ่มหนึ่งตังต่อไปนี้
                        <ol class="text-dark">
                            <li>กลุ่มผู้ที่มีอาการ</li>
                            <li>กลุ่มผู้ที่ไม่มีอาการ และมีการติดต่อกับคนที่มีผลเป็น Positive และ ผลตรวจ ATK  เป็น Negative</li>
                            <li>กลุ่มผู้ที่ไม่มีอาการ และติดต่อกับคนที่มีผลเป็น Positive และ ผลตรวจ ATK เป็น Positive</li>
                        </ol>
                    </p>
                    <div class="form-group">
                        <label for="" class="text-dark">ท่านได้อ่านข้อมูลข้างต้นและยืนยันว่าตนเองอยู่ในกลุ่มใดกลุ่มหนึ่งแล้วใช่หรือไม่ <span class="text-danger">*</span></label>
                        <select name="txtC1" id="txtC1" class="form-control">
                            <option value="" selected>-- เลือก --</option>
                            <option value="1">อ่านแล้ว และ อยู่ในกลุ่มข้างต้น</option>
                            <option value="0">อ่านแล้ว แต่ไม่อยู่ในกลุ่มข้างต้น</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">ปิด</span>
                    </button>
                    <button type="button" class="btn btn-danger ml-1" onclick="gonext()">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">ดำเนินการต่อ</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <?php 
    require('./comp/footer.php');
    ?>


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
    <script src="../../../app-assets/js/scripts/pages/page-knowledge-base.js"></script>
    <!-- END: Page JS-->

    <script src="../../../assets/js/core.js?v=<?php echo filemtime('../../../assets/js/core.js'); ?>"></script>
    <script src="../../../assets/js/authen.js?v=<?php echo filemtime('../../../assets/js/authen.js'); ?>"></script>
    <script src="../../../assets/js/wfh.js?v=<?php echo filemtime('../../../assets/js/wfh.js'); ?>"></script>

    <script>

        preload.hide()

        $(function(){

            $('#radioCat1').click(function(){
                // $check = $("input[name='radioCheck1']:checked").val()
                // if($check == 1){
                //     $('#symptom1').removeClass('dn')
                //     $('#atkPanal').removeClass('dn')
                // }else{
                //     $('#symptom1').addClass('dn')
                //     $('#atkPanal').removeClass('dn')
                // }
                $('#radioAtk0').trigger('click')
            })

            $('#radioCat2').click(function(){
                // $check = $("input[name='radioCheck1']:checked").val()
                // if($check == 1){
                //     $('#symptom1').removeClass('dn')
                //     $('#atkPanal').removeClass('dn')
                // }else{
                //     $('#symptom1').addClass('dn')
                //     $('#atkPanal').removeClass('dn')
                // }
                $('#radioAtk1').trigger('click')
            })

            $('#radioCat3').click(function(){
                // $check = $("input[name='radioCheck1']:checked").val()
                // if($check == 1){
                //     $('#symptom1').removeClass('dn')
                //     $('#atkPanal').removeClass('dn')
                // }else{
                //     $('#symptom1').addClass('dn')
                //     $('#atkPanal').removeClass('dn')
                // }
                $('#radioAtk1').trigger('click')
            })

            $('#radioCat4').click(function(){
                // $check = $("input[name='radioCheck1']:checked").val()
                // if($check == 1){
                //     $('#symptom1').removeClass('dn')
                //     $('#atkPanal').removeClass('dn')
                // }else{
                //     $('#symptom1').addClass('dn')
                //     $('#atkPanal').removeClass('dn')
                // }
                $('#radioAtk2').trigger('click')
            })
        })

        function btnNext(){
            $cat = $("input[name='radioCat']:checked").val()
            $atk = $("input[name='radioAtk']:checked").val()

            if(($cat == 'na') || ($atk == 'na')){
                console.log('asd');
                Swal.fire({
                    icon: "error",
                    title: 'คำเตือน',
                    text: "กรุณากรอกข้อมูลให้ครบถ้วน",
                    confirmButtonText: 'รับทราบ',
                    confirmButtonClass: 'btn btn-danger',
                })
                return ;
            }
            
            window.location = './app-assesment-create?category=' + $cat + '&atk=' + $atk
        }
    </script>

</body>
<!-- END: Body-->

</html>