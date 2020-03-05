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
  <h2><i class="fa fa-lightbulb-o"></i> Riwayat Kontrol Lampu</h2>
</div>
<br>
<div id="page-inner">
  <div class="row">
    <table class="table table-striped table-responsive">
      <thead>
        <th>No</th>
        <th>Waktu</th>
        <th>Mode</th>
        <th>Lampu</th>
        <th>Status</th>
      </thead>
      <tbody>
        <?php 
        $data = $lampu->riwayat();
        $no = 1;
        foreach ($data as $value) {
           ?>
        <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $value['waktu'] ?></td>
          <td>
            <?php 
            if ($value['mode'] == 'manual') {
              echo '<button class="btn btn-sm btn-danger disabled">'.strtoupper($value['mode']).'</button>';
            }
            else{
              echo '<button class="btn btn-sm btn-primary disabled">'.strtoupper($value['mode']).'</button>';
            }
            ?>  
          </td>
          <td><?php echo $value['lampu'] ?></td>
          <td>
          <?php
            if($value['status'] == 'OFF'){
              echo '<span style="color: red;font-style: italic"><strong>'.$value['status'].'</strong></span>';
            }
            else{
              echo '<span style="color: blue"><strong>'.$value['status'].'</strong></span>';
            }
          ?>
          </td>
        </tr>
        <?php 
          $no++;
          }
         ?>
      </tbody>
    </table>  
  </div>
</div>
