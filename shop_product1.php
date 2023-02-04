<?php
$query_product = "SELECT * FROM p_product ORDER BY p_id ASC";
$result_pro =mysqli_query($con, $query_product) or die ("Error in query: $query_product " . mysqli_error());
//echo($query_product);
//exit()
$query = "SELECT * FROM i_information ORDER BY i_id ASC";
$result =mysqli_query($con, $query) or die ("Error in query: $query " . mysqli_error());
?>
<?php
foreach ($result as $row) {
?>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <iframe width="500" height="255" src="<?php echo $row['i_detail3']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <iframe width="500" height="255" src="<?php echo $row['i_detail4']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <iframe width="500" height="255" src="<?php echo $row['i_detail5']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <iframe width="500" height="255" src="<?php echo $row['i_detail6']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

        <?php } ?>
<div class="row">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<?php
foreach ($result_pro as $row_pro) {
?>

<div class="card border-secondary md-3" style="width: 21rem; margin-top:10px ">
    <img src="backend/p_img/<?php echo $row_pro['p_img']; ?>" class="card-img-top" alt="...">
    <div class="card-body">
        <center>
        <div class="bg-danger text-white" >
        <h5 class="card-title"><?php echo $row_pro['p_name'];?></h5></div>
        <h3 class="card-title">ราคา <?php echo $row_pro['p_price'];?> บาท</h3>
        <a href="product_detail1.php?p_id=<?php echo $row_pro['p_id'] ?>" class="btn btn-outline-warning btn-lg btn-block">ดูรายละเอียด</a>
        </center> <br> 
        
        <h6 class="card-title"><b>สถานะสินค้า : </b>
        <?php
        if($row_pro['p_status'] == สินค้าพร้อมส่ง){
            echo "<font color='green'>สินค้าพร้อมส่ง</font>";
        }else{
            echo "<font color='red'>สินค้าไม่พร้อมส่ง</font>";
        }
        ?>
        </h6>
    </div>
</div>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


<?php } ?>
<a class="navbar-brand" href="index1.php?act=contact1">
<br><br><br><br><br>
<br><br><br><br><br>
<br><br>
&nbsp;&nbsp;&nbsp;
<center>
<img src="icon.png" class="img-fluid" alt="Responsive image" width="70" >
<h6>ติดต่อสอบถาม</h6>
</center>
</a>
</div>
