<?php

session_start();

if ( !isset($_SESSION['email']) || ( isset($_SESSION['email']) && $_SESSION['level_user'] != 'admin' ) ) {
	header('location:./../signin.php');
	exit();
}


// if(isset($_GET['tambah_viewer'])){
//     include('../config.php');
//     $tambah_nip = $_GET['tambah_nip'];
//     $tambah_password = $_GET['tambah_password'];

    // $cek = "SELECT nip_user from user";
    // $cek_nip = mysqli_query($dbconnect,$cek);
    // while ($cek_nip) {
    //     if($cek_nip == $tambah_nip){
    //         $tes = "udah ada";
    //     }
    // }

    // $query= "INSERT INTO user VALUES (NULL, '$tambah_nip', '$tambah_nip', '$tambah_password', 'viewer')";
    // $tambahViewer = mysqli_query($dbconnect,$query);

  //   if($result){
  //     echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Karyawan Berhasil Disimpan.</div>';
  // }else{
  //   echo "gagal";
  // }

?>

<!-- <h2>Hallo Admin <?=$_SESSION['nama'];?> Apakabar ?</h2>
    <a href="./../logout.php">Logout</a> -->

    <!doctype html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Halaman Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-icon.png">
        <link rel="shortcut icon" href="favicon.ico">

        <link rel="stylesheet" href="assets/css/normalize.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/themify-icons.css">
        <link rel="stylesheet" href="assets/css/flag-icon.min.css">
        <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
        <link rel="stylesheet" href="assets/css/bootstrap-select.less">
        <link rel="stylesheet" href="assets/scss/style.css">
        <!-- <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet"> -->

        <!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'> -->

        <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

    </head>
    <body>


        <!-- Left Panel -->

        <aside id="left-panel" class="left-panel">
            <?php
                include('nav.php');
            ?>
                </aside><!-- /#left-panel -->

                <!-- Left Panel -->

                <!-- Right Panel -->

                <div id="right-panel" class="right-panel">

                    <!-- Header-->
                    <header id="header" class="header">

                        <div class="header-menu">

                            <div class="col-sm-7">
                                <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                                <div class="header-left">

                                    <div class="dropdown for-notification">
                                      <!-- <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-bell"></i>
                                        <span class="count bg-danger">5</span>
                                    </button> -->
                                    <div class="dropdown-menu" aria-labelledby="notification">
                                        <p class="red">You have 3 Notification</p>
                                        <a class="dropdown-item media bg-flat-color-1" href="#">
                                            <i class="fa fa-check"></i>
                                            <p>Server #1 overloaded.</p>
                                        </a>
                                        <a class="dropdown-item media bg-flat-color-4" href="#">
                                            <i class="fa fa-info"></i>
                                            <p>Server #2 overloaded.</p>
                                        </a>
                                        <a class="dropdown-item media bg-flat-color-5" href="#">
                                            <i class="fa fa-warning"></i>
                                            <p>Server #3 overloaded.</p>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-5">
                            <div class="user-area dropdown float-right">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                                </a>

                                <div class="user-menu dropdown-menu">


                                    <a class="nav-link" href="../logout.php"><i class="fa fa-power -off"></i>Logout</a>
                                </div>
                            </div>

                        </div>
                    </div>

                </header><!-- /header -->
                <!-- Header-->
                <style type="text/css">
                    .kotak{
                        background-color: #c6d6ef;
                        padding: 30px;
                        text-align: center;
                        margin-top: 50px;
                        height: 100%;
                        border-radius: 5px;
                    }
                    a{
                        color: black;
                    }
                    a:hover{
                        color: white;
                    }
                </style>
                <div class="container">
                    <h3 class="text-center">Selamat Datang di Halaman Admin!</h3>
                    <div class="col-md-4">
                        <div class="kotak">
                            <b><a href="reviewer.php">Tentukan Reviewer</a></b>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="kotak">
                            <b><a href="evaluator.php">Tambah Evaluator</a></b>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="kotak">
                            <b><a href="file.php">Lampiran</a></b>
                        </div>
                    </div>
                </div>

</div> <!-- .content -->
</div><!-- /#right-panel -->

<!-- Right Panel -->

<script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>
