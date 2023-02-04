<?php session_start();

?>
<html>
<head><title>เข้าสู่ระบบ</title></head>
<body>
<?php
include('h.php');
?>
<br>
<style type="text/css">
    #btn{
        width:100%;
    }
</style>
<br>

  <div class="container ">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <h3 class="mt-1 mb-5 pb-1">เข้าสู่ระบบ</h3>
                </div>

                <form name="formlogin" action="checklogin.php" method="POST" id="login" class="form-horizontal">
                  
                  <div class="form-outline mb-4">
                    <label class="form-label">Username</label>
                    <input type="text"  name="m_user" class="form-control" required placeholder="ชื่อผู้ใช้" />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" >Password</label>
                    <input type="password" name="m_pass" class="form-control" required placeholder="รหัสผ่าน"/> 
                  </div>

                  <div class="text-center">
                    <button class="btn btn-danger btn-block fa-lg gradient-custom-2 mb-3" type="submit" id="btn">เข้าสู่ระบบ</button>
                  </div>
                </form>

                    <Form  name="formlogin" action="index1.php?act=add" method="POST" id="add" class="form-horizontal">
                        <button type="submit" class="btn btn-primary" id="btn">
                        <span class="glyphicon glyphicon-log-in"> </span> สมัครสมาชิก </button>
                    </Form>
               

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">ระบบขาย Netflix ออนไลน์</h4>
                <img src="rr.gif" class="img-fluid" alt="Responsive image" width="300" >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


