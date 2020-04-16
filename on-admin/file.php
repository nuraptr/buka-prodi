<?php

session_start();
include('../config.php');

if ( !isset($_SESSION['email']) || ( isset($_SESSION['email']) && $_SESSION['level_user'] != 'admin' ) ) {
    header('location:./../signin.php');
    exit();
}


// if(isset($_GET['tambah_file'])){
//     include('../config.php');
//     $nama_file = $_GET['file'];

//     $cek = "SELECT nama_file from nama_file";
//     $cek_file = mysqli_query($dbconnect,$cek);
//     while ($cek_file) {
//         if($cek_file == $nama_file){
//             $tes = "udah ada";
//         }
//     }

//     $query= "INSERT INTO nama_file VALUES (NULL, '$nama_file'";
//     $tambahFile = mysqli_query($dbconnect,$query);

//     if($result){
//       echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>File persyaratan berhasil ditambahkan</div>';
//   }else{
//     echo "gagal";
//   }
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

                <!-- lampiran -->
                <div class="container">
                    <?php 
                    if(isset($_POST['tambah_file'])){
                        $extensionList = array("pdf", "zip", "rar");

                        $nama_file = $_POST['nama_file'];
                        
                        $lampiran = $_FILES['lampiran']['name'];
                        $pecah = explode(".", $lampiran);
                        $ekstensi = $pecah[1];

                        $file_tmp = $_FILES['lampiran']['tmp_name'];

                        if ($lampiran == "") {
                            echo '
                            <div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Tidak ada file yang diunggah.</div>';
                        }else{
                            if (in_array($ekstensi, $extensionList)){
                                $uploads_dir = '../file/';
                                move_uploaded_file($file_tmp, $uploads_dir.$lampiran);

                                $query= "INSERT INTO file_lampiran VALUES (NULL, '$nama_file', '$lampiran')";
                                $tambahFile = mysqli_query($dbconnect,$query);
                                if($tambahFile){
                                  echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Nama file berhasil ditambahkan</div>';
                              }
                          }else{
                            echo '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Tipe file tidak diperbolehkan</div>';
                        }
                    }
                }
                ?>
                <div class="row" style="background-color: white; border: 1px solid white;margin: 20px;padding-bottom: 15px;">

                    <h3 class="col-md-12" style="margin: 15px;">Tambah File Lampiran</h3>
                    <hr>
                    <div class="col-md-12">
                        <form action="" method="post" style="margin: 10px;" enctype="multipart/form-data" >
                            <div class="form-group col-md-12">
                                <input class="form-control col-md-6" type="text" name="nama_file" placeholder="Masukkan Nama File"><br>
                                <input type="file" name="lampiran" placeholder="Masukkan Nama File"><br>
                            </div>
                            <br>


                            <!-- <button class="btn btn-primary" type="Submit" name="tambah_viewer" style="margin-top: 30px; border-radius: 5px;">Tambah</button> -->
                            <div class="form-group col-md-4">
                                <input type="submit" name="tambah_file" class="btn btn-primary" value="Tambah" style="border-radius: 5px;"/>
                            </div>
                        </form>
                    </div>
                </div>




                <!-- db -->
                <div class="row" style="background-color: white; border: 1px solid white;margin: 20px;padding-bottom: 15px;">
                  <h3 class="col-md-12" style="margin: 15px;">Daftar File</h3>
                  <div class="col-md-12">
                      <?php
                      $data = mysqli_query($dbconnect,"SELECT nama_file FROM file_lampiran");
                      ;

                      ?>
                      <table class="table">
                        <thead>
                            <th>No.</th>
                            <th>Nama File</th>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            while ($result = mysqli_fetch_assoc($data)) {
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $result['nama_file']; ?></td>
                                </tr>
                                <?php
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <!-- panduan -->
        <div class="container">
            <?php 
            if(isset($_POST['tambah_fileP'])){

                $nama_fileP = $_POST['nama_fileP'];
                $panduan = $_FILES['panduan']['name'];
                $file_tmp = $_FILES['panduan']['tmp_name'];
                if ($panduan == "" || $nama_fileP == "") {
                    echo '
                    <div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Tidak ada file yang diunggah.</div>';
                }else{
                    move_uploaded_file($file_tmp, '../file/'.$panduan);

                    $query= "INSERT INTO panduan VALUES ('$nama_fileP', '$panduan')";
                    $tambahFileP = mysqli_query($dbconnect,$query);
                    if($tambahFileP){
                      echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>File berhasil ditambahkan</div>';
                  }
              }
          }
          ?>
          <div class="row" style="background-color: white; border: 1px solid white;margin: 20px;padding-bottom: 15px;">

            <h3 class="col-md-12" style="margin: 15px;">Tambah File Panduan</h3>
            <hr>
            <div class="col-md-12">
                <form action="" method="post" style="margin: 10px;" enctype="multipart/form-data" >
                    <div class="form-group col-md-12">
                        <input class="form-control col-md-6" type="text" name="nama_fileP" placeholder="Masukkan Nama File"><br>
                        <input type="file" name="panduan" placeholder="Masukkan Nama File"><br>
                    </div>
                    <br>


                    <!-- <button class="btn btn-primary" type="Submit" name="tambah_viewer" style="margin-top: 30px; border-radius: 5px;">Tambah</button> -->
                    <div class="form-group col-md-4">
                        <input type="submit" name="tambah_fileP" class="btn btn-primary" value="Tambah" style="border-radius: 5px;"/>
                    </div>
                </form>
            </div>
        </div>




        <!-- db -->
        <div class="row" style="background-color: white; border: 1px solid white;margin: 20px;padding-bottom: 15px;">
          <h3 class="col-md-12" style="margin: 15px;">Daftar File</h3>
          <div class="col-md-12">
              <?php
              $data = mysqli_query($dbconnect,"SELECT nama_file FROM panduan");
              ;

              ?>
              <table class="table">
                <thead>
                    <th>No.</th>
                    <th>Nama File</th>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    while ($result = mysqli_fetch_assoc($data)) {
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $result['nama_file']; ?></td>
                        </tr>
                        <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
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
