<?php
session_start();
include("config.php");

?>

<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7.1
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
  <?php include('./include/head.php');?>
  <link href="./assets/custom.css" rel="stylesheet" type="text/css" />

</head>
<!-- END HEAD -->

<body class="page-header-fixed">
  <div class="page-wrapper">
    <!-- BEGIN HEADER -->
    <!-- BEGIN LOGO -->
    <div class="col-md-6" id="logo">
      <div class="page-logo">
        <a href="index.php">

          <img src="./img/logo.png" style="width: 600px;" class="img-responsive" alt="logo" class="logo-default" /> </a>
        </div>
      </div>
      
          <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav navbar-right">
          <?php
          if (isset($_SESSION['email'])) {
            echo '
            <li class="dropdown dropdown-user" style="margin-bottom: 10px; margin-top: 10px;">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
            <img alt=""  class="img-circle" src="./img/profil.png" />
            <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-default">
            <li>
            <a href="">'.$_SESSION['email'].'</a>
            </li>
            <li>
            <a href="./logout.php">
            <i class="icon-key"></i> Log Out </a>
            </li>
            ';
          }
          ?>
        </ul>
      </li>
          </ul>
      </div>
  <div>
    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
  </div>
  <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
    <span></span>
  </a>


  <!-- END HEADER -->
  <!-- BEGIN HEADER & CONTENT DIVIDER -->
  <!-- END HEADER & CONTENT DIVIDER -->
  <!-- BEGIN CONTAINER -->
  <div class="page-container" style="margin-top: 0px;">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
      <!-- BEGIN SIDEBAR -->
      <?php
      if (isset($_SESSION['email'])) {
        echo '
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px" id="sidebar">
        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        <li class="sidebar-toggler-wrapper hide">
        <div class="sidebar-toggler">
        <span></span>
        </div>
        </li>
        <!-- END SIDEBAR TOGGLER BUTTON -->
        <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->

        <li class="nav-item start" >
        <a href="index.php" class="nav-link nav-toggle">
        <i class="icon-home" style="color: white;"></i>
        <span class="title">Beranda</span>
        </a>
        <li class="nav-item  ">
        <a href="../panduan.php" class="nav-link nav-toggle">
        <i class="icon-docs" style="color: white;"></i>
        <span class="title">Panduan</span>
        </a>
        </li>
        <li class="nav-item active open ">
        <a href="./on-pengusul/tahap1.php" class="nav-link nav-toggle">
        <i class="glyphicon glyphicon-plus" style="color: white;"></i>
        <span class="title">Usul Program Studi</span>
        </a>
        <ul class="sub-menu">
        <li class="nav-item  ">
        <a href="on-pengusul/tahap1.php" class="nav-link ">
        <span class="title">Unggah Proposal dan Lampiran</span>
        <span class="selected"></span>
        </a>
        </li>
        <li class="nav-item  ">
        <a href="on-pengusul/tahap2.php" class="nav-link ">
        <span class="title">Hasil Evaluasi</span>
        </a>
        </li>
        <!-- <li class="nav-item  ">
        <a href="on-pengusul/tahap3.php" class="nav-link ">
        <span class="title">Unggah Lampiran</span>
        </a>
        </li> -->
        <li class="nav-item  ">
        <a href="on-pengusul/pengumuman.php" class="nav-link ">
        <span class="title">Pengumuman</span>
        </a>
        </li>
        </ul>
        </li>
        </ul>
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
        </div>
        ';
      }
      ?>
      <!-- END SIDEBAR -->
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper" id="page-content-wrapper">
      <!-- BEGIN CONTENT BODY -->
      <?php 
      if (isset($_SESSION['email'])) {
        echo '
        <div class="page-content">';
      }else{
        echo '
        <div class="page-content" style="margin-left: 0px;">';
      }
      ?>
      <!-- BEGIN PAGE HEADER-->
      <!-- BEGIN THEME PANEL -->
      <!-- END THEME PANEL -->
      <!-- BEGIN PAGE BAR -->
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <a href="index.php">Beranda</a>
            <i class="fa fa-circle"></i>
          </li>
          <li>
            <span>Panduan</span>
          </li>
        </ul>
      </div>

      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-8 ">
          <!-- BEGIN Portlet PORTLET-->
          <div class="portlet box yellow">
            <div class="portlet-title">
              <div class="caption">
                <i class="fa fa-file"></i>Panduan</div>
              </div>
              <div class="portlet-body">
                <div class="scroller" style="height:200px" data-rail-visible="1" data-rail-color="yellow" data-handle-color="#a1b2bd">
                  <?php
                  $q1 = $dbconnect->query("SELECT * FROM panduan");
                  while ($rows = mysqli_fetch_array($q1)) {
                    echo '
                    <p>'.$rows['nama_file'].'
                    [ <a href="./file/'.$rows['file'].'" download>Download</a> ]
                    ';
                  }
                  ?>
                </div>
              </div>
            </div>
            <!-- END Portlet PORTLET-->
          </div>
        </div>

        <div class="row">
        <div class="col-md-8 ">
          <!-- BEGIN Portlet PORTLET-->
          <div class="portlet box yellow">
            <div class="portlet-title">
              <div class="caption">
                <i class="fa fa-file"></i>Lampiran</div>
              </div>
              <div class="portlet-body">
                <div class="scroller" style="height:200px" data-rail-visible="1" data-rail-color="yellow" data-handle-color="#a1b2bd">
                  <?php
                  $q2 = $dbconnect->query("SELECT * FROM file_lampiran");
                  while ($row = mysqli_fetch_array($q2)) {
                    echo '
                    <p>'.$row['nama_file'].'
                    [ <a href="./file/'.$row['file'].'" download>Download</a> ]
                    ';
                  }
                  ?>
                </div>
              </div>
            </div>
            <!-- END Portlet PORTLET-->
          </div>
        </div>

                      
                             </div>
                             <!-- END CONTENT BODY -->
                           </div>
                           <!-- END CONTENT -->
                           <!-- BEGIN QUICK SIDEBAR -->
                           <a href="javascript:;" class="page-quick-sidebar-toggler">
                            <i class="icon-login"></i>
                          </a>

                          <!-- END QUICK SIDEBAR -->
                        </div>
                        <!-- END CONTAINER -->
                        <!-- BEGIN FOOTER -->
                        <?php include('./include/footer.php');?>
                        <!-- END THEME LAYOUT SCRIPTS -->
                      </body>

                      </html>