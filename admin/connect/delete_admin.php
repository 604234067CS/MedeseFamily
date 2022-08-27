<?php
include 'connect_db.php';
?>

<?php
$selet = "DELETE FROM db_admin WHERE tb_admin_id  ='" . $_GET['Del_id'] . "' ";
$query = mysqli_query($conn, $selet) or die($selet);
if ($query) {
    echo '<script type="text/javascript">';
    echo 'alert("ลบข้อมูลแอดมินสำเร็จ.");';
    echo 'window.location.href = "../admin.php";';
    echo '</script>';
} else {
    echo '<script type="text/javascript">';
    echo 'alert("โปรดตรวจสอบการลบของคุณ.");';
    echo 'window.location.href = "../admin.php";';
    echo '</script>';
}
?>
