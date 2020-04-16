<?php
session_start();
require_once('./config.php');

$nip = @$_POST['nip'];

$q =mysqli_query($dbconnect,"SELECT nip FROM dosen WHERE nip='$nip'");
$rowcount=mysqli_num_rows($q);

if ($rowcount == 0){
	echo "NIP tidak ditemukan";
}


?>




