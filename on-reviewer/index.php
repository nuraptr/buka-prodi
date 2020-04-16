<?php
session_start();
include("../config.php");

if ( !isset($_SESSION['email']) || ( isset($_SESSION['email']) && $_SESSION['level_user'] != 'reviewer' ) ) {
  header('location:./../signin.php');
  exit();
}

if (isset($_POST['status']) ) {
  $idUser = $_POST['id_pengusul'];
  $status = $_POST['status'];

  if($status == 'diterima'){
    $query = mysqli_query($dbconnect, "UPDATE data_input SET status='Diterima' WHERE id_pengusul='$idUser' ");
  }else{
    $query = mysqli_query($dbconnect, "UPDATE data_input SET status='Ditolak' WHERE id_pengusul='$idUser'");
  }
  $quer2 = mysqli_query($dbconnect,"INSERT INTO rekap_status VALUES ('$idUser', now(), 'Selesai')");
}


?>

<!doctype html>
<html>
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
      <div class="collapse navbar-collapse" id="myNavbar" style="padding-bottom: 20px;">
      </div>
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

              <!-- END SIDEBAR TOGGLER BUTTON -->
              <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->

              <li class="nav-item start active open">
                <a href="index.php" class="nav-link nav-toggle">
                  <i class="icon-home" style="color: white;"></i>
                  <span class="title">Beranda</span>
                  <span class="selected"></span>
                </a>
              </li>
              <!-- <li class="nav-item ">
                <a href="./gantiPass.php" class="nav-link nav-toggle" >
                  <i class="glyphicon glyphicon-lock" style="color: white;"></i>
                  <span class="title">Ganti Password</span>
                  
                </a>
              </li> -->
              <li class="nav-item ">
                <a href="../login.php" class="nav-link nav-toggle">
                  <i class="glyphicon glyphicon-log-out" style="color: white;"></i>
                  <span class="title">Logout</span>
                  
                </a>
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
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <!-- BEGIN DASHBOARD STATS 1-->

            <div class="clearfix"></div>
            <!-- END DASHBOARD STATS 1-->
            <div class="row">
              <div class="col-md-12">
               <div class="portlet light bordered">
                <div class="portlet-body">
                  <table  class="table" >
                   <div class="note note-warning">
                     <?php
                     $q = "SELECT count(*) c from data_input where status = 'baru'";
                     $hasil = mysqli_query($dbconnect,$q);

                     $row = mysqli_fetch_assoc($hasil);

                     if( $row['c'] != '0'){
                       echo 'Ada '.$row['c'].' pengusulan baru.' ;
                     }else{
                      echo 'Tidak ada pengusulan baru.' ;
                    }
                    ?>
                  </div>

                  <table class="table table-striped table-bordered table-advance table-hover">
                    <thead>
                      <tr>
                        <th style="text-align: center;">No.</th>
                        <th style="text-align: center;">Tanggal Diusul</th>
                        <th style="text-align: center;">Nama Program Studi</th>
                        <th style="text-align: center;">NIP Pengusul</th>
                        <th style="text-align: center;">Status</th>
                        <th style="text-align: center;">Evaluator</th>
                        <th style="text-align: center;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $hasil = $dbconnect->query("SELECT * FROM data_input WHERE status = 'baru'");

                      $no = 1;
                      while ($row = mysqli_fetch_array($hasil)) {
                        echo '
                        <tr align="center">
                        <td style="text-align:center; " >'.$no.'</td>
                        <td >'.date("d-m-Y", strtotime($row['tanggal'])).'</td>';

                        echo'
                        <td>'.$row['jenjang'].' - '.$row['nama'].'</td>';
                        $idUser =$row['id_pengusul'];
                        $q2 = $dbconnect->query("SELECT nip_user FROM user WHERE id_user ='$idUser'");
                        $user = mysqli_fetch_assoc($q2);
                        echo '
                        <td>'.$user['nip_user'].'</td>
                        <td style="text-align:center;"> <a href="riwayat.php?id='.$row['id_pengusul'].'">Lihat riwayat status</a></td>
                        <td style="text-align:center;">
                        ';
                        $rowId =  $row['id_pengusul'];
                        $ev = $dbconnect->query("SELECT nip_evaluator FROM evaluator WHERE id_pengusul= '$rowId'");
                        while($rowEv = mysqli_fetch_assoc($ev)){
                          if($rowEv['nip_evaluator'] == ""){
                            echo 'Belum ditentukan.';
                          }else{
                            echo $rowEv['nip_evaluator'];
                            echo '<br>';
                          }
                        }
                        echo '
                        <td style="text-align:center;" >
                        <form action="evaluator.php" method="GET">
                        <button type="submit" name="id" value="'.$rowId.'" class="btn btn-circle btn-warning">Tentukan atau Ubah Evaluator</button>
                        </form>
                        <br>
                        <form action="data.php" method="GET">
                        <button type="submit" name="id" value="'.$row['id_pengusul'].'" class="btn btn-circle btn-primary">Tinjau</button>
                        </form>
                        </td>
                        </tr>';
                        $no++;
                      }
                      ?>
                    </tbody>
                  </table>
                </table>
              </div>
            </div>
          </div>
        </div>



        <div class="row">
          <div class="col-md-12">
           <div class="portlet light bordered">
            <div class="portlet-title">
              <div class="caption">
                <span class="caption-subject font-blue bold uppercase">Riwayat Pengusulan</span>
              </div>
            </div>
            <div class="portlet-body">
              <table  class="table" >
               <table class="table table-striped table-bordered table-advance table-hover">
                <thead>
                  <tr>
                    <th style="text-align: center;">No.</th>
                    <th style="text-align: center;">Tanggal Diusul</th>
                    <th style="text-align: center;">Nama Program Studi</th>
                    <th style="text-align: center;">NIP Pengusul</th>
                    <th style="text-align: center;">Status</th>
                    <th style="text-align: center;">Evaluator</th>
                    <th style="text-align: center;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $hasil1 = $dbconnect->query("SELECT * FROM data_input WHERE status = 'Diterima' OR status = 'Ditolak'");

                  $no = 1;
                  while ($row1 = mysqli_fetch_array($hasil1)) {
                    echo '
                    <tr align="justify" >
                    <td style="text-align:center;">'.$no.'</td>
                    <td>'.date("d-m-Y", strtotime($row1['tanggal'])).'</td>';

                    echo'
                    <td>'.$row1['jenjang'].' - '.$row1['nama'].'</td>';
                    $idUser1 =$row1['id_pengusul'];
                    $q2 = $dbconnect->query("SELECT nip_user FROM user WHERE id_user ='$idUser1'");
                    $user = mysqli_fetch_assoc($q2);
                    echo '
                    <td>'.$user['nip_user'].'</td>
                    <td style="text-align:center;"> <a href="riwayat.php?id='.$row1['id_pengusul'].'">Lihat riwayat status</a></td>
                    <td style="text-align:center;">
                    ';
                    $row1Id =  $row1['id_pengusul'];
                    $ev = $dbconnect->query("SELECT nip_evaluator FROM evaluator WHERE id_pengusul= '$row1Id'");
                    while($row1Ev = mysqli_fetch_assoc($ev)){
                      if($row1Ev['nip_evaluator'] == ""){
                        echo 'Belum ditentukan.';
                      }else{
                        echo $row1Ev['nip_evaluator'];
                        echo '<br>';
                      }
                    }
                    echo '
                    <td style="text-align:center;" >
                    <form action="data.php" method="GET">
                    <button type="submit" name="id" value="'.$row1['id_pengusul'].'" class="btn btn-circle btn-success">Tinjau</button>
                    </form>
                    </td>
                    </tr>';
                    $no++;
                  }
                  ?>
                </tbody>
              </table>
            </table>
          </div>
        </div>
      </div>
    </div>





    <!-- Fieldsets -->




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
</body>

</html>