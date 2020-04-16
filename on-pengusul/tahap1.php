<?php
session_start();
include("../config.php");

if ( !isset($_SESSION['email']) || ( isset($_SESSION['email']) && $_SESSION['level_user'] != 'pengusul' ) ) {
  header('location:./../login.php');
  exit();
}

$id_pengusul = $_SESSION['id_user'];
$q1="SELECT jenis, jenjang FROM prodi";

?>

<!doctype html>
<html>
<head>

  <?php include('./include/head.php');?> 
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script type="text/javascript">
    $(function(){
      $('#fileL').change(function(){
        var combinedSize = 0;
        for(var i=0;i<this.files.length;i++) {
          combinedSize += (this.files[i].size||this.files[i].fileSize);
        }
        //alert(combinedSize);
        if(combinedSize > 20971520){
          document.getElementById("submitL").disabled = true;
          $("#noteL").html("<b style='color: red;'>File tidak boleh lebih dari 20 MB.<b>");
        }else{
          document.getElementById("submitL").disabled = false;
          $("#noteL").html("");
        }
      })
    });

    $(function(){
      $('#fileP').change(function(){
        var combinedSize = 0;
        for(var i=0;i<this.files.length;i++) {
          combinedSize += (this.files[i].size||this.files[i].fileSize);
        }
        //alert(combinedSize);
        if(combinedSize > 20971520){
          document.getElementById("submitP").disabled = true;
          $("#note").html("<b style='color: red;'>File tidak boleh lebih dari 20 MB.<b>");
        }else{
          document.getElementById("submitP").disabled = false;
          $("#noteL").html("");
        }
      })
    });
  </script>

</head>

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

</head>
<!-- END HEAD -->

