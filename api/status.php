<?php 
include '../config/class.php';
if (isset($_GET['id_lampu']) && $_GET['id_lampu'] != '0') {
	$id_lampu = $_GET['id_lampu'];
	echo $lampu->cekStatus($id_lampu);
}
else{
	echo $lampu->mode();
}
 ?>
