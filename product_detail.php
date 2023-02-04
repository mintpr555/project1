<?php
include('h.php');
include('backend/condb.php');
$m_id = $_REQUEST["user_id"];
$m_id = $_POST["user_id"];
$p_id = $_GET["p_id"];
?>
<!DOCTYPE html>
<head>
    <title>รายละเอียดสินค้า</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <style type="text/css">
        div.polaroid {
            width: 80%;
            background-color: white;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            margin-bottom: 25px;
        }

        div.container_di {
            text-align: center;
            padding: 10px 20px;
        }

        body{
			font-family: 'Mitr', sans-serif;
            font-size:16px;
		}
    </style>
</head>
<body>

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
      <img class="d-block w-100" src="r3.jpg" alt="Third slide">
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
    <?php include('navbar2.php'); ?>
    <br>
    <span class="hidden-xs">สวัสดี คุณ <?php echo $_SESSION["m_name"]; ?></span>
    <div class="row">
    
        <?php
        $sql = "SELECT * FROM p_product WHERE p_id = $p_id ";
        
        $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
        $row = mysqli_fetch_array($result);

        $sql2 = "SELECT s.*,m.m_id,m.m_name,p.p_name,p.p_price,p.p_img,p.p_detail,p.p_status FROM s_sell as s 
        INNER JOIN m_member  as m ON s.m_id=m.m_id 
        INNER JOIN p_product as p ON s.p_id=p.p_id ";
        
        $result2 = mysqli_query($con, $sql2) or die ("Error in query: $sql " . mysqli_error());
        $row2 = mysqli_fetch_array($result2);

        
       
        ?>

        <div class="col-md-12">
            <div class="container" style="margin-top: 50px">
                <div class="row">
                <div class="col-md-1">
                <a href=javascript:history.back(1) class="btn btn-secondary">ย้อนกลับ</a>
                </div>
                    <div class="col-md-5">
                            <center><br>
                            <?php echo"<img src='backend/p_img/".$row['p_img']."'width='85%' class='img-thumbnail'>";?>
                            <br><br>
                            <div class="p-1 mb-3 bg-danger text-white" >
                            <h4><b><?php echo $row["p_name"];?></b></h4></div>
                            
                            <h5 class="card-title"><b>สถานะสินค้า : </b>
                            <?php
                            if($row['p_status'] == สินค้าพร้อมส่ง){
                                echo "<font color='green'>สินค้าพร้อมส่ง</font>";
                            }else{
                                echo "<font color='red'>สินค้าไม่พร้อมส่ง</font>";
                            }
                            ?>
                            </h5>

                            <br>
                            </center>
                    </div>
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-4">
                    <form  name="order_save" action="order_save_db.php" method="POST" class="form-horizontal" >
                        <center> 
                        <h1><b><br>
                        <?php echo $row["p_name"];?>
                        </b></h1></center><br> 
                        <b>รายละเอียดสินค้า : </b><?php echo $row["p_detail"];?><br>
                        <b>ราคาสินค้า : </b><?php echo $row["p_price"];?> บาท<br>
                        <br>
                        <input type="hidden"  name="p_name" class="form-control" placeholder="วันที่/เวลา" / value="<?php echo $row2["p_name"]; ?>"readonly>
                        <input type="hidden"  name="s_date" class="form-control" placeholder="วันที่/เวลา" / value="<?php echo Date("Y-m-d H:i:s"); ?>"readonly>
                        <input type="hidden"  name="s_qty" class="form-control" placeholder="จำนวน" / value="1" readonly>
                        <input type="hidden"  name="s_status" class="form-control" placeholder="สถานะ" / value="รอชำระเงิน"readonly>  
                        <input type="hidden"  name="p_id" class="form-control" placeholder="ชื่อสินค้า" / value="<?php echo $row["p_id"]; ?>"readonly>
                        <input type="hidden"  name="m_id" class="form-control" placeholder="ชื่อสมัครสมาชิก" / value="<?php echo $user_id; ?>"readonly>
                        <center>
                        <?php
                            if($row['p_status'] == สินค้าพร้อมส่ง){ ?>
                            <button type="submit" class="btn btn-info btn-lg btn-block" onclick="return confirm('ยืนยันการสั่งซื้อใช่หรือไม่')">สั่งซื้อสินค้า</button>    
                            <?php }else{ ?>
                              <a class="btn btn-secondary btn-lg btn-block" >ไม่สามารถสั่งซื้อสินค้าได้</a>
                        <?php }
                            ?>  
                      </center>
                        </form>
                    </div>
                      
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
