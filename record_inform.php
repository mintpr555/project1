<?php
//1. เชื่อมต่อ database:
include('backend/condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$s_id = $_GET["ID"];
//2. query ข้อมูลจากตาราง:
$sql = "SELECT s.*,m.m_name,p.p_name,p.p_price FROM s_sell as s 
INNER JOIN m_member  as m ON s.m_id=m.m_id 
INNER JOIN p_product as p ON s.p_id=p.p_id
WHERE s_id = '$s_id'
ORDER BY m_id asc";
$result2 = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result2);
extract($row);

//2. query ข้อมูลจากตาราง
$query = "SELECT * FROM m_member ORDER BY m_id asc" or die("Error:" . mysqli_error());
$query1 = "SELECT * FROM p_product ORDER BY p_id asc" or die("Error:" . mysqli_error());
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($con, $query, $query1);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
?>
<br>
<?php //กลับหน้า
echo "<a href=javascript:history.back(1) class=\"btn btn-dark\">ย้อนกลับ</a> <br>";
?>

<div class="col-md-12">
    <div class="container" style="margin-top: 20px">
        <div class="row">
            <div class="col-md-5">
        <form  name="addproduct" action="record_inform_db.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">
        <p align="left" style="width: 21rem; margin-top:10px ">รหัสออเดอร์</p>
        <input type="text"  name="s_id" class="form-control" required placeholder="รหัส" / value="<?php echo $s_id; ?>"readonly>
          
        <p align="left" style="width: 21rem; margin-top:10px ">วันที่/เวลา</p>
        <input type="text"  name="s_date" class="form-control" required placeholder="วันที่/เวลา" / value="<?php echo $s_date; ?>"readonly>
           
        <p align="left" style="width: 21rem; margin-top:10px "> ชื่อสินค้า</p>
        <input type="text"  name="p_name" class="form-control" required placeholder="ชื่อสินค้า" / value="<?php echo $p_name; ?>"readonly>
        
        <p align="left" style="width: 21rem; margin-top:10px ">จำนวน</p>
        <input type="text"  name="s_qty" class="form-control" required placeholder="จำนวน" / value="<?php echo $s_qty; ?>"readonly>

        <p align="left" style="width: 21rem; margin-top:10px "> ราคาสินค้า</p>
        <input type="text"  name="p_price" class="form-control" required placeholder="ราคาสินค้า" / value="<?php echo $p_price; ?> บาท"readonly>

        <p align="left" style="width: 21rem; margin-top:10px ">ชื่อสมาชิก</p>
        <input type="text"  name="m_name" class="form-control" required placeholder="ชื่อสมาชิก" / value="<?php echo $m_name; ?>"readonly>

        <p align="left" style="width: 21rem; margin-top:10px ">สถานะสินค้า</p>
        <input type="text"  name="s_status" class="form-control" required placeholder="สถานะ" / value="<?php echo $s_status; ?>"readonly>

    </div>
    <div class="col-md-7">
    <center>
            <?Php
            if ($row["s_img"]==0) {
            echo '<p align="center">QR ชำระเงิน</p>';
            require_once("lib/PromptPayQR.php");
            $PromptPayQR = new PromptPayQR(); // new object
            $PromptPayQR->size = 5; // Set QR code size to 8
            $PromptPayQR->id = '0816898005'; // PromptPay ID
            $PromptPayQR->amount = $p_price; // Set amount (not necessary)
            echo '<img src="' . $PromptPayQR->generate() . '" >';
            }
            ?>
              
            <p align="center">หลักฐานการชำระเงิน</p>
            <?php
            if ($row["s_img"]==0) {
                echo "<td align='center'>" . "<img src='backend/s_img/i.png' width='100'>" . "</td>";
                ?><br><br>
            <div class="form-group">
            <div class="col-sm-6">
            <input type="file" name="s_img" id="s_img" class="form-control" />';
            <br>
            </div>
            </div>
            
            <div class="form-group">
                <div class="col-sm-12">
                    <input type="hidden" name="s_id" value="<?php echo $s_id; ?>" />
                    <input type="hidden" name="img2" value="<?php echo $s_img; ?>" />
                    <div class="col-sm-6" align="right">
                    <button type="submit" class="btn btn-success" name="btnadd"> บันทึก </button>
                    </div>
                </div>
            </div>

            <?php
            }else{
                echo "<td align='center'>" . "<img src='backend/s_img/" . $row["s_img"] . "' width='300'>" . "</td>";
            }
            ?>
            
        </center>
    </div>
    </form>

        </div>
    </div>
</div>
