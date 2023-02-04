<?php
include('backend/condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//สร้างตัวแปรเก็บค่าที่รับมาจากฟอร์ม
$m_id = $_REQUEST["user_id"];

$s_date = $_REQUEST["s_date"];
$s_qty = $_REQUEST["s_qty"];
$s_status = $_REQUEST["s_status"];
$m_id = $_REQUEST["m_id"];
$p_id = $_REQUEST["p_id"];

//เพิ่มเข้าไปในฐานข้อมูล
    $sql2 = "SELECT s.*,m.m_name,p.p_name,p.p_price FROM s_sell as s 
    INNER JOIN m_member  as m ON s.m_id=m.m_id 
    INNER JOIN p_product as p ON s.p_id=p.p_id 
    WHERE m.m_id = $m_id
    ORDER BY s.s_id DESC";
    $sql = "INSERT INTO s_sell(s_date, s_qty, s_status, p_id ,m_id)
       VALUES('$s_date', '$s_qty', '$s_status','$p_id', '$m_id')";
    
    echo ($sql);
    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());

//ปิดการเชื่อมต่อ database
    mysqli_close($con);
//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

if($result){
    echo "<script type='text/javascript'>";
    echo "alert('สั่งซื้อสินค้าสำเร็จ');";
    echo "window.location = 'index.php'; ";
    echo "</script>";
}
else{
    echo "<script type='text/javascript'>";
    echo "alert('สั่งซื้อสินค้าไม่สำเร็จ');";
    echo "</script>";
}
?>