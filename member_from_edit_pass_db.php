<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database:
include('backend/condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
$m_id = $_REQUEST["m_id"];
$m_user = $_REQUEST["m_user"];
$m_pass = $_REQUEST["m_pass"];
$m_name = $_REQUEST["m_name"];
$m_pass1  = $_POST["m_pass1"];
$m_pass2  = $_POST["m_pass2"];

$check2 = " SELECT  m_pass FROM m_member
WHERE m_pass = '$m_pass1' ";
$result2 = mysqli_query($con, $check2) or die(mysqli_error());
$num2=mysqli_num_rows($result2);

//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database
if($m_pass1 != $m_pass2){
    echo "<script type='text/javascript'>";
    echo "alert('password ไม่ตรงกัน กรุณาใส่ใหม่อีกครั้ง ');";
    echo "window.history.back(); ";
    echo "</script>";
}elseif($num2 > 0){
    echo "<script>";
    echo "alert(' ข้อมูลซ้ำ กรุณาเพิ่มใหม่อีกครั้ง !');";
    echo "window.history.back();";
    echo "</script>";
}else{
$sql = "UPDATE m_member SET  
      m_user='$m_user', 
      m_pass='$m_pass1', 
      m_name='$m_name'
      WHERE m_id='$m_id' ";

$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
}
mysqli_close($con); //ปิดการเชื่อมต่อ database

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

if($result){
    echo "<script type='text/javascript'>";
    echo "alert('แก้ไขข้อมูลสำเร็จ!!');";
    echo "window.location = 'index.php'; ";
    echo "</script>";
}
else{
    echo "<script type='text/javascript'>";
    echo "alert('แก้ไขข้อมูลผิดพลาด!!');";
    echo "</script>";
}
?>