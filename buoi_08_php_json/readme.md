# PHP - JSON

```php
//Khai bao connecttion
define("PG_DB","quanly_hocsinh");
define("PG_HOST","localhost");
define("PG_USER","postgres");
define("PG_PORT","5435");
define("PG_PASS","******");
$dbcon=pg_connect("dbname=".PG_DB." user=".PG_USER." password=".PG_PASS." host=".PG_HOST." port=".PG_PORT);


//Tao cau truy van
//$sql="SELECT * FROM hocsinh WHERE ten ILIKE '%nguyễn văn%'";

$sql="SELECT * FROM hocsinh WHERE ten ILIKE '%".$txt_ten."%'";

//$sql="SELECT * FROM \"hocsinh\"";

//Thuc thi cau truy van
$query=pg_query($dbcon,$sql);

//Lay du lieu
while($kq=pg_fetch_assoc($query)){
    echo $kq['ten'];
    echo $kq['tuoi'];
    echo '<br>';
}
```

```php
$myJSON = json_encode($arr);
```