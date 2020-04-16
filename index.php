<?php

session_start();



if ( isset($_SESSION['level_user']) && $_SESSION['level_user'] != '' ) {

    $halaman = $_SESSION['level_user'];



    header('location:on-'. $halaman);

    exit();

} else {

    header('location:login.php');

    exit();

}

?>