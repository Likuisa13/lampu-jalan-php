<?php
include '../config/class.php';
include '../config/fungsi.php';
if (!isset($_SESSION["user"]))
{
  echo "<script>alert('Anda belum login!');</script>";
  echo "<script>location='.././';</script>";
}
else
{
  $data = $_SESSION['user'];
  $id_user  = $data['id_user'];
  
}
$datauser = $user->detail($id_user);
// $datakonfigurasi = $konfigurasi->tampil();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Detra</title>
  <link rel="icon" href="../upload/img-konfigurasi/<?= $datakonfigurasi['logo'] ?>" type="image/x-icon"/>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.5/css/rowReorder.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css
  ">
  <link rel="stylesheet" href="alert/css/sweetalert.css">
  <link href ="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" rel = "stylesheet" crossorigin="anonymous">
</head>
<style>
  .navbar
  {
    background: linear-gradient(to bottom, #3eac47 0%, #54d44e 100%);
  }
  .packing
  {
    display: inline-block;
  }
  .navbar-login
  {
    width: 305px;
    padding: 10px;
    padding-bottom: 0px;
  }

  .navbar-login-session
  {
    padding: 10px;
    padding-bottom: 0px;
    padding-top: 0px;
  }

  .icon-size
  {
    font-size: 87px;
  }
  .navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:focus, .navbar-default .navbar-nav>.open>a:hover
  {
    background: linear-gradient(to bottom, #3eac47 0%, #54d44e 100%);
  }
  .gambar
  {
    width: 100%;
  }
</style>
<body>
  <div id="wrapper">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".sidebar-collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./">
           <p style="font-size: 20px; color: #fff;"><img class="packing" alt="Brand" src="upload/img-konfigurasi/logo2.png" width="30" style="margin-top: -9px;"> MAGELANG</p>
         </a>
       </div>
       <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="" class="dropdown-toggle" data-toggle="dropdown" style="color: #fff;">
            <span class="glyphicon glyphicon-user"></span> 
            <strong style="margin:8px;"><?= $datauser['nama'] ?></strong>
            <span class="glyphicon glyphicon-chevron-down"></span>
          </a>
          <ul class="dropdown-menu">
            <li>
              <div class="navbar-login">
                <div class="row">
                  <div class="col-lg-5">
                   <?php if (empty($datauser['foto'])): ?>
                    <img src="upload/img-user/user.png" alt="" class="img-thumbnail gambar">
                    <?php else: ?>
                      <img src="upload/img-user/<?= $datauser['foto'] ?>" alt="" class="img-thumbnail gambar">
                    <?php endif ?>
                  </div>
                  <div class="col-lg-7">
                    <p class="text-left"><strong><?= $datauser['nama'] ?></strong></p>
                    <p class="text-left">
                      <a href="index.php?halaman=profil" class="btn btn-primary btn-block btn-sm" style="background: linear-gradient(to bottom, #3eac47 0%, #54d44e 100%); border-color: #3eac47;"><i class="fa fa-user"></i> Profil</a>
                    </p>
                    <p class="text-left">
                      <a href="index.php?halaman=ubahpassword" class="btn btn-primary btn-block btn-sm" style="background: linear-gradient(to bottom, #3eac47 0%, #54d44e 100%); border-color: #3eac47;"><i class="fa fa-lock"></i> Ubah Password</a>
                    </p>
                  </div>
                </div>
              </div>
            </li>
            <li class="divider"></li>
            <li>
              <div class="navbar-login navbar-login-session">
                <div class="row">
                  <div class="col-lg-12">
                    <p>
                      <a href="logout" class="btn btn-danger btn-block sign-out" onclick="return confirm('Apakah anda yakin?')"><i class="fa fa-sign-out"></i> Logout</a>
                    </p>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
  <nav class="navbar-default navbar-side">
    <div class="sidebar-collapse">
      <div class="user">
        <?php if (empty($datauser['foto'])): ?>
          <img src="upload/img-user/user.png" alt="" class="img-thumbnail">
          <?php else: ?>
            <img src="upload/img-user/<?= $datauser['foto'] ?>" alt="" class="img-thumbnail">
          <?php endif ?>
          <h3><?= $datauser['nama'] ?></h3>
        </div>
        <ul class="nav" id="main-menu">
          <li><a href="./"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="index.php?halaman=pengontrollampu"><i class="fa fa-lightbulb-o"></i> Pengontrol Lampu</a></li>
          <li><a href="index.php?halaman=riwayat"><i class="fa fa-bar-chart"></i> Riwayat Kontrol</a></li>
          <li><a href="index.php?halaman=instansi"><i class="fa fa-bank"></i> Instansi</a></li>
          <li><a href="logout" class="sign-out" onclick="return confirm('Apakah anda yakin?')"><i class="fa fa-sign-out"></i> Logout</a></li>
        </ul>
      </div>
    </nav>
    <div id="page-wrapper">
      <?php
      if (!isset($_GET['halaman']))
      {
        include 'home.php';
      }
      else
      {
        if ($_GET['halaman']=="pengontrollampu")
        {
          include 'pengontrollampu/list.php';
        }
        elseif ($_GET['halaman']=="riwayat") 
        {
          include 'pengontrollampu/riwayat.php';
        }
        elseif ($_GET['halaman']=="ubahpassword") 
        {
          include 'profil/ubahpassword.php';
        }
        elseif ($_GET['halaman']=="profil") 
        {
          include 'profil/list.php';
        }
        elseif ($_GET['halaman']=="on") 
        {
          include 'pengontrollampu/on.php';
        }
        elseif ($_GET['halaman']=="off") 
        {
          include 'pengontrollampu/off.php';
        }
        elseif ($_GET['halaman']=="status") 
        {
          include 'pengontrollampu/status.php';
        }
        elseif ($_GET['halaman']=="instansi") 
        {
          include 'instansi/list.php';
        }
      }
      ?>
    </div>
  </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src = "https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js" crossorigin="anonymous"></script>
  <script src="js/jquery-chained.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/rowreorder/1.2.5/js/dataTables.rowReorder.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
  <script src="alert/js/sweetalert.min.js"></script>
  <script src="alert/js/qunit-1.18.0.js"></script>
  <script>
    $(window).bind("load resize", function()
    {
      if ($(this).width() < 768)
      {
        $('div.sidebar-collapse').addClass('collapse')
      }
      else
      {
        $('div.sidebar-collapse').removeClass('collapse')
      }
    });
  </script>
  <script>
    $(document).ready(function(){
      $(".tr-tree").each(function(){
        var link     = $(this).children("a").first();
        var submenu  = $(this).children(".tr-tree-menu").first();
        var isActive  = $(this).hasClass("active");

        if (isActive)
        {
          submenu.slideDown();
        }
        link.click(function(e)
        {
          e.preventDefault();
          if (isActive)
          {
            submenu.slideUp();
            isActive=false;
          }
          else
          {
            submenu.slideDown();
            isActive=true;
          }
        })
      })
    })
  </script>
  <script >
    $(document).ready(function() {
      var table = $('#example').DataTable( {
        rowReorder: {
          selector: 'td:nth-child(2)'
        },
        responsive: true
      } );
    } );
  </script>
  <script type="text/javascript">
    $(".alert-up").alert().delay(2000).slideUp('slow');
    $(".alert-password").alert().delay(2000).slideUp('slow');
  </script>
  <script type="text/javascript">
    $(document).ready(function () {
      $(".btnubahprofil").on("click",function (e) {
        e.preventDefault();
        $("#modalubahprofil").modal();
      })
    })
  </script>
  <script>
    $(document).ready(function() {
      $('#data-riwayat').DataTable();
    } );
  </script>
</body>
</html>
