
<div id="page-inner">
  <h2><i class="fa fa-home"></i> Home</h2>
</div>
<br>
<?php  
$datalampu = $lampu->tampil();
?>
<div class="row">
 <div class="author-progress-pro-area" style=" margin-bottom: 20px;">
  <div class="container-fluid">
    <div class="row">
      <?php foreach ($datalampu as $key => $value): ?>
       <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <?php if ($value['status']==1): ?>
          <div class="single-skill widget-ov-mg-t-30 shadow-reset" style="background-color: #F7AE09; padding: 12px;">
            <?php else: ?>
             <div class="single-skill widget-ov-mg-t-30 shadow-reset" style="background: linear-gradient(to bottom, #3eac47 0%, #54d44e 100%); padding: 12px;">
             <?php endif ?>
             <div class="row">
              <div class="col-lg-4">
                <i class="fa fa-lightbulb-o fa-5x" style="margin-top: 8px; color: #fff;"></i>
              </div>
              <div class="col-lg-8">
                <div class="progress-circular2" style="margin-top: -8px; color: #fff;">
                  <h2><?= $value['lampu'] ?></h2>
                  <?php if ($value['status']==1): ?>
                    <p style="font-weight: bold;">ON</p>
                    <?php else: ?>
                      <p style="font-weight: bold;">OFF</p>
                    <?php endif ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </div>
</div>

<!-- 
<div id="page-inner">
  <h3 style="margin-top: 5px;"><?= $datakonfigurasi['institusi'] ?></h3>
  <p><?= $datakonfigurasi['alamat'] ?></p>
</div> -->
<div id="page-inner">
  <h3 style="margin-top: 5px;">Selamat Datang <?= $datauser['nama'] ?></h3 style="margin-top: 5px;">
    <p>Anda login sebagai administrator. Anda memiliki akses penuh terhadap sistem.</p>
  </div>
