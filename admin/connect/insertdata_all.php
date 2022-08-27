<?php
session_start();
include 'connect_db.php';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['add_regis_medese'])) {
        $FisrtName =  $_POST['FisrtName'];
        $LastName = $_POST['LastName'];
        $NickName = $_POST['NickName'];
        $NameTeam = $_POST['NameTeam'];
        $Phone_Number = $_POST['Phone_Number'];
        $ID_Card = $_POST['ID_Card'];
        $Address_IDCard = $_POST['Address_IDCard'];
        $AddressCall = $_POST['AddressCall'];
        $new_name_profile = $_POST['new_name_profile'];
        $imgs_IdCard = $_POST['imgs_IdCard'];
        $Tag_id = $_POST['Tag_id'];

        $sql_customer = "INSERT INTO `db_customer`
                                    (`tb_customer_FisrtName`, 
                                    `tb_customer_LastName`, 
                                    `tb_customer_nickname`, 
                                    `tb_customer_NameTeam`, 
                                    `tb_customer_number`, 
                                    `tb_customer_IDCard`, 
                                    `tb_customer_AddressIDCard`, 
                                    `tb_customer_addressCall`, 
                                    `tb_tag_ID`, 
                                    `tb_customer_DateTime`) 
                                    VALUES 
                                    ('$FisrtName',
                                    '$LastName',
                                    '$NickName',
                                    '$NameTeam',
                                    '$Phone_Number',
                                    '$ID_Card',
                                    '$Address_IDCard',
                                    '$AddressCall',
                                    '$Tag_id',
                                    NOW())";
        $query_customer = mysqli_query($conn, $sql_customer);
        $cus_id = mysqli_insert_id($conn);
        if ($query_customer) {
            $Sql_file = "INSERT INTO `db_file_customer`(`tb_filename`, `tb_customer_id`) VALUES ('$imgs_IdCard', '$Tag_id')";
            $stmt = mysqli_query($conn, $Sql_file);

            $Sql_file1 = "INSERT INTO `db_profile_customer`(`tb_profilefile_name`, `tb_customer_id`) VALUES ('$new_name_profile', '$Tag_id')";
            $stmt1 = mysqli_query($conn, $Sql_file1);
            unset($_SESSION['regis_medese']);
            header("Location: ../../success.php?cus_id=".$cus_id."");
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("เกิดข้อผิดพลาดในการสมัครคู่ค้า กรุณาแจ้งผู้แล.");';
            echo 'window.location.href = "../../index.php";';
            echo '</script>';
        }
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("เกิดข้อผิดพลาดในการสมัครคู่ค้า กรุณาแจ้งผู้แล.");';
        echo 'window.location.href = "../../index.php";';
        echo '</script>';
    }
}
