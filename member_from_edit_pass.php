<?php
//1. เชื่อมต่อ database:
include('backend/condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$m_id = $_REQUEST["user_id"];
$m_id = $_REQUEST["ID"];
//2. query ข้อมูลจากตาราง:
$sql = "SELECT * FROM m_member WHERE m_id='$m_id' ";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);
extract($row);
?>
<?php include('h.php'); ?>

<br><center><h4>แก้ไขข้อมูลส่วนตัว</h4></center>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4" style="background-color:#D6EAF8">
<form  name="member" action="member_from_edit_pass_db.php" method="POST" class="form-horizontal">

    <input type="hidden" name="m_id" value="<?php echo $m_id; ?>">
    <br>
    <div class="form-group">
        <div class="col-sm-12" align="left"> ชื่อผู้ใช้(User) :
            <input  name="m_user" type="text" required class="form-control" id="m_user"  value="<?php echo $row["m_user"];?>" placeholder="username" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="4" maxlength="50" readonly />
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-12" align="left"> ชื่อผู้ใช้(Name) :
            <input  name="m_name" type="text" required class="form-control" id="m_name" value="<?php echo $row["m_name"];?>" placeholder="ชื่อ-สกุล" minlength="4" maxlength="50" readonly/>
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-sm-12" align="left"> รหัสผ่านใหม่(Password) :
            <input type="password" name="m_pass1" class="form-control" minlength="4" required/>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-12" align="left"> ยืนยันรหัสผ่านอีกครั้ง :
            <input type="password" name="m_pass2" class="form-control" minlength="4" required/>
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-sm-12" align="right">
            <button type="submit" class="btn btn-success" id="btn"> <span class="glyphicon glyphicon-saved"></span> บันทึก  </button>
            <a href=javascript:history.back(1) class="btn btn-secondary">ย้อนกลับ</a>
        </div>
        </div>
    </div>
</form>

    </div>
</div>

