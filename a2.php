<?php
include('h.php');
include('backend/condb.php');
$m_id = $_POST["user_id"];
$p_id = $_GET["p_id"];

$sql = "SELECT * FROM i_information WHERE i_id = 2 ";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>หนังน่าดู</title>
  <meta charset="utf-8">
  
</head>
<body> <br>
<center>
<h2>หนังน่าดู/หนังเข้าใหม่ประจำเดือน</h2>
</center>
<div class="container">
    <div class="row">
        <div class="col">
        <span class="d-block p-2 bg-success text-white">หนังน่าดู</span>
        <?php echo"<img src='backend/i_detail1/".$row['i_detail1']."'width='100%' >";?>
        </div>
        <div class="col">
        <span class="d-block p-2 bg-danger text-white">หนังเข้าใหม่ประจำเดือน</span>
        <?php echo"<img src='backend/i_detail2/".$row['i_detail2']."'width='100%' >";?>
        </div>
    </div>
</div>       
</body>
</html>
