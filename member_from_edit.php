<?php
//1. เชื่อมต่อ database:
include('backend/condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$m_id = $_REQUEST["user_id"];


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
<form  name="member" action="member_from_edit_db.php" method="POST" class="form-horizontal">



    <input type="hidden" name="m_id" value="<?php echo $m_id; ?>">
    <br>
    <div class="form-group">
        <div class="col-sm-12" align="left"> ชื่อผู้ใช้(User) :
            <input  name="m_user" type="text" required class="form-control" id="m_user"  value="<?php echo $row["m_user"];?>" placeholder="username" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="3" maxlength="50" />
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-12" align="left"> ชื่อผู้ใช้(Name) :
            <input  name="m_name" type="text" required class="form-control" id="m_name" value="<?php echo $row["m_name"];?>" placeholder="ชื่อ-สกุล" minlength="4" maxlength="50"/>
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-sm-12" align="left">
            รหัสผ่าน(Password) : <br>
            <input  name="m_pass" type="password" required class="form-control" id="m_pass" value="<?php echo $row["m_pass"];?>"  placeholder="password" pattern="^[a-zA-Z0-9]+$" minlength="4" maxlength="15" readonly/>
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-sm-12" align="right">
            <button type="submit" class="btn btn-success" id="btn"> <span class="glyphicon glyphicon-saved"></span> บันทึก  </button>
            <?php
                echo "<td><a href='index.php?act=pass&ID=$row[0]' class='btn btn-warning btn-xs'>แก้ไขรหัสผ่านใหม่</a></td> ";
            ?>
        </div>
        </div>
    </div>
</form>

    </div>
</div>

