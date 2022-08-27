<?php
session_start();
include 'connect_db.php';

if (isset($_POST['update_profile'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $admin_id = $_POST['admin_id'];

    $sql_admin = "UPDATE `db_admin` SET `tb_nickname`='$name',`tb_username`='$username',`tb_password`='$password' WHERE `tb_admin_id`=$admin_id";
    $query_admin = mysqli_query($conn, $sql_admin);
    if ($query_admin) {
        echo '<script type="text/javascript">';
        echo 'alert("แก้ไขข้อมูลเรียบร้อย.");';
        echo 'window.location.href = "../profile.php";';
        echo '</script>';
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("แก้ไขข้อมูลผิดพลาด กรุณาลองใหม่!.");';
        echo 'window.location.href = "../profile.php";';
        echo '</script>';
    }
}
