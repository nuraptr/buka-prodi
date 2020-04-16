<?php
session_start();
include("../config.php");

if ( !isset($_SESSION['email']) || ( isset($_SESSION['email']) && $_SESSION['level_user'] != 'reviewer' ) ) {
	header('location:./../signin.php');
	exit();
}

if (isset($_GET['id'])) {
	$id_pengusul = $_GET['id'];
}


?>

<!doctype html>
<html>
<head>

	<?php include('./include/head.php');?>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<style type="text/css">
	th {
		width: 40%;
	}
</style>
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
                <a href="./gantiPass.php" class="nav-link nav-toggle">
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

						<div class="clearfix"></div>
						<!-- END DASHBOARD STATS 1-->

						<div class="row">
							<div class="col-md-6">
								<div style="margin: 10px;">
									<a href="index.php" >
									<i class="fa fa-long-arrow-left"></i>
								Kembali</a>
								</div>
								
								<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<span class="caption-subject font-blue bold uppercase">Riwayat Status</span>
										</div>
									</div>
									<div class="portlet-body">
										<table class="table table-striped table-bordered table-advance table-hover">
											<thead>
												<tr>
													<th width="40%;">Tanggal</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$no = 1;
												$hasil = $dbconnect->query("SELECT * FROM rekap_status where id_pengusul = '$id_pengusul'");
												;
												while ($row = mysqli_fetch_array($hasil)) {
													echo '<tr>
													<td>'.$row['tanggal'].'</a></td>
													<td>'.$row['status'].'</a></td>
													</tr>';

													$no++;
												}
												?>
											</tbody>
										</table>
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
		</body>

		</html>