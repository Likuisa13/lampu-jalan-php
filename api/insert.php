<?php 
include '../config/class.php';

if (isset($_POST)) {
	$mode = $_POST['mode'];
	$lampu_1 = $_POST['lampu_1'];
	$lampu_2 = $_POST['lampu_2'];
	$lampu_3 = $_POST['lampu_3'];

	$query = "INSERT INTO `riwayat`(`mode`, `lampu_1`, `lampu_2`, `lampu_3`) VALUES ('$mode','$lampu_1','$lampu_2','$lampu_3')";
	$lampu->execute($query);
	$status = array($lampu_1,$lampu_2,$lampu_3);
	$lampu->ubahStatus($status);
}

 ?>