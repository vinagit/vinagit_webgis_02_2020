<?php
//Khai bao connecttion
include('config.php');

if(isset($_GET['txt_ten'])){
    $txt_ten=$_GET['txt_ten'];
    $txt_tuoi=$_GET['txt_tuoi'];
    $txt_diachi=$_GET['txt_diachi'];
    $txt_tinhthanh=$_GET['txt_tinhthanh'];

    //Tao cau truy van
    $sql='INSERT INTO "hocsinh" ("ten", "tuoi", "diachi", "id_vn_tinh")
    VALUES (\''.$txt_ten.'\', \''.$txt_tuoi.'\', \''.$txt_diachi.'\', \''.$txt_tinhthanh.'\');';

    //Thuc thi cau truy van
    pg_query($dbcon,$sql);

    echo 'Thêm học sinh '.$txt_ten.' thành công!';
    echo '<br>';
    echo '<a href="index.php">Quay lại</a>';
}else{
    echo 'Bạn không được phép truy cập!';
}
?>