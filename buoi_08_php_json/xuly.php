<?php    
    
    //Khai bao connecttion
    define("PG_DB","quanly_hocsinh");
    define("PG_HOST","localhost");
    define("PG_USER","postgres");
    define("PG_PORT","5433");
    define("PG_PASS","2679191");
    $dbcon=pg_connect("dbname=".PG_DB." user=".PG_USER." password=".PG_PASS." host=".PG_HOST." port=".PG_PORT);


    //$txt_ten='AB';

    $txt_ten=$_GET['txt_ten'];

    //echo $txt_ten;

    //Tao cau truy van
    //$sql="SELECT * FROM hocsinh WHERE ten ILIKE '%nguyễn văn%'";

    $sql="SELECT * FROM ds_hocsinh WHERE ten ILIKE '%".$txt_ten."%'";
    
    //$sql="SELECT * FROM \"ds_hocsinh\"";
    
    //Thuc thi cau truy van
    $query=pg_query($dbcon,$sql);

    //Lay du lieu
    while($kq=pg_fetch_assoc($query)){
        echo '<b>'.$kq['ten'].'</b>';
        echo ' | ';
        echo $kq['tuoi'];
        echo '<hr>';
    }

    /* $array=array();
    $i=pg_num_rows($query)-1;
	while($r_tmp=pg_fetch_assoc($query))
	{
		$array[$i]=$r_tmp;
		$i--;
	}

    $myJSON = json_encode($array);

    echo $myJSON; */
?>