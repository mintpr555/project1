<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>จำหน่าย Netflix ออนไลน์</title>

    <head>

<body>
<?php include('h.php');?>
<div class="container">

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="r1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="r2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="r3.png" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

    <?php include('navbar1.php');?>
    <br>
    
    
    <div class="col-md-12" >
    <?php

        $act = (isset($_GET['act']) ? $_GET['act'] : '');
        if($act == 'a2'){
            include('a2.php');
        }elseif($act == 'a3'){
            include('a3.php');
        }elseif($act == 'login'){
          include('form_login.php');
        }elseif($act == 'add'){
          include('form_add.php');
        }elseif($act == 'contact1'){
            include('contact1.php');
        }else {
            include('shop_product1.php');
        }
        ?>
        

       
    </div>
    <br>


</div>

</body>
</html>
<?php

