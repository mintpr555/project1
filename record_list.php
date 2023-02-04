<?php

$m_id = $_REQUEST["user_id"];
//1. เชื่อมต่อ database:
include('backend/condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//2. query ข้อมูลจากตาราง tb_admin:
$query = "SELECT s.*,p.p_name,p.p_price,s.s_date FROM s_sell as s 
INNER JOIN p_product as p ON s.p_id=p.p_id 
INNER JOIN m_member as m ON s.m_id=m.m_id 
WHERE m.m_id = $m_id
ORDER BY s.s_id DESC" or die("Error:" . mysqli_error());

//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($con, $query);
?>



<?php
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
echo ' <table class="table table-hover">';
//หัวข้อตาราง
echo "    <br>        <tr bgcolor='#808080 ' align='center'>
                      <td align='center'>รหัสออเดอร์</td>
                      <td align='center'>ชื่อสินค้า</td>
                      <td align='center'>ราคาสินค้า</td>
                      <td align='center'>สถานะ</td>
                      <td align='center'>หลักฐานชำระเงิน</td>
                      <td align='center'>ดูสินค้า</td>
                      <td align='center'>แจ้งโอนเงิน</td>
                      <td align='center'>ยกเลิกการสั่งซื้อ</td>
                      
                    </tr>";  
while($row = mysqli_fetch_array($result)) {

$date1 = new DateTime($row["s_date"]);
$date2 = new DateTime (date("Y-m-d"));
$day = $date2->diff($date1)->format("%a");

    if ($row["s_status"]==รอชำระเงิน) {
        //แดง
        echo "<tr class='table-danger'>";
    }elseif($row["s_status"]==รอสินค้า){
        //เหลือง
        echo "<tr class='table-warning'>";
    }elseif($day>30 && $row["p_id"]==5){
        //เทา
        echo "<tr class='table-secondary'>";
    }elseif($day>7 && $row["p_id"]==6){
        //เทา
        echo "<tr class='table-secondary'>";
    }else{
        //เขียว
        echo "<tr class='table-success'>";
    }
    echo "<td align='center'>" .$row["s_id"] .  "</td> ";
    echo "<td align='center'>" .$row["p_name"] .  "</td> ";
    echo "<td align='center'>" .$row["p_price"] . " บาท". "</td> ";
    echo "<td align='center'>" .$row["s_status"] .  "</td> ";

    if ($row["s_img"]==0) {
        echo "<td align='center'>" . "<img src='backend/s_img/i.png' width='50'>" . "</td>";
    }else{
        echo "<td align='center'>" . "<img src='backend/s_img/" . $row["s_img"] . "' width='100'>" . "</td>";
    }

   
    //ดูสินค้า
    if($row["s_status"]==รอสินค้า) {
      echo "<td align='center'><a class='btn btn-secondary'>ดูสินค้า</a></td>";
    }elseif($row["s_status"]==การสั่งซื้อเสร็จสิ้น) {
        if($day>30 && $row["p_id"]==5){
        echo "<td align='center'><a class='btn btn-secondary'>ดูสินค้า</a></td> ";
        }elseif($day>7 && $row["p_id"]==6){
        echo "<td align='center'><a class='btn btn-secondary'>ดูสินค้า</a></td> ";
        }else{
            echo "<td align='center'><a href='index.php?act=record1&ID=$row[0]' class='btn btn-primary'>ดูสินค้า</a></td> ";
        }
    }else{
        echo "<td align='center'><a class='btn btn-secondary'>ดูสินค้า</a></td> ";
    }

    if ($row["s_img"]==0) {
    //แจ้งชำระเงิน
        echo "<td align='center'><a href='index.php?act=record2&ID=$row[0]' class='btn btn-warning btn-xs'>แจ้งชำระเงิน</a></td> ";
    }else{
        echo "<td align='center'><a href='index.php?act=record2&ID=$row[0]' class='btn btn-success'>รายละเอียดการสั่งซื้อ</a></td> ";
    }

    if ($row["s_img"]==0) {
    //ลบข้อมูล
    echo "<td align='center'><a href='report_del_db.php?ID=$row[0]' onclick=\"return confirm('ต้องยกเลิกการสั่งซื้อใช่หรือไหม? !!!')\" class='btn btn-danger btn-xs' >ยกเลิก</a></td> ";
    }else{
        echo "<td align='center'><a class='btn btn-secondary'>ยกเลิก</a></td> ";
    }
    echo "</tr>";
}

echo "</table>";
if(mysqli_num_rows($result)<1){
    echo"<br><br><br><center>ไม่พบข้อมูล</center>"; 
}
//5. close connection
mysqli_close($con);
?>
