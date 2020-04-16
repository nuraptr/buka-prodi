<?php
session_start();
include("../config.php");

if ( !isset($_SESSION['email']) || ( isset($_SESSION['email']) && $_SESSION['level_user'] != 'evaluator' ) ) {
  header('location:./../signin.php');
  exit();
}




if (isset($_GET['id'])) {
  $id_pengusul = $_GET['id'];
  $q1 = mysqli_query($dbconnect, "SELECT * FROM data_input WHERE id_pengusul='$id_pengusul'");

  $dataa = mysqli_fetch_array($q1);
  $folder = $dataa['id_pengusul']."-".$dataa['jenjang']."-".$dataa['nama'];


  $cekStatuss = mysqli_query($dbconnect, "SELECT status FROM data_input WHERE id_pengusul='$id_pengusul'");
  $hCekStatus = mysqli_fetch_assoc($cekStatuss);

  $d = mysqli_query($dbconnect, "SELECT nip_user FROM user WHERE id_user='$id_pengusul'");
  $hasil = mysqli_fetch_assoc($d);
  $nip_pengusul = $hasil['nip_user'];

}


?>

<?php
if(isset($_POST['zip']))
{
  $q1 = mysqli_query($dbconnect, "SELECT * FROM data_input WHERE id_pengusul='$id_pengusul'");

  $dataa = mysqli_fetch_array($q1);
  $folder = "../on-pengusul/File/".$dataa['id_pengusul']."-".$dataa['jenjang']."-".$dataa['nama'];

  $dir = $folder;
  $zip_file = $folder.'.zip';

// Get real path for our folder
  $rootPath = realpath($dir);

// Initialize archive object
  $zip = new ZipArchive();
  $zip->open($zip_file, ZipArchive::CREATE | ZipArchive::OVERWRITE);

// Create recursive directory iterator
  /** @var SplFileInfo[] $files */
  $files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($rootPath),
    RecursiveIteratorIterator::LEAVES_ONLY
  );

  foreach ($files as $name => $file)
  {
    // Skip directories (they would be added automatically)
    if (!$file->isDir())
    {
        // Get real and relative path for current file
      $filePath = $file->getRealPath();
      $relativePath = substr($filePath, strlen($rootPath) + 1);

        // Add current file to archive
      $zip->addFile($filePath, $relativePath);
    }
  }

