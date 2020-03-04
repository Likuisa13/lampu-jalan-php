<?php  
if (isset($_GET['id'])) 
{
	$id_lampu = $_GET['id'];
	$lampu->off($id_lampu);
	$nama = $lampu->detail($id_lampu);
	$namalampu = $nama['lampu'];
}
echo "<script>location='index.php?halaman=pengontrollampu&id=$id_lampu&pesan=off';</script>";
?>