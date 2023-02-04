<?php
//1. เชื่อมต่อ database:
include('backend/condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//2. query ข้อมูลจากตาราง tb_member:
$query = "SELECT d.*,p.p_id,s.s_id FROM d_detail as d 
INNER JOIN p_product as p ON d.p_id=p.p_id
INNER JOIN s_sell  as s ON d.s_id=s.s_id 
ORDER BY d_id asc" or die("Error:" . mysqli_error());

$d_id = $_GET["ID"];
$s_id = $_GET["s_id"];
$p_id = $_GET["p_id"];

//2. query ข้อมูลจากตาราง:
$sql1 = "SELECT d.*,p.p_name,p.p_price FROM d_detail as d 
INNER JOIN p_product as p ON d.p_id=p.p_id
INNER JOIN s_sell  as s ON d.s_id=s.s_id  
WHERE d.d_id = '$d_id' ";


$result2 = mysqli_query($con, $sql1) or die ("Error in query: $sql1 " . mysqli_error());
$row = mysqli_fetch_array($result2);
extract($row);

//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($con, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
?>
<br><br>
<?php //กลับหน้า
echo "<a href=javascript:history.back(1) class=\"btn btn-dark\">ย้อนกลับ</a> <br>";
?>
<br>
<center>
       <h5>
        <?php
        if($s_id==0){

        }else{
            echo"
            รหัสออเดอร์ : <b> $s_id </b> &nbsp;&nbsp;
            ชื่อสินค้า : <b>$p_name</b> &nbsp;&nbsp;
            ราคา : <b>$p_price บาท</b>
            ";
        }
        ?>
        
        </h5>
        <form  name="addproduct" action="#" method="POST" enctype="multipart/form-data"  class="form-horizontal">
            <div class="form-group">
                <div class="col-sm-5">
                    <p align="left">อีเมล์ :</p>
                    <div class="input-group mb-3">
                        <input type="text" id="d_mail" class="form-control" placeholder="อีเมล์" value="<?php echo $d_mail; ?>" readonly>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" onclick="myFunction()">COPY</button>
                     </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-5 " >
                    <p align="left">รหัสผ่าน :</p>
                    <div class="input-group mb-3">
                        <input type="text" id="d_pass" class="form-control" placeholder="รหัสผ่าน" value="<?php echo $d_pass; ?>" readonly>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" onclick="myFunction1()">COPY</button>
                    </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-5">
                <p align="left">โปรไฟล์ :</p>
                    <input type="text"  name="d_proflie" class="form-control" required placeholder="โปรไฟล์" / value="<?php echo $d_proflie; ?>" readonly/>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-5">
                <p align="left">วันหมดอายุ :</p>
                    <input type="text"  name="d_exp" class="form-control" required placeholder="วันหมดอายุ" / value="<?php echo $d_exp; ?>" readonly/>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6" align="right">
                    <input type="hidden" name="d_id" value="<?php echo $d_id; ?>" />
                    <input type="hidden" name="s_id" value="<?php echo $s_id; ?>" /> 
                    <input type="hidden" name="p_id" value="<?php echo $p_id; ?>" />   
                </div>
            </div>
        </form>
</center>
<script>
function myFunction() {
  // Get the text field
  var copyText = document.getElementById("d_mail");

  // Select the text field
  copyText.select();
  copyText.setSelectionRange(0, 99999); // For mobile devices

  // Copy the text inside the text field
  navigator.clipboard.writeText(copyText.value);
  
  // Alert the copied text
  //alert("Copied the text: " + copyText.value);
}
</script>

<script>
function myFunction1() {
  // Get the text field
  var copyText = document.getElementById("d_pass");

  // Select the text field
  copyText.select();
  copyText.setSelectionRange(0, 99999); // For mobile devices

  // Copy the text inside the text field
  navigator.clipboard.writeText(copyText.value);
  
  // Alert the copied text
  //alert("Copied the text: " + copyText.value);
}
</script>