<?php
require_once("config.php");

if($_POST['getDetail']) {

	$year = $_POST['getDetail'];
	
	$sql = mysqli_query($dbconnect, "SELECT * from data_input where year(tanggal)='$year'");
	
	$no = 1;
	while ($row = mysqli_fetch_array($sql)) {
		echo '
		<tr>
		<td>'.$no.'</td>
		<td>'.date("d-m-Y", strtotime($row['tanggal'])).'</td>
		<td>'.$row['jenjang'].'</td>
		<td>'.$row['nama'].'</td>
		</tr>
		';
		$no++;
	}
}

?>