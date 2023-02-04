<?php
include('backend/condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//สร้างตัวแปรเก็บค่าที่รับมาจากฟอร์ม
$m_user = $_REQUEST["m_user"];
$m_pass = $_REQUEST["m_pass"];
$m_name = $_REQUEST["m_name"];


$check = " SELECT  m_user FROM m_member
WHERE m_user = '$m_user' ";
$result1 = mysqli_query($con, $check) or die(mysqli_error());
$num=mysqli_num_rows($result1);

$check2 = " SELECT  m_pass FROM m_member
WHERE m_pass = '$m_pass' ";
$result2 = mysqli_query($con, $check2) or die(mysqli_error());
$num2=mysqli_num_rows($result2);

$check3 = " SELECT  m_name FROM m_member
WHERE m_name = '$m_name' ";
$result3 = mysqli_query($con, $check3) or die(mysqli_error());
$num3=mysqli_num_rows($result3);

if($num > 0){
    echo "<script>";
    echo "alert(' ข้อมูลซ้ำ กรุณาเพิ่มใหม่อีกครั้ง !');";
    echo "window.history.back();";
    echo "</script>";
}elseif($num2 > 0){
    echo "<script>";
    echo "alert(' ข้อมูลซ้ำ กรุณาเพิ่มใหม่อีกครั้ง !');";
    echo "window.history.back();";
    echo "</script>";
}elseif($num3 > 0){
    echo "<script>";
    echo "alert(' ข้อมูลซ้ำ กรุณาเพิ่มใหม่อีกครั้ง !');";
    echo "window.history.back();";
    echo "</script>";
}else {
//เพิ่มเข้าไปในฐานข้อมูล
    $sql = "INSERT INTO m_member(m_user, m_pass, m_name)
       VALUES('$m_user', '$m_pass', '$m_name')";
    echo ($sql);
    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());

//ปิดการเชื่อมต่อ database
    mysqli_close($con);
//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
}
if($result){
    echo "<script type='text/javascript'>";
    echo "alert('สมัครสมาชิกสำเร็จ');";
    echo "window.location = 'index1.php?act=login'; ";
    echo "</script>";
}
else{
    echo "<script type='text/javascript'>";
    echo "alert('สมัครสมาชิกผิดพลาด');";
    echo "</script>";
}
?>