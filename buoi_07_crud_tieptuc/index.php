<?php
  //Khai bao connecttion
  include('config.php');

  //Tao cau truy van
  $sql='SELECT * FROM "hocsinh" ORDER BY "id"';

  //Thuc thi cau truy van
  $dshocsinh=pg_query($dbcon,$sql);

  //Lay du lieu
  /* while($kq=pg_fetch_assoc($dshocsinh)){
    echo $kq['ten'];
    echo $kq['tuoi'];
    echo '<br>';
  } */


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

  <script>
    function xacnhan_xoa(id) {
      var r = confirm("Bạn muốn xóa không?");
      if (r == true) {
        window.location.href = "xuly.php?id="+id+"&act=del";
      } else {
        //alert('Huy');
      }
    }
  </script>
</head>
<body>

<div class="container">
  <h2>Danh sách học sinh</h2>
  <p><a href="add_hocsinh.php">Thêm học sinh</a></p>

  <form>
      <input type="text" id="txt_keyword" name="txt_keyword" placeholder="Tìm học sinh...">
      <input type="button" value="Tìm kiếm">
  </form>

  <table class="table table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Họ tên</th>
        <th>Tuổi</th>
        <th>Địa chỉ</th>
        <th>Tỉnh thành</th>
        <th>Chức năng</th>
      </tr>
    </thead>
    <tbody>
      <?php
        while($kq=pg_fetch_assoc($dshocsinh)){
          //echo $kq['ten'];
          //echo $kq['tuoi'];
          echo '<tr>
                  <td>'.$kq['id'].'</td>
                  <td>'.$kq['ten'].'</td>
                  <td>'.$kq['tuoi'].'</td>
                  <td>'.$kq['diachi'].'</td>
                  <td>'.$kq['id_vn_tinh'].'</td>
                  <td><a href="update_hocsinh.php?id='.$kq['id'].'">Sửa</a> | <a href="#" onclick="xacnhan_xoa('.$kq['id'].');">Xóa</a></td>
                </tr>';
        }
      ?>      
    </tbody>
  </table>
</div>

</body>
</html>
