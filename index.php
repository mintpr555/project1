<?php
session_start();

if(isset($_SESSION["user_id"]) ){
  

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

    <?php include('navbar2.php');?>
    <br>
   
    
    <span class="hidden-xs">สวัสดี คุณ <?php echo $_SESSION["m_name"]; ?></span>

        <?php
  

        $act = (isset($_GET['act']) ? $_GET['act'] : '');
        if($act == 'record1') {
            include('record_detail.php');
        }elseif ($act == 'record2'){
            include('record_inform.php');
        }elseif($act == 'del'){
            include('report_del_db.php');
        }elseif($act == 'record'){
            include('record_list.php');
        }elseif($act == 'a1'){
            include('a1.php');
        }elseif($act == 'a1'){
            include('a1.php');
        }elseif($act == 'a2'){
            include('a2.php');
        }elseif($act == 'a3'){
            include('a3.php');
        }elseif($act == 'member'){
            include('member_from_edit.php');
        }elseif($act == 'pass'){
            include('member_from_edit_pass.php');
        }elseif($act == 'contact'){
            include('contact.php');
        }elseif($act == 'showp') {
          include('showp.php');
        }elseif($act == 'shows') {
          include('shows.php');
        }else{
            include('shop_product.php');
        }

        ?>
        
    </div>
    <br>


</div>

</body>
</html>
<?php
}else{
    header("location:index1.php");
}
?>