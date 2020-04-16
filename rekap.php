<?php
session_start();
include("config.php");

?>

<!DOCTYPE html>
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <?php include('./include/head.php');?>

    <script type="text/javascript">
        function lihat(year) {
            $.ajax({
              type : 'post',
              url : 'detail.php',
              data :  'getDetail='+ year,
              success : function(data){
                $('.modal-data').html(data);
            }
        });
        }
    </script>
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
                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
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
                                <span>Rekap Pengusulan Pembukaan Program Studi</span>
                            </li>
                        </ul>
                    </div>

                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-6" style="margin-left: 25%;">
                            <!-- BEGIN Portlet PORTLET-->
                            <div class="portlet box yellow">
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
                                      $k = mysqli_query($dbconnect, "SELECT DISTINCT year(tanggal) FROM data_input");

                                      while ($hasil = mysqli_fetch_array($k)) {
                                        $year = $hasil['year(tanggal)'];
                                        $l = mysqli_query($dbconnect, "SELECT count(*) jumlah FROM data_input where year(tanggal) = '$year'");
                                        $hasilL = mysqli_fetch_assoc($l);
                                        echo '<td>'.$year.'</td>';
                                        echo '<td><a data-toggle="modal" data-target="#show" data-id="'.$year.'" onclick="lihat('.$year.')">'.$hasilL['jumlah'].'</a></td>';

                                    }
                                    ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END Portlet PORTLET-->
        </div>
    </div>

    <!-- modal -->
    <div class="modal fade" id="show" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn btn-close pull-right" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>Detail Informasi</b></h4>
        </div>
        <div class="modal-body">
            <table class="table table-striped table-bordered table-advance table-hover">
              <thead>
                <tr>
                  <th>No. </th>
                  <th>Tanggal Diusulkan</th>
                  <th>Jenjang</th>
                  <th>Nama Program Studi</th>
              </tr>
          </thead>
          <tbody class="modal-data">
          </tbody>
      </table>
  </div>
</div>
</div>
</div>
<!-- END DASHBOARD STATS 1-->
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