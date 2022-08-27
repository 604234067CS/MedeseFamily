<?php
session_start();
include 'connect_db.php';

if (isset($_POST['insert_admin'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $admin_head = $_POST['admin_head'];

    if (($name == '') || ($name == '') || ($name == '') || ($name == '')) {
        echo '<script type="text/javascript">';
        echo 'alert("กรุณากรอกข้อมูลให้ครบ!.");';
        echo 'window.location.href = "../admin.php";';
        echo '</script>';
    }elseif($admin_head == '') {
        $sql_admin = "INSERT INTO `db_admin`(`tb_nickname`, `tb_username`, `tb_password`, `tb_admin_status`) VALUES ('$name','$username','$password',2)";
        $query_admin = mysqli_query($conn, $sql_admin);
        if ($query_admin) {
            echo '<script type="text/javascript">';
            echo 'alert("เพิ่มข้อมูลเรียบร้อย.");';
            echo 'window.location.href = "../admin.php";';
            echo '</script>';
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("เพิ่มข้อมูลผิดพลาด กรุณาลองใหม่!.");';
            echo 'window.location.href = "../admin.php";';
            echo '</script>';
        }
    }else{
        $sql_admin = "INSERT INTO `db_admin`(`tb_nickname`, `tb_username`, `tb_password`, `tb_admin_status`) VALUES ('$name','$username','$password',1)";
        $query_admin = mysqli_query($conn, $sql_admin);
        if ($query_admin) {
            echo '<script type="text/javascript">';
            echo 'alert("เพิ่มข้อมูลเรียบร้อย.");';
            echo 'window.location.href = "../admin.php";';
            echo '</script>';
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("เพิ่มข้อมูลผิดพลาด กรุณาลองใหม่!.");';
            echo 'window.location.href = "../admin.php";';
            echo '</script>';
        }
    }
}
