<?php 
include('config.php');
if(isset($_POST['submit'])){

  $nip_user = $_POST['email'];
  $pass = $_POST['password'];

  $login = mysqli_query($dbconnect, "SELECT * FROM user WHERE nip_user = '$nip_user' AND pass=md5('$pass')");
  $row=mysqli_fetch_array($login);
  if ($row['nip_user'] == $nip_user AND $row['pass'] == md5($pass))
  {
    session_start();
    $_SESSION['id_user'] = $row['id_user'];
                      // $_SESSION['nip_user'] = $row['nip'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['level_user'] = $row['level_user'];

  if( $_SESSION['level_user'] == 'reviewer'){
      header('location:on-reviewer/index.php');
  }else if( $_SESSION['level_user'] == 'admin'){
      header('location:on-admin/index.php');
  }else if( $_SESSION['level_user'] == 'evaluator'){
      header('location:on-evaluator/index.php');
  }
}else{
    header("location:signin.php?msg=failed");
    
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <?php include('./include/head.php');?>

   <script type="text/javascript">
     function lihat(id) {
        /* fungsi AJAX untuk melakukan fetch data */
        $.ajax({
          type : 'post',
          url : 'detail.php',
          /* detail per identifier ditampung pada berkas detail.php yang berada di folder application/view */
          data :  'getDetail='+ id,
          /* memanggil fungsi getDetail dan mengirimkannya */
          success : function(data){
            $('.modal-data').html(data);
            /* menampilkan data dalam bentuk dokumen HTML */
        }
    });
    }
</script>
<style type="text/css">
ul > li a {
  color: white;
}
ul > li a:hover {
  background-color: none;
}
</style>
</head>
<!-- END HEAD -->
<body class="page-header-fixed" style="background-color: white;">
  <div class="page-wrapper" >
    <!-- BEGIN HEADER -->
    <!-- BEGIN LOGO -->
    <!-- <div class="col-md-6">
      <div class="page-logo">
        <a href="index.php">
          <img src="./img/logo.png" style="width: 400px;" class="img-responsive" alt="logo" class="logo-default" /> </a>
        </div>
    </div> -->
    <!-- END HEADER -->
    <!-- BEGIN HEADER & CONTENT DIVIDER -->
    <!-- END HEADER & CONTENT DIVIDER -->
    <!-- BEGIN CONTAINER -->
    <div class="page-container" style="margin-top: 0px;">
        <!-- BEGIN SIDEBAR -->
        <!-- BEGIN SIDEBAR -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->

        <!-- END SIDEBAR -->
        <!-- BEGIN CONTENT -->

        <!-- BEGIN CONTENT BODY -->
        <!-- login -->
        <div class="page content col-md-5" style="background-image:url(img/color.jpg); min-height: 660px;">

            <div  style="margin-top: 180px;">
                <div >
                    <img src="img/img.png" style="width: 100%; align-content: center;">
                </div>
            </div>
        </div>

        <div class="page-content col-md-7">
            <div style="margin: 100px;" class="col-md-9 col-md-offset-2">
                <div class="clearfix"></div>
                <div class="col" style="margin-top: 30px;">
                    <form class="form-signin" action="" method="post">
                      <h3 class="text-center title-login"><b>Login</b></h3>
                      <hr>
                      <?php
                      if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
                        echo '<div class="alert alert-danger alert-dismissable">Email atau Password salah.</div>';
                    }
                    ?>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="email" type="text" class="form-control" name="email" value="" placeholder="Masukkan NIP" required>                          
                    </div><br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="pass" type="password" class="form-control" name="password" placeholder="Password" required>
                    </div><br>

                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary btn-login-submit btn-block m-t-md" value="Login" />
                    </div>

                    <span class='text-center'><a href="#" class="text-sm">Lupa Password?</a></span>
                </form>
            </div>
          <div class="page-footer">
            <div class="page-footer-inner" style="margin-left: 35%;"> 2018 &copy; Universitas Syiah Kuala
            </div>
        </div>
        
    </div>
    
    <!-- END CONTENT BODY -->
    <!-- END CONTENT -->
    <!-- BEGIN QUICK SIDEBAR -->
    <!-- END QUICK SIDEBAR -->

            <!-- <div class="row" style="margin-top: 170px; height: 100%">
              <div class="col-md-9 col-md-offset-1">

                <div class="portlet box green">
                  <div class="portlet-title">
                    <div class="caption">
                      <i class="fa fa-info"></i>  Informasi Status Pengusulan </div>
                    </div>
                    <div class="portlet-body">
                      <div class="table-scrollable">
                        <table class="table table-striped table-hover">
                          <thead>
                            <tr>
                              <th> Tanggal Pengusulan </th>
                              <th> Jumlah </th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <?php
                              $k = mysqli_query($dbconnect, "SELECT DISTINCT tahun FROM data_input");

                              while ($hasil = mysqli_fetch_array($k)) {
                                $year = $hasil['tahun'];
                                $l = mysqli_query($dbconnect, "SELECT count(*) jumlah FROM data_input where tahun = '$year'");
                                $hasilL = mysqli_fetch_assoc($l);
                                echo '<td>'.$year.'</td>';
                                echo '<td>'.$hasilL['jumlah'].'</td>';

                              }
                              ?>
                            </tr>
                            <!-- <tr>
                              <td> Baru </td>
                              <td><a data-toggle='modal' data-target='#show' data-id="baru" onclick="lihat('baru')"> <?php echo $baru['b']; ?></a></td>
                            </tr>
                            <tr>
                              <td> Sedang diproses </td>
                              <td><a data-toggle='modal' data-target='#show' data-id="diproses" onclick="lihat('proses')"> <?php echo $proses['p']; ?></a> </td>
                            </tr>
                            <tr>
                              <td> Diterima </td>
                              <td><a data-toggle='modal' data-target='#show' data-id="diterima" onclick="lihat('diterima')"> <?php echo $terima['d']; ?> </a></td>
                            </tr>
                            <tr>
                              <td> Ditolak </td>
                              <td> <a data-toggle='modal' data-target='#show' data-id="ditolak" onclick="lihat('ditolak')"><?php echo $tolak['t']; ?> </a></td>
                          </tr> -->
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>

</div>






<!-- login -->

<!-- </div> --><!--  container -->

<!-- END DASHBOARD STATS 1-->
</div>



</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<!-- END FOOTER -->
</div>
<!-- BEGIN QUICK NAV -->
<!-- END QUICK NAV -->
        <!--[if lt IE 9]>
<script src="./assets/global/plugins/respond.min.js"></script>
<script src="./assets/global/plugins/excanvas.min.js"></script> 
<script src="./assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="./assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="./assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="./assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="./assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="./assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="./assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="./assets/global/plugins/moment.min.js" type="text/javascript"></script>
<script src="./assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
<script src="./assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
<script src="./assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
<script src="./assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
<script src="./assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
<script src="./assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
<script src="./assets/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
<script src="./assets/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
<script src="./assets/global/plugins/amcharts/amcharts/radar.js" type="text/javascript"></script>
<script src="./assets/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
<script src="./assets/global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>
<script src="./assets/global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>
<script src="./assets/global/plugins/amcharts/ammap/ammap.js" type="text/javascript"></script>
<script src="./assets/global/plugins/amcharts/ammap/maps/js/worldLow.js" type="text/javascript"></script>
<script src="./assets/global/plugins/amcharts/amstockcharts/amstock.js" type="text/javascript"></script>
<script src="./assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="./assets/global/plugins/horizontal-timeline/horizontal-timeline.js" type="text/javascript"></script>
<script src="./assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="./assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="./assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="./assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="./assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="./assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="./assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="./assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="./assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="./assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="./assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="./assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="./assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="./assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="./assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
<script src="./assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
<script src="./assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<script src="./assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
</body>
</html>