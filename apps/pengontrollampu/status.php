<?php  
if (isset($_GET['mode'])) 
{
	$mode = $_GET['mode'];	
	$lampu->status($mode);
}
	echo "<script>location='index.php?halaman=pengontrollampu&&mode=$mode';</script>";
?>