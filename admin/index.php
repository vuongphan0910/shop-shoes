<?php 
session_start();
ob_start();
require_once "../libraries/classquantritin.php";
$qt=new quantritin;
if(isset($_COOKIE['id'])){
    $_SESSION['login_id']=$_COOKIE['id'];
    $_SESSION['login_user']=$_COOKIE['un'];
    $_SESSION['login_hoten']=$_COOKIE['ht'];
}
$qt->checkLogin(); 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Quản Trị Website Bán Hàng</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <!-- Bootstrap Select Css -->
    <!--  <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" /> -->
    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="plugins/light-gallery/css/lightgallery.css" rel="stylesheet">
    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />
    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />
    <!-- JQuery DataTable Css -->
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>
<body class="theme-red">
    <?php include "header.php" ?>
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$_SESSION['login_hoten']?></div>
                    <div class="email"><?=$_SESSION['login_user']?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <?php include_once "menu.php"; ?>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <?php include 'tab_content.php'; ?>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
     <?php 
     if(isset($_GET['p'])){
       $p=$_GET['p'];
       switch($p){
         case "chungloai_add": include_once "chungloai_add.php" ; break;
         case "chungloai_list": include_once "chungloai_list.php" ; break;
         case "chungloai_edit": include_once "chungloai_edit.php" ; break;
         case "chungloai_delete": include_once "chungloai_delete.php" ; break;
         case "loaisp_add": include_once "loaisp_add.php" ; break;
         case "loaisp_list": include_once "loaisp_list.php" ; break;
         case "loaisp_edit": include_once "loaisp_edit.php" ; break;
         case "loaisp_delete": include_once "loaisp_del.php" ; break;
         case "pro_list": include_once "product_list.php" ; break;
         case "pro_add": include_once "product_add.php" ; break;
         case "pro_edit": include_once "pro_edit.php" ; break;
         case "pro_delete": include_once "product_del.php" ; break;
         case "pro_img": include_once "product_img.php" ; break;
         case "dh_list": include_once "DH_list.php" ; break;
         case "dh_detail": include_once "DH_detail.php" ; break;
         case "dh_del": include_once "dh_del.php" ; break;
         case "img_list": include_once "img_list.php" ; break;
         case "comment": include_once "comment.php" ; break;
         case "cm_edit": include_once "comment_edit.php" ; break;
         case "cm_del": include_once "comment_del.php" ; break;
         case "user_list": include_once "user_list.php" ; break;
     }
 }else include_once "product_list.php" ;
 ?>
</section>
<!-- Jquery Core Js -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap Core Js -->
<script src="plugins/bootstrap/js/bootstrap.js"></script>
<!-- Select Plugin Js -->
<!-- <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>
-->
<!-- Slimscroll Plugin Js -->
<script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- Waves Effect Plugin Js -->
<script src="plugins/node-waves/waves.js"></script>
<!-- JQuery DataTable Css -->
<link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
<!-- Jquery DataTable Plugin Js -->
<script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
<!-- Custom Js -->
<script src="js/admin.js"></script>
<script src="js/pages/tables/jquery-datatable.js"></script>
<script src="js/pages/medias/image-gallery.js"></script>
<!-- Demo Js -->
<script src="js/demo.js"></script>
<script src="plugins/ckeditor/ckeditor.js"></script>
<script src="plugins/ckfinder/ckfinder.js"></script>
<script src="plugins/light-gallery/js/lightgallery-all.js"></script>
<script>
    $(document).ready(function(){
        CKEDITOR.replace('ckeditor',{
            language:'vi',skin:'moono',
            filebrowserImageBrowseUrl:'plugins/ckfinder/ckfinder.html?Type=Images',
            filebrowserImageBrowseUploadUrl:'plugins/core/connector/php/connector.php?command=QuickUpload&type=Images',
        });
        CKEDITOR.config.height=300;
    });
    function selectFileWithCKFinder( elementId ) {
        CKFinder.popup( {
            chooseFiles: true,
            width: 800,
            height: 600,
            onInit: function( finder ) {
                finder.on( 'files:choose', function( evt ) {
                    var file = evt.data.files.first();
                    var output = document.getElementById( elementId );
                    output.value = file.getUrl();
                } );
                finder.on( 'file:choose:resizedImage', function( evt ) {
                    var output = document.getElementById( elementId );
                    output.value = evt.data.resizedUrl;
                } );
            }
        } );
    }
</script>
</body>
</html>