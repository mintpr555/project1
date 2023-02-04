<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database:
include('backend/condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
date_default_timezone_set('Asia/Bangkok');
//สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
$date1 = date("Ymd_His");
//สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
$numrand = (mt_rand());

//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
$s_id = $_POST["s_id"];
$s_img = (isset($_POST['s_img']) ? $_POST['s_img'] : '');
$img2 = $_POST['img2'];
$upload=$_FILES['s_img']['name'];

if($upload !='') {

    //โฟลเดอร์ที่เก็บไฟล์
    $path="backend/s_img/";
    //ตัวขื่อกับนามสกุลภาพออกจากกัน
    $type = strrchr($_FILES['s_img']['name'],".");
    //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
    $newname =$numrand.$date1.$type;

    $path_copy=$path.$newname;
    $path_link="s_img/".$newname;
    //คัดลอกไฟล์ไปยังโฟลเดอร์
    move_uploaded_file($_FILES['s_img']['tmp_name'],$path_copy);

}else {
    $newname = $img2;

}

//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database

$sql = "UPDATE s_sell SET  
            s_status='รอสินค้า',
			s_img='$newname'
			WHERE s_id='$s_id' ";

$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());

mysqli_close($con); //ปิดการเชื่อมต่อ database

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

if($result){
    echo "<script type='text/javascript'>";
    echo "alert('ส่งหลักฐานการชำระเงินสำเร็จ!');";
    echo "window.location = 'index.php'; ";
    echo "</script>";
}
else{
    echo "<script type='text/javascript'>";
    echo "alert('แก้ไขข้อมูลผิดพลาด!');";
    echo "</script>";
}
?>

<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	date_default_timezone_set("Asia/Bangkok");

	$sToken = "KeZTjmdssddHDlXi2CM98ifVLGlHDDdIG5LG4NQzSKv";
    $sMessage = "รหัสออเดอร์ : " . $s_id . " \n";
    $sMessage .= "สถานะ : ชำระเงินสำเร็จ\n";
    $sMessage .= "กรุณาตรวจสอบการสั่งซื้อ!!";
    
	

	$chOne = curl_init(); 
	curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
	curl_setopt( $chOne, CURLOPT_POST, 1); 
	curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
	$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
	curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
	curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
	$result = curl_exec( $chOne ); 

	/*Result error 
	if(curl_error($chOne)) 
	{ 
		echo 'error:' . curl_error($chOne); 
	} 
	else { 
		$result_ = json_decode($result, true); 
		echo "status : ".$result_['status']; echo "message : ". $result_['message'];
	} 
	curl_close( $chOne );   */
?>