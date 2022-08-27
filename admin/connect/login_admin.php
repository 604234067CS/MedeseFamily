<?php
session_start();
session_regenerate_id(true);
require_once 'connect_db.php';
if (isset($_POST['sign_in_admin'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $Password = mysqli_real_escape_string($conn, $_POST['Password']);

    if (empty($username)) {
        echo '<script type="text/javascript">';
        echo 'alert("กรุณากรอกอีเมล.");';
        echo 'window.location.href = "../index.php";';
        echo '</script>';
    } elseif (empty($Password)) {
        echo '<script type="text/javascript">';
        echo 'alert("กรุณากรอกรหัสผ่าน.");';
        echo 'window.location.href = "../index.php";';
        echo '</script>';
    } else {
        $strSQL = "SELECT * FROM db_admin WHERE tb_username = '$username' AND tb_password = '$Password'";
        $objQuery = mysqli_query($conn, $strSQL);
        $objResult = mysqli_fetch_array($objQuery);
        if (!$objResult) {
            echo '<script type="text/javascript">';
            echo 'alert("ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง.");';
            echo 'window.location.href = "../index.php";';
            echo '</script>';
            exit();
        } else {
            if ($objResult["LoginStatus"] == "1") {
                echo '<script type="text/javascript">';
                echo 'alert("มีผู้เข้าสู่ระบบใช้งานแล้ว.");';
                echo 'window.location.href = "../index.php";';
                echo '</script>';
                exit();
            } else {
                //*** Update Status Login
                $sql = "UPDATE db_admin SET LoginStatus = '1' , LastUpdate = NOW() WHERE tb_admin_id = '" . $objResult["tb_admin_id"] . "' ";
                $query = mysqli_query($conn, $sql);

                //*** Session
                if (is_array($objResult)) {
                    $_SESSION["tb_admin_id"] = $objResult['tb_admin_id'];
                    $_SESSION["tb_nickname"] = $objResult['tb_nickname'];
                    $_SESSION["tb_username"] = $objResult['tb_username'];
                    session_write_close();
                } else {
                    echo '<script type="text/javascript">';
                    echo 'alert("ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง.");';
                    echo 'window.location.href = "../index.php";';
                    echo '</script>';
                }
                if (isset($_SESSION['tb_admin_id'])) {
                    header("Location: ../Home.php");
                }
            }
        }
        mysqli_close($conn);
    }
}
