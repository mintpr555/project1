<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
    &nbsp;&nbsp;&nbsp;
    <a class="navbar-brand" href="index.php">
    <img src="N.png" class="img-fluid" alt="Responsive image" width="70" >
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php?act=record&user_id=<?=$user_id;?>">ประวัติการสั่งซื้อ</a>
            </li>
            
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;
            <li class="nav-item active">
                <a class="nav-link" href="index.php?act=a1&user_id=<?=$user_id;?>">ขั้นตอนการสั่งซื้อ</a>
            </li>
            
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;
            <li class="nav-item active">
                <a class="nav-link" href="index.php?act=a2&user_id=<?=$user_id;?>">หนังน่าดู</a>
            </li>
            
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;
            <li class="nav-item active">
                <a class="nav-link" href="index.php?act=a3&user_id=<?=$user_id;?>">คำถามพบบ่อย</a>
            </li>
            
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;
            <li class="nav-item active">
                <a class="nav-link" href="index.php?act=member&user_id=<?=$user_id;?>">แก้ไขข้อมูลส่วนตัว</a>
            </li>
            
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;
            <li class="nav-item active">
                <a class="nav-link" href="logout.php" onclick="return confirm('คุณต้องการออกจากระบบหรือไม่')">ออกจากระบบ</a>
            </li>
            
        </ul>
    </div>

</nav>

