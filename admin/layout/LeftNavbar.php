<?php

if (empty($_SESSION['tb_admin_id'])) {
  echo '<script type="text/javascript">';
  echo 'alert("กรุณาเข้าสู่ระบบอีกครั้ง.");';
  echo 'window.location.href = "index.php";';
  echo '</script>';
  exit();
}

$intRejectTime = 20; // Minute
$sql = "UPDATE db_admin SET LoginStatus = '0', LastUpdate = '0000-00-00 00:00:00'  WHERE '" . $_SESSION['tb_admin_id'] . "' AND DATE_ADD(LastUpdate, INTERVAL $intRejectTime MINUTE) <= NOW() ";
$query = mysqli_query($conn, $sql);

//*** Get User Login
$strSQL = "SELECT * FROM db_admin WHERE tb_admin_id = '" . $_SESSION['tb_admin_id'] . "' ";
$objQuery = mysqli_query($conn, $strSQL);
$objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <div class="dropdown">
      <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php echo $_SESSION['tb_username']; ?>
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="profile.php">โปรไฟล์</a>
        <center>
          <a class="btn btn-danger" href="connect/logout_admin.php">ออกจากระบบ</a>
        </center>
      </div>
    </div>
  </ul>
</nav>
<!-- /.navbar -->
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="dist/img/Medese_Family.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Medese Family</a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="Home.php" class="nav-link">
            <i class="nav-icon far fa-circle text-info"></i>
            <p>ข้อมูลผู้สมัคร</p>
          </a>
        </li>
        <?php
        if ($objResult['tb_admin_status'] == 1) {
        ?>
          <li class="nav-item">
            <a href="admin.php" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>จัดการข้อมูลแอดมิน</p>
            </a>
          </li>
        <?php
        } elseif ($objResult['tb_admin_status'] !== 1) {
        ?>
        <?php
        }
        ?>

        <li class="nav-item">
          <a href="search.php" class="nav-link">
            <i class="nav-icon far fa-circle text-info"></i>
            <p>ค้นหาข้อมูลผู้สมัคร</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>