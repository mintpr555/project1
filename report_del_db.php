<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
include('backend/condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//สร้างตัวแปรสำหรับรับค่า member_id จากไฟล์แสดงข้อมูล
$s_id = $_REQUEST["ID"];

//ลบข้อมูลออกจาก database ตาม member_id ที่ส่งมา

$sql = "DELETE FROM s_sell WHERE s_id='$s_id' ";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('ยกเลิกการสั่งซื้อสำเร็จ');";
	echo "window.location = 'index.php?act=record&user_id=<?=$user_id;?>'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "alert('ยกเลิกออเดอร์ไม่สำเร็จ!!!');";
	echo "</script>";
}
?>