<body class="page-header-fixed">
  <div class="page-wrapper">
    <!-- BEGIN HEADER -->
    <!-- BEGIN LOGO -->
    <div class="col-md-6" id="logo">
      <div class="page-logo">
        <a href="index.php">

          <img src="../img/logo.png" style="width: 600px;" class="img-responsive" alt="logo" class="logo-default" /> </a>
        </div>
      </div>
          <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav navbar-right">
                      <!-- <li ><a href="#">Panduan</a></li>
                        <li ><a href="../file/prodi.pdf" download>Informasi Program Studi</a></li> -->

                        <li class="dropdown dropdown-user" style="margin-bottom: 10px; margin-top: 10px;">
                          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img alt=""  class="img-circle" src="../img/profil.png" />
                            <i class="fa fa-angle-down"></i>
                          </a>
                          <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                              <a href="">
                                <?=$_SESSION['email'];?>
                              </a>
                            </li>
                            <li>
                              <a href="../logout.php">
                                <i class="icon-key"></i> Log Out </a>
                              </li>
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
                               <a href="tahap1.php" class="nav-link nav-toggle">
                                <i class="glyphicon glyphicon-plus" style="color: white;"></i>
                                <span class="title">Usul Program Studi</span>
                              </a>
                              <ul class="sub-menu">
                                <li class="nav-item  ">
                                  <a href="tahap1.php" class="nav-link ">
                                    <span class="title">Unggah Proposal dan Lampiran</span>
                                    <span class="selected"></span>
                                  </a>
                                </li>
                                <li class="nav-item  ">
                                  <a href="tahap2.php" class="nav-link ">
                                    <span class="title">Hasil Evaluasi</span>
                                  </a>
                                </li>
                  <!-- <li class="nav-item  ">
                    <a href="tahap3.php" class="nav-link ">
                      <span class="title">Unggah Lampiran</span>
                    </a>
                  </li> -->
                  <li class="nav-item  ">
                    <a href="pengumuman.php" class="nav-link ">
                      <span class="title">Pengumuman</span>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
            <!-- END SIDEBAR MENU -->
            <!-- END SIDEBAR MENU -->
          </div>
          <!-- END SIDEBAR -->
        </div>
        <!-- END SIDEBAR -->
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper" id="page-content-wrapper">
          <!-- BEGIN CONTENT BODY -->
          <div class="page-content">
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
                  <span>Unggah Proposal dan Lampiran</span>
                </li>
              </ul>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <!-- BEGIN DASHBOARD STATS 1-->

            <div class="clearfix"></div>
            <!-- END DASHBOARD STATS 1-->

            <div class="row" style="background-color: #f5f5f5; border: 1px solid #e3e3e3;margin: 20px;padding-bottom: 15px;">
              <div class="col-md-12">
                <h3 style="padding-left: 10px;color: #6b3e0d;">Unggah Proposal</h3>
                <hr>
                <?php
                //stataus proposal
                // $cekStatus = mysqli_query($dbconnect, "SELECT status_proposal FROM data_evaluasi WHERE id_pengusul= '$id_pengusul'");
                // $hCekStatus = mysqli_fetch_assoc($cekStatus);
                // if ( $hCekStatus['status_proposal'] == 'selesai'  ) {
                //   echo '<div class="note note-warning">Anda sudah melakukan unggah proposal.</div>';
                // }
                //unggah proposal
                if(isset($_POST['submitP'])){
                  $jenjang_prodi = $_POST['jenis_prodi'];
                  $nama_prodi = $_POST['nama_prodi'];

                  $ekstensi_diperbolehkan = 'pdf';

                    //Cek null
                  if ($jenjang_prodi == '' || $nama_prodi == '' || $_FILES['proposal_prodi']['name'] == ""){
                    echo '<div class="note note-warning">Informasi jenjang, nama program studi beserta proposal tidak boleh kosong.</div>';
                  }else{
                    $proposal_prodi = $_FILES['proposal_prodi']['name'];
                    $x = explode('.', $proposal_prodi);
                    $ekstensi = strtolower(end($x));
                    $file_tmp = $_FILES['proposal_prodi']['tmp_name'];

                    if($ekstensi == $ekstensi_diperbolehkan){
                      $folder = $id_pengusul."-".$jenjang_prodi."-".$nama_prodi;
                      $namaP = 'proposal-'.$jenjang_prodi.'-'.$nama_prodi.'.pdf';

                      //untuk unggah ulang
                      $cekk = mysqli_query($dbconnect,"SELECT proposal FROM data_input WHERE id_pengusul='$id_pengusul'");
                      $hasilcekk = mysqli_fetch_assoc($cekk);
                      if($hasilcekk['proposal'] !=NULL){
                        $query = mysqli_query($dbconnect,"UPDATE data_input SET proposal = '$namaP'");

                        move_uploaded_file($file_tmp, 'File/'.$folder.'/'.$namaP);
                        echo '<div class="note note-success">Proposal berhasil diunggah. Silahkan tunggu hasil evaluasi.</div>';

                          //mengubah status menjadi selesai unggah
                        $query1 = mysqli_query($dbconnect,"UPDATE data_evaluasi SET status_proposal='selesai'");
                        $quer2 = mysqli_query($dbconnect,"INSERT INTO rekap_status VALUES ('$id_pengusul', now(), 'Unggah ulang proposal')");
                      }else{
                        //kalau unggah awal
                        $query = mysqli_query($dbconnect,"INSERT INTO data_input VALUES('$id_pengusul', '$jenjang_prodi', '$nama_prodi', '$namaP','', now(), 'baru')");
                        if($query){
                          if (!file_exists("./File/$folder")) {
                            mkdir("./File/$folder");
                          }
                          move_uploaded_file($file_tmp, 'File/'.$folder.'/'.$namaP);
                          echo '<div class="note note-success">Proposal berhasil diunggah. Silahkan tunggu hasil evaluasi.</div>';

                            //mengubah status menjadi selesai unggah
                          $query1 = mysqli_query($dbconnect,"INSERT INTO data_evaluasi (id_pengusul, status_proposal)VALUES('$id_pengusul', 'selesai')");
                          $quer2 = mysqli_query($dbconnect,"INSERT INTO rekap_status VALUES ('$id_pengusul', now(), 'Unggah proposal')");
                        }else{
                          echo '<div class="note note-warning">File gagal diunggah.</div>';
                        }
                      }
                    }else{
                      echo '<div class="note note-warning">Ekstensi file tidak diperbolehkan.</div>';
                    }
                  }
                }
                ?>
                <form method="post" action="tahap1.php" enctype="multipart/form-data">
                  <div>
                    <h5>Jenis Program Studi</h5>
                    <select class="form-control" name="jenis_prodi">
                      <option value="0">Pilih Jenis Program</option>
                      <?php
                      $jenis = mysqli_query($dbconnect,$q1);
                      while ($data = mysqli_fetch_assoc($jenis)){
                        ?>
                        <option value="<?php echo $data['jenjang']; ?>"><?php echo $data['jenis']; ?></option>
                        <?php
                      }
                      ?>

                    </select>
                  </div>

                  <div>
                    <br>
                    <h5>Nama Program Studi</h5>
                    <input type="text" name="nama_prodi" class="form-control" placeholder="Masukkan Nama Program Studi" >
                  </div>

                  <div>
                    <br>
                    <h5>Unggah Proposal</h5>
                    <input type="file" name="proposal_prodi" id="fileP">
                    <p id="note" class="help-block" style="float: left;">Maksimum 20 MB.</p><br>
                  </div>

                    <!-- <div>
                      <br>
                      <h5>Unggah Lampiran<h5>
                        <input type="file" name="lampiran_prodi">
                        <p class="help-block" style="float: left;">Tidak diwajibkan.</p>
                      </div> -->
                      <?php
                      $cekStatus = mysqli_query($dbconnect, "SELECT status_proposal FROM data_evaluasi WHERE id_pengusul= '$id_pengusul'");
                      $hCekStatus = mysqli_fetch_assoc($cekStatus);
                      if ($hCekStatus['status_proposal'] == NULL || $hCekStatus['status_proposal'] == 'proses') {
                        echo ' <div class="col-md-12" style="margin-top: 20px; padding: 0px;">
                        <input type="submit" name="submitP" id="submitP" class="btn btn-primary pull-left" style="margin-right: 20px;" value="Submit">
                        </div>';

                      }else{
                        echo '
                        <div class="col-md-12" style="margin-top: 20px; padding: 0px;">
                        <input type="submit" name="submitP" class="btn btn-primary pull-left" style="margin-right: 20px;" value="Submit" disabled>
                        </div>';
                      }
                      ?>
                    </form>
                  </div>
                </div>


                <div class="clearfix"></div>
                <!-- END DASHBOARD STATS 1-->

                <div class="row" style="background-color: #f5f5f5; border: 1px solid #e3e3e3;margin: 20px;padding-bottom: 15px;">
                  <div class="col-md-12">
                    <h3 style="padding-left: 10px;color: #6b3e0d;">Unggah Lampiran</h3>
                    <hr>
                    <div class="note note-warning">Download lampiran dari universitas di halaman <a href="../panduan.php">panduan</a>.</div>
                    <?php
                //stataus lampiran
                    // $cekStatus = mysqli_query($dbconnect, "SELECT status_lampiran FROM data_evaluasi WHERE id_pengusul= '$id_pengusul'");
                    // $hCekStatus = mysqli_fetch_assoc($cekStatus);
                    // if ( $hCekStatus['status_lampiran'] == 'selesai'  ) {
                    //   echo '<div class="note note-warning">Anda sudah melakukan unggah lampiran.</div>';
                    // }
                //unggah lampiran
                    if(isset($_POST['submitL'])){
                      $q= mysqli_query($dbconnect, "SELECT id_pengusul, jenjang, nama FROM data_input WHERE id_pengusul= '$id_pengusul'");
                      $data_input = mysqli_fetch_assoc($q);
                      $id_pengusul = $data_input['id_pengusul'];
                      $jenjang_prodi = $data_input['jenjang'];
                      $nama_prodi = $data_input['nama'];
                      $folder = $id_pengusul."-".$jenjang_prodi."-".$nama_prodi;

                      $i=0; 
                      foreach ($_FILES['lampiran_prodi']['name'] as $up_filename) {

                        $nama = $_FILES['lampiran_prodi']['name'][$i];
                        
                        if ($nama == NULL){
                          break;
                        }else{
                         move_uploaded_file($_FILES['lampiran_prodi']['tmp_name'][$i],'./File/'.$folder.'/'.$nama);
                         $i++;
                       } 
                     }
                     $nama = implode('//',$_FILES['lampiran_prodi']['name']);
                     $g = mysqli_query($dbconnect,"UPDATE data_input SET lampiran='$nama' where id_pengusul='$id_pengusul'");
                     if(isset($g)){
                      echo '<div class="note note-success">Lampiran berhasil diunggah. Silahkan tunggu hasil evaluasi.</div>';

                      $cekL = mysqli_query($dbconnect,"SELECT status_lampiran FROM data_evaluasi WHERE id_pengusul=$id_pengusul");
                      $hasilcekL = mysqli_fetch_assoc($cekL);
                      if ($hasilcekL['status_lampiran'] == 'proses') {
                        $quer2 = mysqli_query($dbconnect,"INSERT INTO rekap_status VALUES ('$id_pengusul', now(), 'Unggah ulang lampiran')");
                      }else{
                        $quer2 = mysqli_query($dbconnect,"INSERT INTO rekap_status VALUES ('$id_pengusul', now(), 'Unggah lampiran')");
                      }
                      //mengubah status menjadi selesai unggah
                      $query1 = mysqli_query($dbconnect,"UPDATE data_evaluasi SET status_lampiran='selesai' WHERE id_pengusul='$id_pengusul'");
                    }



                  }
                  ?>
                  <form enctype="multipart/form-data" action="" method="post" id="lampiran">
                    <div>
                      <h5>Unggah Lampiran</h5>
                      <input type="file" name="lampiran_prodi[]" multiple="multiple" id="fileL">
                      <p id="noteL" class="help-block" style="float: left;">Silahkan unggah semua lampiran dalam sekali submit. Maksimum 20 MB.</p>
                    </div>

                    <?php

                    $cekStatusP = mysqli_query($dbconnect, "SELECT status_proposal FROM data_evaluasi WHERE id_pengusul= '$id_pengusul'");
                    $hCekStatusP = mysqli_fetch_assoc($cekStatusP);

                    if($hCekStatusP['status_proposal'] != NULL ){
                      $cekStatus = mysqli_query($dbconnect, "SELECT status_lampiran FROM data_evaluasi WHERE id_pengusul= '$id_pengusul'");
                      $hCekStatus = mysqli_fetch_assoc($cekStatus);
                      if ($hCekStatus['status_lampiran'] == NULL || $hCekStatus['status_lampiran'] == 'proses') {
                        echo ' <div class="col-md-12" style="margin-top: 20px; padding: 0px;">
                        <input type="submit" name="submitL" id="submitL" class="btn btn-primary pull-left" style="margin-right: 20px;" value="Submit">

                        </div>';

                      }else{
                        echo '
                        <div class="col-md-12" style="margin-top: 20px; padding: 0px;">
                        <input type="submit" name="submitL" class="btn btn-primary pull-left" style="margin-right: 20px;" value="Submit" disabled>
                        </div>';
                      }
                    }else{
                      echo '
                      <div class="col-md-12" style="margin-top: 20px; padding: 0px;">
                      <input type="submit" name="submitL" class="btn btn-primary pull-left" style="margin-right: 20px;" value="Submit" disabled>
                      </div>
                      <br>
                      <p>*Silahkan unggah proposal terlebih dahulu</p>';
                    }
                    ?>
                  </form>
                </div>
              </div>

              <div class="row" style="margin: 10px;padding-bottom: 15px;">
                <div class="col-md-12">
                  <div class="portlet light bordered">
                    <div class="portlet-title">
                      <div class="caption">
                        <i class="icon-social-dribbble font-green hide"></i>
                        <span class="caption-subjec bold uppercase" style="color: #6b3e0d;">File Anda</span>
                      </div>
                    </div>
                    <div class="portlet-body">

                      <?php
                      $qq = mysqli_query($dbconnect, "SELECT * FROM data_input WHERE id_pengusul='$id_pengusul'");
                      $dataa = mysqli_fetch_assoc($qq);
                      if ($dataa['proposal'] != NULL) {


                        $folder = $dataa['id_pengusul']."-".$dataa['jenjang']."-".$dataa['nama'];
                        echo '
                        <h5><b>Proposal</b></h5>
                        <p><a href="File/'.$folder.'/'.$dataa['proposal'].'" download><img src="../img/d.png" width="1%;">  Download Proposal</a></p>';

                        if ($dataa['lampiran'] != NULL) {
                          echo '
                          <hr>     
                          <h5><b>Lampiran</b></h5>';
                          $qq = mysqli_query($dbconnect, "SELECT * FROM data_input WHERE id_pengusul='$id_pengusul'");

                          $qqk = mysqli_query($dbconnect, "SELECT * FROM lampiran_pengusul WHERE id_pengusul='$id_pengusul'");

                          $a = explode("//", $dataa['lampiran']);
                          for($z = 0; $z < count($a); $z++){
                            $folder = $dataa['id_pengusul']."-".$dataa['jenjang']."-".$dataa['nama'];
                            echo '
                            <p><a href="File/'.$folder.'/'.$a[$z].'" download><img src="../img/d.png" width="1%;">'.$a[$z].'</a></p>';
                          } 
                        }
                      }
                      ?>


                    </div>
                  </div>
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