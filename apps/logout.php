<?php  

include '../config/class.php';
if (isset($_SESSION['user'])) 
{
	unset($_SESSION['user']);
}
echo "<script>location='.././';</script>";
?>