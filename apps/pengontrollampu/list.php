<?php  
$datalampu = $lampu->tampil();
?>
<style>
  .switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
  }

  .switch input { 
    opacity: 0;
    width: 0;
    height: 0;
  }

  .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
  }

  .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
  }

  input:checked + .slider {
    background: linear-gradient(to bottom, #3eac47 0%, #54d44e 100%);
  }

  input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
  }

  input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
  }

  /* Rounded sliders */
  .slider.round {
    border-radius: 34px;
  }

  .slider.round:before {
    border-radius: 50%;
  }
</style>
<!-- <style>
.onoffswitch {
  position: relative; 
  width: 90px;
  -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
  margin-left: 55px;
}
.onoffswitch-checkbox {
  display: none;
}
.onoffswitch-label {
  display: block; overflow: hidden; cursor: pointer;
  border: 2px solid #999999; border-radius: 20px;
}
.onoffswitch-inner {
  display: block; width: 200%; margin-left: -100%;
  transition: margin 0.3s ease-in 0s;
}
.onoffswitch-inner:before, .onoffswitch-inner:after {
  display: block; float: left; width: 50%; height: 30px; padding: 0; line-height: 30px;
  font-size: 14px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;
  box-sizing: border-box;
}
.onoffswitch-inner:before {
  content: "ON";
  padding-left: 10px;
  background: linear-gradient(to bottom, #3eac47 0%, #54d44e 100%);
}
.onoffswitch-inner:after {
  content: "OFF";
  padding-right: 10px;
  background-color: #EEEEEE; color: #999999;
  text-align: right;
}
.onoffswitch-switch {
  display: block; width: 18px; margin: 6px;
  background: #FFFFFF;
  position: absolute; top: 0; bottom: 0;
  right: 56px;
  border: 2px solid #999999; border-radius: 20px;
  transition: all 0.3s ease-in 0s; 
}
.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
  margin-left: 0;
}
.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
  right: 0px; 
}
</style> -->
<div id="page-inner">
  <h2><i class="fa fa-lightbulb-o"></i> Pengontrol Lampu</h2>
</div>
<br>


<!-- 
<div id="page-inner">
  <h3 style="margin-top: 5px;"><?= $datakonfigurasi['institusi'] ?></h3>
  <p><?= $datakonfigurasi['alamat'] ?></p>
</div> -->
<div id="page-inner">
  <div class="row">
    <?php if (isset($_GET['id']) && isset($_GET['pesan'])): ?>
    <div class="col-md-12">
      <?php  
      $id_lampu = $_GET['id'];
      $nama = $lampu->detail($id_lampu);
      $namalampu = $nama['lampu'];
      $pesan = $_GET['pesan'];
      ?>
      <?php if ($pesan=="on"): ?>
        <div class="alert alert-success alert-up"><strong><?php echo $namalampu ?> Berhasil dinyalakan!</strong>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php else: ?>
        <div class="alert alert-danger alert-up"><strong><?php echo $namalampu ?> Berhasil dimatikan!</strong>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif ?>
  </div>
<?php endif ?>
<?php foreach ($datalampu as $key => $value): ?>
  <div class="col-md-3">
    <div class="panel panel-default">
      <div class="panel panel-header">
        <div class="text-center">
          <h4>Manual Kontrol</h4>
          <?php if ($value['mode']=='manual'): ?>
          <label class="switch">
            <input type="checkbox" onclick="window.location.href='index.php?halaman=off&id=<?php echo $value['id_lampu'] ?>';" checked>
            <span class="slider round"></span>
          </label>
          <?php endif ?>
          <?php if ($value['mode']=='otomatis'): ?>
          <label class="switch">
            <input type="checkbox" onclick="window.location.href='index.php?halaman=off&id=<?php echo $value['id_lampu'] ?>';">
            <span class="slider round"></span>
          </label>
          <?php endif ?>
        </div>
      </div>
      <div class="panel panel-body">
        <div class="text-center">
          <?php if ($value['status']==0 && $value['mode'] == 'manual'): ?>
            <label class="switch">
              <input type="checkbox" onclick="window.location.href='index.php?halaman=on&id=<?php echo $value['id_lampu'] ?>';">
              <span class="slider round"></span>
            </label>
            <?php elseif($value['status']==1 && $value['mode'] == 'manual'): ?>
              <label class="switch">
                <input type="checkbox" onclick="window.location.href='index.php?halaman=off&id=<?php echo $value['id_lampu'] ?>';" checked>
                <span class="slider round"></span>
              </label>
            <?php endif ?>
          </div>
          <h3 class="text-center"><?= $value['lampu'] ?></h3>
        </div>
      </div>
    </div>
  <?php endforeach ?>
</div>
</div>