// Zip archive will be created only after closing object
  $zip->close();


  header('Content-Description: File Transfer');
  header('Content-Type: application/octet-stream');
  header('Content-Disposition: attachment; filename='.basename($zip_file));
  header('Content-Transfer-Encoding: binary');
  header('Expires: 0');
  header('Cache-Control: must-revalidate');
  header('Pragma: public');
  //header('Content-Length: ' . filesize($zip_file));
  readfile($zip_file);
  //unlink($zip_file);
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
              <div class="col-md-12">
                <?php
                if( isset($komentarSukses)){
                 echo '<div class="note note-warning">Komentar Berhasil ditambahkan.</div>' ;
               }
               ?>
               <div class="portlet light bordered">
                <div class="portlet-title">
                  <div class="caption">
                    <span class="caption-subject font-blue bold uppercase">Data Pengusul</span>
                  </div>
                </div>
                <div class="portlet-body">
                  <table  class="table" >
                    <?php
                    $q = mysqli_query($dbconnect, "SELECT * FROM dosen WHERE nip = '$nip_pengusul'");
                    while ($user = mysqli_fetch_array($q)){
                      echo '
                      <tr>
                      <th>NIP</th>
                      <td>'.$user['nip'].'</td>
                      </tr>
                      <tr>
                      <th>Nama</th>
                      <td>'.$user['nama'].'</td>
                      </tr>
                      <tr>
                      <th>No. HP</th>
                      <td>'.$user['nohp'].'</td>
                      </tr>
                      ';
                    }
                    ?>
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
                    <i class="icon-social-dribbble font-green hide"></i>
                    <span class="caption-subject font-blue bold uppercase">Data Program Studi</span>
                  </div>
                </div>
                <div class="portlet-body">
                  <table class="table">
                   <?php
                   // $dataa = mysqli_fetch_array($q1);

                   echo '
                   <tr>
                   <th>Jenjang</th>
                   <td>'.$dataa['jenjang'].'</td>
                   </tr>
                   <tr>
                   <th>Nama Program Studi</th>
                   <td>'.$dataa['nama'].'</td>
                   </tr>';

                   ?>
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
                  <i class="icon-social-dribbble font-green hide"></i>
                  <span class="caption-subject font-blue bold uppercase">File</span>
                </div>
              </div>
              <div class="portlet-body">
                <div class="help-block">
                  <?php
                  //$qq = mysqli_query($dbconnect, "SELECT * FROM data_input WHERE id_pengusul='$id_pengusul'");
                  //$dataa = mysqli_fetch_assoc($q1);
                  if ($dataa['proposal'] != NULL) {


                    // $folder = $dataa['id_pengusul']."-".$dataa['jenjang']."-".$dataa['nama'];
                    echo '
                    <h5><b>Proposal</b></h5>
                    <p><a href="../on-pengusul/File/'.$folder.'/'.$dataa['proposal'].'" download><img src="../img/d.png" width="1%;">  Download Proposal</a></p>';

                    if ($dataa['lampiran'] != NULL) {
                      echo '
                      <hr>     
                      <h5><b>Lampiran</b></h5>';
                      //$qq = mysqli_query($dbconnect, "SELECT * FROM data_input WHERE id_pengusul='$id_pengusul'");

                      $qqk = mysqli_query($dbconnect, "SELECT * FROM lampiran_pengusul WHERE id_pengusul='$id_pengusul'");

                      $a = explode("//", $dataa['lampiran']);
                      for($z = 0; $z < count($a); $z++){
                        //$folder = $dataa['id_pengusul']."-".$dataa['jenjang']."-".$dataa['nama'];
                        echo '
                        <p><a href="../on-pengusul/File/'.$folder.'/'.$a[$z].'" download><img src="../img/d.png" width="1%;">'.$a[$z].'</a></p>';
                      } 
                    }
                  }
                  ?>

                  <form  method="post" action=""  id="searchform">
                    <input  type="submit" name="zip" class="btn btn-success" value="Unduh dalam bentuk zip">
                  </form> 
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="portlet light bordered"  style="background-color: #f5f5f5; margin: 10px;">
                <div class="portlet-title">
                  <div class="caption">
                    <i class="icon-social-dribbble font-green hide"></i>
                    <span class="caption-subject bold uppercase" style="color: #6b3e0d;">Evaluasi</span>
                  </div>
                </div>
                <div class="portlet-body">
                  <p> Download format evaluasi <a href="../file/HASIL EVALUASI PEMBUKAAN PRODI.docx" download>disini</a>.</p>
                  <hr>
                  <?php
                  if(isset($_POST['submit'])){
                    $q= mysqli_query($dbconnect, "SELECT id_pengusul, jenjang, nama FROM data_input WHERE id_pengusul= '$id_pengusul'");
                    $data_input = mysqli_fetch_assoc($q);
                    $id_pengusul = $data_input['id_pengusul'];
                    $jenjang_prodi = $data_input['jenjang'];
                    $nama_prodi = $data_input['nama'];
                    $folder = $id_pengusul."-".$jenjang_prodi."-".$nama_prodi;

                    $ekstensi_diperbolehkan = 'docx';

                    //Cek null
                    if ($_FILES['hasil_eval']['name'] == ""){
                      echo '';
                    }else{
                      $hasil_eval = $_FILES['hasil_eval']['name'];
                      $x = explode('.', $hasil_eval);
                      $ekstensi = strtolower(end($x));
                      $file_tmp = $_FILES['hasil_eval']['tmp_name'];

                      if($ekstensi == $ekstensi_diperbolehkan){
                        $folder = $id_pengusul."-".$jenjang_prodi."-".$nama_prodi;


                        $query = mysqli_query($dbconnect,"UPDATE data_evaluasi SET hasil_eval = '$hasil_eval' WHERE id_pengusul='$id_pengusul'");
                        if($query){

                          move_uploaded_file($file_tmp, '../on-pengusul/File/'.$folder.'/'.$hasil_eval);
                          echo '<div class="note note-success">Hasil evaluasi berhasil diunggah.</div>';
                        }else{
                          echo '<div class="note note-warning">File gagal diunggah.</div>';
                        }
                      }else{
                        echo '<div class="note note-warning">Ekstensi file tidak diperbolehkan.</div>';
                      }
                    }
                  }
                  ?>

                  <form enctype="multipart/form-data" action="" method="post">
                    <div>
                      <h5>Unggah Hasil Evaluasi</h5>
                      <input type="file" name="hasil_eval">
                    </div>
                    <div style="margin-top: 20px;">
                      <button type="submit" name="submit" class="btn btn-success">Submit</button>
                    </div>
                  </form>
                  <!-- hasil evaluasi -->
                  <?php
                  $e = mysqli_query($dbconnect, "SELECT hasil_eval FROM data_evaluasi WHERE id_pengusul='$id_pengusul'");
                  $datae = mysqli_fetch_assoc($e);
                  if ($datae['hasil_eval'] != NULL) {
                    $folder = $dataa['id_pengusul']."-".$dataa['jenjang']."-".$dataa['nama'];
                    echo '
                    <hr>
                    <h5><b>Hasil Evaluasi</b></h5>
                    <p><a href="../on-pengusul/'.$folder.'/'.$datae['hasil_eval'].'" download><img src="../img/d.png" width="1%;">  '.$datae['hasil_eval'].'</a></p>';
                  }
                  ?>
                  
                </div>
              </div>

              <div style="padding-bottom: 40px;" >
                <div class="col-md-1">
                  <a type="button" href="index.php" class="btn btn-primary">Kembali</a>
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