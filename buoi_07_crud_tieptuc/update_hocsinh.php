<?php
//Khai bao connecttion
include('config.php');

//Tao cau truy van
$sql='SELECT * FROM "vn_tinh" ORDER BY "ten_vi"';

//Thuc thi cau truy van
$dstinhthanh=pg_query($dbcon,$sql);

//Lấy thông tin học sinh
$idhocsinh=$_GET['id'];
$sql='SELECT * FROM "hocsinh" WHERE "id" = \''.$idhocsinh.'\'';
$hocsinh=pg_query($dbcon,$sql);
while($kq=pg_fetch_assoc($hocsinh)){
  $ten=$kq['ten'];
  $tuoi=$kq['tuoi'];
  $diachi=$kq['diachi'];
  $id_vn_tinh=$kq['id_vn_tinh'];
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Sửa thông tin học sinh</h2>
  <form class="form-horizontal" action="xuly.php">
    <div class="form-group">
      <label class="control-label col-sm-2" for="txt_ten">Họ tên:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="txt_ten" placeholder="Nhập tên..." name="txt_ten" value="<?php echo $ten;?>">
        <input type="hidden" value="<?php echo $idhocsinh;?>" name="id" id="id">
      </div>
    </div>

    <div class="form-group">
    <label class="control-label col-sm-2" for="txt_tuoi">Tuổi:</label>
    <div class="col-sm-10">
        <input type="number" class="form-control" id="txt_tuoi" placeholder="Nhập tuổi..." name="txt_tuoi" value="<?php echo $tuoi;?>">
    </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="txt_diachi">Địa chỉ:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="txt_diachi" placeholder="Nhập địa chỉ..." name="txt_diachi" value="<?php echo $diachi;?>">
        </div>
    </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="txt_tinhthanh">Tỉnh thành:</label>
        <div class="col-sm-10">
          <select class="form-control" id="txt_tinhthanh" name="txt_tinhthanh">
          <?php
            while($kq=pg_fetch_assoc($dstinhthanh)){
              if($kq['id']==$id_vn_tinh){
                echo '<option selected value="'.$kq['id'].'">'.$kq['ten_vi'].'</option>';
              }else{
                echo '<option value="'.$kq['id'].'">'.$kq['ten_vi'].'</option>';
              }
              
            }
          ?>
          </select>
        </div>
    </div>

    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-success" name="btn_update">Sửa học sinh</button>
        <input type="button" onclick="window.history.back();" value="Quay lại" class="btn btn-default">
      </div>
    </div>
  </form>
</div>

</body>
</html>
