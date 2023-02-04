<?php require_once('backend/condb.php');
include('backend/h.php');
$query_product = "SELECT * FROM p_product ORDER BY p_id ASC";
$result_product = mysqli_query($con, $query_product) or die ("Error in query: $query_product " . mysqli_error());
?>

<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    เลือกดูแบ่งตามสินค้า
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

  <?php
    foreach ($result_product as $row_product) {?>
    <a class="dropdown-item" 
    href="index.php?act=showp&p_id=<?php echo $row_product['p_id'];?>">
    <?php echo $row_product["p_name"];?></a>
    <?php } ?>
  </div>
</div>
&nbsp;
<?php 
$query_sell = "SELECT * FROM s_sell ORDER BY s_id ASC";
$result_sell = mysqli_query($con, $query_sell) or die ("Error in query: $query_sell " . mysqli_error());
?>

<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    เลือกดูแบ่งสถานะสินค้า
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

<a class="dropdown-item" href="index.php?act=shows&s_status=รอชำระเงิน">รอชำระเงิน</a>
<a class="dropdown-item" href="index.php?act=shows&s_status=รอสินค้า">รอสินค้า</a>
<a class="dropdown-item" href="index.php?act=shows&s_status=การสั่งซื้อเสร็จสิ้น">การสั่งซื้อเสร็จสิ้น</a>
 

  </div>
</div>
