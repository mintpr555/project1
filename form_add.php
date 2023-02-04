<?php include('h.php');?>
<br>
<center><h2>สมัครสมาชิก</h2></center>

<div class="row">
<div class="col-md-3">
</div>
<div class="col-md-6" style="background-color:#D6EAF8">
<form  name="register" action="form_add_db.php" method="POST" class="form-horizontal" >
    <br>
    <div class="form-group">
        <div class="col-sm-12" >
            <input  name="m_user" type="text" required class="form-control" id="M_User" placeholder="Username" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="3" maxlength="50"  />
        </div>
    </div>
    <div class="col-lg-12"></div>
    <div class="form-group">
        <div class="col-sm-12" align="left">
            <input  name="m_pass" type="password" required class="form-control" id="M_Pass" placeholder="Password" pattern="^[a-zA-Z0-9]+$" minlength="4" maxlength="15" />
        </div>
    </div>
    <div class="col-lg-4"></div>
    <div class="form-group">
        <div class="col-sm-12" align="left">
            <input  name="m_name" type="text" required class="form-control" id="M_Name" placeholder="ชื่อ-สกุล" minlength="4" maxlength="50"/>
        </div>
    </div>
    <div class="col-lg-12"></div>
    <div class="form-group">
        <div class="col-sm-12" align="right">
        <a href=javascript:history.back(1) class="btn btn-secondary">ย้อนกลับ</a>
       
            <button type="submit" class="btn btn-success" id="btn"><span class="glyphicon glyphicon-ok"></span> สมัครสมาชิก  </button>
        </div>
    </div>
</form>
</div>
</div>
