<?php
//Khai bao connecttion
include('config.php');

//Tao cau truy van
$sql='SELECT * FROM "vn_tinh" ORDER BY "ten_vi"';

//Thuc thi cau truy van
$dstinhthanh=pg_query($dbcon,$sql);


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
  <h2>Thêm học sinh</h2>
  <form class="form-horizontal" action="xuly.php">
    <div class="form-group">
      <label class="control-label col-sm-2" for="txt_ten">Họ tên:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="txt_ten" placeholder="Nhập tên..." name="txt_ten">
      </div>
    </div>

    <div class="form-group">
    <label class="control-label col-sm-2" for="txt_tuoi">Tuổi:</label>
    <div class="col-sm-10">
        <input type="number" class="form-control" id="txt_tuoi" placeholder="Nhập tuổi..." name="txt_tuoi">
    </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="txt_diachi">Địa chỉ:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="txt_diachi" placeholder="Nhập địa chỉ..." name="txt_diachi">
        </div>
    </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="txt_tinhthanh">Tỉnh thành:</label>
        <div class="col-sm-10">
          <select class="form-control" id="txt_tinhthanh" name="txt_tinhthanh">
              <?php
                while($kq=pg_fetch_assoc($dstinhthanh)){
                  echo '<option value="'.$kq['id'].'">'.$kq['ten_vi'].'</option>';
                }
              ?>
          </select>
        </div>
    </div>

    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-success">Thêm học sinh</button>
        <input type="button" onclick="window.history.back();" value="Quay lại" class="btn btn-default">
      </div>
    </div>
  </form>
</div>

</body>
</html>
