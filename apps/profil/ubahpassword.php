 <div id="page-inner">
   <h2><i class="fa fa-lock"></i> Ubah Password</h2>
</div>
<br>
<div id="page-inner">
   <div class="alert alert-danger"><strong><i class="fa fa-info-circle"></i> Pemberitahuan!</strong> Mohon untuk tidak memberi tahu password Anda kepada siapa pun.</div>
   <hr>
   <?php  
   if (isset($_POST['ubahpassword'])) 
   {
      $username = $datauser['username'];
      $id_user = $datauser['id_user'];
      $lama = $_POST['lama'];
      $baru = $_POST['baru'];
      $enpass = sha1($baru);
      $konfirmasi = $_POST['konfirmasi'];
      $password_lama = sha1($lama);
      $query = "SELECT * FROM user WHERE username='$username' AND password='$password_lama'";
      $sql = mysqli_query($mysqli,$query);
      $hasil = mysqli_num_rows($sql);
      if ($hasil > 0) 
      {
         if (strlen($baru) >= 8) 
         {
            if ($baru != $konfirmasi) 
            {
               echo "<div class='alert alert-danger alert-password'>Konfirmasi password salah, silahkan masukan konfirmasi password dengan benar.</div>";
            }
            else
            {
               $query = "UPDATE user SET password='$enpass' WHERE id_user='$id_user'";
               $sql = mysqli_query($mysqli,$query);
               if ($sql) 
               {
                  echo "<div class='alert alert-success alert-password'>Password berhasil diubah!</div>";
               }
            }
         }
         else
         {
            echo "<div class='alert alert-danger alert-password'>Password tidak boleh kurang dari 8 karakter.</div>";
         }
      }
      else
      {
         echo "<div class='alert alert-danger alert-password'>Password lama anda salah.</div>";
      }
   }
   ?>
   <form action="" method="post">
      <div class="form-group">
         <label for="">Password Lama</label>
         <input type="text" class="form-control" placeholder="Masukan password lama" name="lama" required="">
      </div>
      <div class="form-group">
         <label for="">Password Baru</label>
         <input type="text" class="form-control" placeholder="Masukan password baru" name="baru" required="">
      </div>
      <div class="form-group">
         <label for="">Konfirmasi Password</label>
         <input type="text" class="form-control" placeholder="Masukan konfirmasi password" name="konfirmasi" required="">
      </div>
      <hr>
      <button class="btn btn-primary" name="ubahpassword" style="background: linear-gradient(to bottom, #3eac47 0%, #54d44e 100%); border-color: #3eac47; "><i class="fa fa-edit"></i> Ubah Password</button>
   </form>
</div>
