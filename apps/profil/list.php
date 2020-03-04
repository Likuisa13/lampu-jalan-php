 <div id="page-inner">
   <h2><i class="fa fa-user"></i> Profil</h2>
 </div>
 <br>
 <div id="page-inner">
   <div class="row">
    <div class="col-md-2">
     <?php if (empty($datauser['foto'])): ?>
      <img src="upload/img-user/user.png" alt="" class="img-thumbnail gambar">
      <?php else: ?>
       <img src="upload/img-user/<?= $datauser['foto'] ?>" alt="" class="img-thumbnail gambar">
     <?php endif ?>
   </div>
   <div class="col-md-10">
    <table class="table-hover table table-striped">
     <tr>
      <td width="16%"><b>Nama Lengkap</b></td>
      <td width="6%">:</td>
      <td><?= $datauser['nama'] ?></td>
    </tr>
    <tr>
      <td><b>Username</b></td>
      <td>:</td>
      <td><?= $datauser['username'] ?></td>
    </tr>
    <tr>
      <td><b>Jenis Kelamin</b></td>
      <td>:</td>
      <td><?= $datauser['jk'] ?></td>
    </tr>
    <tr>
      <td><b>Alamat</b></td>
      <td>:</td>
      <td><?= $datauser['alamat'] ?></td>
    </tr>
  </table>
</div> 
</div>
<hr>
<a href="#" class="btnubahprofil btn btn-warning" style="background: linear-gradient(to bottom, #3eac47 0%, #54d44e 100%); border-color: #3eac47;"><i class="fa fa-edit"></i> Ubah Profil</a>
<div class="modal fade" id="modalubahprofil" style="margin-top: 70px;">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header text-center">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 class="modal-title"><i class="fa fa-user"></i> Ubah Profil</h3>
    <br>
    <p>Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun.</p>
  </div>
  <div class="modal-body">
    <form method="post" enctype="multipart/form-data">
     <div class="row">
      <input type="hidden" name="id_user" value="<?php echo $datauser['id_user'] ?>">
      <div class="form-group col-md-6">
       <label for="">Nama Lengkap</label>
       <input type="text" class="form-control" name="nama" value="<?php echo $datauser['nama'] ?>" required="">
     </div>
     <div class="form-group col-md-6">
       <label for="">Username</label>
       <input type="text" class="form-control" name="username" value="<?php echo $datauser['username'] ?>" readonly>
     </div>
     <div class="form-group col-md-6">
       <label for="">Jenis Kelamin</label>
       <select name="jk" id="" class="form-control">
        <option value="Laki-Laki" <?php if ($datauser['jk']=="Laki-Laki") {echo "selected";} ?>>Laki-Laki</option>
        <option value="Perempuan" <?php if ($datauser['jk']=="Perempuan") {echo "selected";} ?>>Perempuan</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <div class="row">
       <div class="col-md-3">
        <?php if (empty($datauser['foto'])): ?>
         <img src="upload/img-user/user.png" alt="">
         <?php else: ?>
          <img width="55" src="upload/img-user/<?php echo $datauser['foto'] ?>" alt="">
        <?php endif ?>
      </div>
      <div class="col-md-9">
       <label for="">Foto</label>
       <input type="file" class="form-control" name="foto">
     </div>
   </div>
 </div>
 <div class="form-group col-md-12">
   <label for="">Alamat</label>
   <textarea name="alamat" id="" class="form-control"><?= $datauser['alamat'] ?></textarea>
 </div>
</div>

<div class="modal-footer">
  <center>
   <button style="background: linear-gradient(to bottom, #3eac47 0%, #54d44e 100%); border-color: #40b149;" class="btn btn-success" name="ubah"><i class="fa fa-download"></i> Simpan</button>
   <button type="button" class="btn btn-default" data-dismiss="modal" style="border-color: #3eac47;">Close</button>
 </center>
</div>
</form>
<?php 
if (isset($_POST["ubah"])) 
{
  $user->ubah($_POST["id_user"],$_POST["nama"],$_POST["username"],$_POST["jk"],$_FILES["foto"],$_POST["alamat"]);
  echo "<script>alert('Profil berhasil diubah!')</script>";
  echo "<script>location='index.php?halaman=profil';</script>";
}
?>
</div>
</div>
</div>
</div>
</div>
