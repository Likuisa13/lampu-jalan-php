<?php  
if (!isset($_SESSION))
{
	session_start();
}
$mysqli = new mysqli("localhost","root","","detra");

class user
{
	public $koneksi;

	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}
	function login($username,$password)
	{
		$username=mysqli_real_escape_string($this->koneksi,$username);
		$password=mysqli_real_escape_string($this->koneksi,$password);
		$enpass=sha1($password);
		$ambil = $this->koneksi->query("SELECT * FROM user WHERE username='$username' AND password='$enpass'");
		$yangcocok = $ambil->num_rows;
		if ($yangcocok==0)
		{
			return "gagal";
		}
		else
		{
			if ($yangcocok==1) 
			{
				$akun=$ambil->fetch_assoc();

				$_SESSION["user"]=$akun;
				return "sukses";
			}
			else
			{
				return "gagal";
			}
		}
	}
	function detail($id_user)
	{
		$ambil = $this->koneksi->query("SELECT * FROM user WHERE id_user='$id_user' ");
		$pecahdata = $ambil->fetch_assoc();
		return $pecahdata;
	}
	function ubah($id_user,$nama,$username,$jk,$foto,$alamat)
	{
		$namagambar=$foto['name'];
		$lokasi=$foto['tmp_name'];
		if ($namagambar!=="") {
			$tgl = date('Ymd');
			$fotofix = $tgl.$namagambar;
			$adminlama=$this->detail($id_user);
			$gambarlama=$adminlama['foto'];
			if (file_exists("upload/img-user/$gambarlama")) {
				unlink("upload/img-user/$gambarlama");
			}
			move_uploaded_file($lokasi, "upload/img-user/$fotofix");
			$this->koneksi->query("UPDATE user SET nama='$nama', username='$username', jk='$jk', alamat='$alamat', foto='$fotofix' WHERE id_user='$id_user'");
		}
		else
		{
			$this->koneksi->query("UPDATE user SET nama='$nama', username='$username', jk='$jk', alamat='$alamat' WHERE id_user='$id_user'");
		}
	}
}

class lampu
{
	public $koneksi;

	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}
	function detail($id_lampu)
	{
		$ambil = $this->koneksi->query("SELECT * FROM lampu WHERE id_lampu='$id_lampu' ");
		$pecahdata = $ambil->fetch_assoc();
		return $pecahdata;
	}
	function tampil()
	{
		$ambil = $this->koneksi->query("SELECT * FROM lampu");
		while ($pecahdata = $ambil->fetch_assoc())
		{
			$semuadata[] = $pecahdata;
		}
		return $semuadata;
	}
	function on($id_lampu)
	{
		$this->koneksi->query("UPDATE lampu SET status=1 WHERE id_lampu='$id_lampu'");
	}
	function off($id_lampu)
	{
		$this->koneksi->query("UPDATE lampu SET status=0 WHERE id_lampu='$id_lampu'");
	}
	function status($mode)
	{
		$this->koneksi->query("UPDATE lampu SET mode='$mode'");
	}
	function mode()
	{
		$mode = $this->koneksi->query("SELECT mode from lampu limit 1");
		$mode = $mode->fetch_array();
		return $mode['mode'];
	}
	function cekStatus($id_lampu)
	{
		$mode = $this->koneksi->query("SELECT status from lampu WHERE id_lampu = '$id_lampu'");
		$mode = $mode->fetch_array();
		return $mode['status'];
	}

	function riwayat()
	{
		return $this->koneksi->query("SELECT * FROM riwayat");
	}

	function view($status)
	{
		if($status == '0'){
			echo '<span style="color: red;font-style: italic"><strong>OFF</strong></span>';
		}
		else{
			echo '<span style="color: blue"><strong>ON</strong></span>';
		}
	}

	function execute($query)
	{
		$this->koneksi->query($query);
	}
}

class instansi
{
	public $koneksi;

	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}
	function login($username,$password)
	{
		$username=mysqli_real_escape_string($this->koneksi,$username);
		$password=mysqli_real_escape_string($this->koneksi,$password);
		$enpass=sha1($password);
		$ambil = $this->koneksi->query("SELECT * FROM user WHERE username='$username' AND password='$enpass'");
		$yangcocok = $ambil->num_rows;
		if ($yangcocok==0)
		{
			return "gagal";
		}
		else
		{
			if ($yangcocok==1) 
			{
				$akun=$ambil->fetch_assoc();

				$_SESSION["user"]=$akun;
				return "sukses";
			}
			else
			{
				return "gagal";
			}
		}
	}
	function detail($id_user)
	{
		$ambil = $this->koneksi->query("SELECT * FROM user WHERE id_user='$id_user' ");
		$pecahdata = $ambil->fetch_assoc();
		return $pecahdata;
	}
}

$user = new user($mysqli);
$lampu = new lampu($mysqli);
$instansi = new instansi($mysqli);

?>