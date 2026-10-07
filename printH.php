<?php

$connection=mysql_connect("localhost", "root", getenv('RECEIPT_PRINT_DB_PASSWORD')) or die("Test Connect");
mysql_query("SET NAMES tis620",$connection);

//$dbname_stu = "student_data"; 
$connection_stu=mysql_connect("202.29.57.8","JungRaiMan",getenv('RECEIPT_PRINT_DB_PASSWORD')) or die("Test Connect Student");
mysql_query("SET NAMES tis620",$connection_stu);


		//$sql_stu="select * from student "; //เช็คตาราง
		//$dbquery_stu=mysql_db_query($dbname_stu, $sql_stu);
		//$num_stu = mysql_num_rows($dbquery_stu);
		//$result_stu=mysql_fetch_array($dbquery_stu);
		//echo  " รหัสนักศึกษา : ".$result_stu['id_no']." ชื่อ : ".$result_stu['name']." ที่อยู่ : ".$result_stu['ADDRESS']."  ".$result_stu['Moo']." หมู่ : ".$result_stu['NMoo']." ตำบล : ".$result_stu['TAMBOL']." อำเภอ : ".$result_stu['AMPHUR']." รหัสไปรษณีย์ : ".$result_stu['POSTCODE']."  เบอร์โทร : ".$result_stu['TEL']."<br>";

echo "test";

?>

