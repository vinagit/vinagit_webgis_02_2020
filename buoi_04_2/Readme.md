# Note Javascript

* Khai báo biến
* Cấu trúc điều khiển:
    * if...else if...else
    * for(){}
* Khai báo hàm - function

## Làm việc với HTML Form

* Lấy giá trị của form `document.getElementById(id).value`
* Sự kiện kích hoạt hành động: onclick(), onchanged(),..

```sql
INSERT INTO public.hocsinh(
	"ten", tuoi)
	VALUES ('Nguyễn Văn E', 14);

SELECT ten as tentuoi
	FROM hocsinh;
	
SELECT *
	FROM hocsinh
where tuoi>=14;

SELECT *
	FROM hocsinh
where ten like 'Nguyễn Văn%';

SELECT *
	FROM hocsinh
where ten ilike '%văn%';
```
