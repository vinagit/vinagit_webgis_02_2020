<?php
//Khai bao connecttion
include('config.php');

//Them hoc sinh
if(isset($_GET['btn_add'])){
    $txt_ten=$_GET['txt_ten'];
    $txt_tuoi=$_GET['txt_tuoi'];
    $txt_diachi=$_GET['txt_diachi'];
    $txt_tinhthanh=$_GET['txt_tinhthanh'];

    //Tao cau truy van
    $sql='INSERT INTO "hocsinh" ("ten", "tuoi", "diachi", "id_vn_tinh")
    VALUES (\''.$txt_ten.'\', \''.$txt_tuoi.'\', \''.$txt_diachi.'\', \''.$txt_tinhthanh.'\');';

    //Thuc thi cau truy van
    pg_query($dbcon,$sql);

    /* echo 'Thêm học sinh '.$txt_ten.' thành công!';
    echo '<br>';
    echo '<a href="index.php">Quay lại</a>'; */

    header("Location: index.php");
}elseif(isset($_GET['btn_update'])){
    //Update
    $id=$_GET['id'];
    $txt_ten=$_GET['txt_ten'];
    $txt_tuoi=$_GET['txt_tuoi'];
    $txt_diachi=$_GET['txt_diachi'];
    $txt_tinhthanh=$_GET['txt_tinhthanh'];

    $sql="UPDATE hocsinh SET
    ten = '".$txt_ten."',
    tuoi = '".$txt_tuoi."',
    diachi = '".$txt_diachi."',
    id_vn_tinh = '".$txt_tinhthanh."'
    WHERE id = '".$id."';";

    pg_query($dbcon,$sql);

    header("Location: index.php");

}elseif(isset($_GET['act'])){
    //Xóa record
    if($_GET['act']=='del'){
        $id=$_GET['id'];
        $sql="DELETE FROM hocsinh WHERE id = '".$id."';";
        pg_query($dbcon,$sql);
        header("Location: index.php");
    }else {
        echo 'Bạn không được phép truy cập!';
    }
}else{
    echo 'Bạn không được phép truy cập!';
}
?>