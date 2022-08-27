<?php
session_start();
include 'connect_db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['add_regis'])) {
        $ID_Card = $_POST['ID_Card'];
        $sql_customer = "SELECT tb_customer_IDCard FROM db_customer";
        $query_customer = mysqli_query($conn, $sql_customer);
        foreach ($query_customer as $row_customer) {
            $tb_customer_IDCard = $row_customer['tb_customer_IDCard'];
            if ($ID_Card == $tb_customer_IDCard) {
                echo '<script type="text/javascript">';
                echo 'alert("ไม่สามารถสมัครซ้ำได้ เนื่องจากเลขบัตรประชาชนนี้สมัครแล้ว.");';
                echo 'window.location.href = "../../index.php";';
                echo '</script>';
            }
        }
        $files = array_filter($_FILES['image_IdCard']['name']);
        $total_count = count($_FILES['image_IdCard']['name']);
        for ($i = 0; $i < $total_count; $i++) {
            $file_name = explode(".", $_FILES['image_IdCard']['name'][$i]);
            $allowed_ext = array("jpg", "jpeg", "png", "gif", "PDF", "doc");
            srand((float)microtime() * 10000000);
            $str = 'abcdefghijklmnopqrstuvwxyz0123456789';
            $passw = str_shuffle($str);
            $str_result = "";
            $str_result .= substr($passw, 1, 20);
            $imgs_IdCard = $str_result . "." . $file_name[1];
            $sourcePath = $_FILES['image_IdCard']['tmp_name'][$i];
            $target_file = '../../assets/img/file_ID_Card/' . $imgs_IdCard;
            move_uploaded_file($_FILES['image_IdCard']['tmp_name'][$i], $target_file);
        }
        $files_profile = array_filter($_FILES['image_profile']['name']);
        $total_count_profile  = count($_FILES['image_profile']['name']);
        for ($i = 0; $i < $total_count_profile; $i++) {
            $file_name_profile = explode(".", $_FILES['image_profile']['name'][$i]);
            $allowed_ext = array("jpg", "jpeg", "png", "gif", "PDF", "doc");
            srand((float)microtime() * 10000000);
            $str = 'abcdefghijklmnopqrstuvwxyz0123456789';
            $passw_profile = str_shuffle($str);
            $str_result_profile = "";
            $str_result_profile .= substr($passw_profile, 1, 20);
            $new_name_profile = $str_result_profile . "." . $file_name_profile[1];
            $sourcePath = $_FILES['image_profile']['tmp_name'][$i];
            $target_file_profile = '../../assets/img/file_profile/' . $new_name_profile;
            move_uploaded_file($_FILES['image_profile']['tmp_name'][$i], $target_file_profile);
        }

        if (isset($_SESSION['regis_medese'])) {
            $myitem_id = array_column($_SESSION['regis_medese'], 'Tag_id');
            if (in_array($_POST['Tag_id'], $myitem_id)) {
                echo '<script type="text/javascript">';
                echo 'alert("กรุณาอ่านสัญญาคู่ค้าในการจำหน่ายสินค้า!.");';
                echo 'window.location.href = "../../Application_rules.php";';
                echo '</script>';
            } else {
                $count = count($_SESSION['regis_medese']);
                $_SESSION['regis_medese'][$count] = array(
                    'Tag_id'                =>      $_POST['Tag_id'],
                    'FisrtName'             =>      $_POST['FisrtName'],
                    'LastName'              =>      $_POST['LastName'],
                    'NickName'              =>      $_POST['NickName'],
                    'NameTeam'              =>      $_POST['FisrtName'],
                    'Phone_Number'          =>      $_POST['Phone_Number'],
                    'ID_Card'               =>      $_POST['ID_Card'],
                    'Address_IDCard'        =>      $_POST['Address_IDCard'],
                    'AddressCall'           =>      $_POST['AddressCall'],
                    'new_name_profile'      =>      $new_name_profile,
                    'imgs_IdCard'           =>      $imgs_IdCard
                );
            }
        } else {
            $_SESSION['regis_medese'][0] = array(
                'Tag_id'                =>      $_POST['Tag_id'],
                'FisrtName'             =>      $_POST['FisrtName'],
                'LastName'              =>      $_POST['LastName'],
                'NickName'              =>      $_POST['NickName'],
                'NameTeam'              =>      $_POST['FisrtName'],
                'Phone_Number'          =>      $_POST['Phone_Number'],
                'ID_Card'               =>      $_POST['ID_Card'],
                'Address_IDCard'        =>      $_POST['Address_IDCard'],
                'AddressCall'           =>      $_POST['AddressCall'],
                'new_name_profile'      =>      $new_name_profile,
                'imgs_IdCard'           =>      $imgs_IdCard
            );
            echo '<script type="text/javascript">';
            echo 'alert("กรุณาอ่านสัญญาคู่ค้าในการจำหน่ายสินค้า!.");';
            echo 'window.location.href = "../../Application_rules.php";';
            echo '</script>';
        }
    }
}
