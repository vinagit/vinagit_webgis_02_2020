<?php    
    //Khai bao connecttion
    define("PG_DB","thuadat");
    define("PG_HOST","localhost");
    define("PG_USER","postgres");
    define("PG_PORT","5432");
    define("PG_PASS","05051995a");
    $dbcon=pg_connect("dbname=".PG_DB." user=".PG_USER." password=".PG_PASS." host=".PG_HOST." port=".PG_PORT);

    $sothua=$_GET['sothua'];
    $soto=$_GET['soto'];
    
    //Cach 1
    /* if($sothua!='' && $soto!=''){
        $sql="SELECT diachi,sohieuto,sohieuthua,dientich,loaidat, ST_AsGeoJSON( ST_Transform(geom,4326))::json as geom from thuadat where sohieuto = ".$soto." AND sohieuthua = ".$sothua."";
    }elseif($sothua!='' && $soto==''){
        $sql="SELECT diachi,sohieuto,sohieuthua,dientich,loaidat, ST_AsGeoJSON( ST_Transform(geom,4326))::json as geom from thuadat where sohieuto = ".$soto;
    }else{
        $sql="SELECT diachi,sohieuto,sohieuthua,dientich,loaidat, ST_AsGeoJSON( ST_Transform(geom,4326))::json as geom from thuadat where sohieuthua = ".$sothua;
    } */

    //Cach 2
    $where='1=1';
    if($soto!=''){
        $where.=" AND sohieuto = ".$soto;
    }
    if($sothua!=''){
        $where.=" AND sohieuthua = ".$sothua;
    }

    $sql="SELECT diachi,sohieuto,sohieuthua,dientich,loaidat, ST_AsGeoJSON( ST_Transform(geom,4326))::json as geom from thuadat where ".$where;

    //echo $sql;
    
    
    //Thuc thi cau truy van
    $query=pg_query($dbcon,$sql);

    $i=pg_num_rows($query)-1;
    
	$array=array();
    //Lay du lieu
    while($kq=pg_fetch_assoc($query)){  
		$array[$i]=$kq;
		$i--;
    }

    $myJSON = json_encode($array);
    echo $myJSON;
	
?>