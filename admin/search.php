<?php
session_start();
session_regenerate_id(true);
require_once 'connect/connect_db.php';

if (empty($_SESSION['tb_admin_id'])) {
    echo '<script type="text/javascript">';
    echo 'alert("กรุณาเข้าสู่ระบบอีกครั้ง.");';
    echo 'window.location.href = "index.php";';
    echo '</script>';
    exit();
}

$sql = "UPDATE db_admin SET LastUpdate = NOW() WHERE tb_admin_id  = '" . $_SESSION['tb_admin_id'] . "' ";
$query = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Enhanced Search Form</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include 'layout/LeftNavbar.php' ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <br />
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card ">
                                <div class="card-header">
                                    <h3 class="card-title" style="font-size: 18px;">
                                        ค้นหาผู้สมัครคู่ค่า
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <?php
                                    ini_set('display_errors', 1);
                                    error_reporting(~0);

                                    $tad_id = null;
                                    $name = null;
                                    $lname = null;
                                    $IdCard = null;
                                    ?>
                                    <form method="get" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label>รหัสประจำตัว:</label>
                                                    <select class="select2" style="width: 100%;" name="tad_id">
                                                        <option selected>เลือกรหัสประจำตัว</option>
                                                        <?php
                                                        $customer_sql = "SELECT * FROM db_customer";
                                                        $customer_query = mysqli_query($conn, $customer_sql);
                                                        foreach ($customer_query as $row_tadid) {
                                                        ?>
                                                            <option value="<?php echo $row_tadid['tb_customer_id'] ?>"><?php echo $row_tadid['tb_tag_ID'] ?></option>
                                                        <?php
                                                        }
                                                        ?>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="inputName">ชื่อ:</label>
                                                    <input type="text" id="name" name="name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="inputName">นามสกุล:</label>
                                                    <input type="text" id="lname" name="lname" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="inputName">เลขบัตรประชาชน:</label>
                                                    <div class="input-group input-group-lg">
                                                        <input type="text" id="IdCard" name="IdCard" class="form-control">
                                                        <div class="input-group-append">
                                                            <button type="submit" class="btn btn-sdp-tb btn-secondary btn-secondary">
                                                                ค้นหา <i class="fa fa-search"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
            <?php
            if (isset($_GET["tad_id"]) || isset($_GET["name"]) || isset($_GET["lname"]) || isset($_GET["IdCard"])) {
                $tad_id = $_GET["tad_id"];
                $name = $_GET["name"];
                $lname = $_GET["lname"];
                $IdCard = $_GET["IdCard"];
                if (empty($tad_id)) {
                    echo '<script type="text/javascript">';
                    echo 'alert("กรุณาเลือกรหัสประจำตัว และกรอกข้อมูลทั้งหมด.");';
                    echo 'window.location.href = "search.php";';
                    echo '</script>';
                } elseif (empty($name)) {
                    echo '<script type="text/javascript">';
                    echo 'alert("กรุณากรอกข้อมูลทั้งหมด.");';
                    echo 'window.location.href = "search.php";';
                    echo '</script>';
                } elseif (empty($lname)) {
                    echo '<script type="text/javascript">';
                    echo 'alert("กรุณากรอกข้อมูลทั้งหมด.");';
                    echo 'window.location.href = "search.php";';
                    echo '</script>';
                } elseif (empty($IdCard)) {
                    echo '<script type="text/javascript">';
                    echo 'alert("กรุณากรอกข้อมูลทั้งหมด.");';
                    echo 'window.location.href = "search.php";';
                    echo '</script>';
                } else {
                    $sql_service = "SELECT * FROM `db_customer` WHERE  
                    `tb_customer_FisrtName` LIKE '{$name}%' AND 
                    `tb_customer_LastName` LIKE '{$lname}%' AND 
                    `tb_customer_IDCard` LIKE '{$IdCard}%' AND 
                    `tb_customer_id` = $tad_id ";
                    $query = mysqli_query($conn, $sql_service);
                    $row = mysqli_fetch_assoc($query);
                    if ($row['tb_customer_id'] !== $tad_id && $row['tb_customer_FisrtName'] !== $name && $row['tb_customer_LastName'] !== $lname && $row['tb_customer_IDCard'] !== $IdCard) {
                        echo '<script type="text/javascript">';
                        echo 'alert("กรุณากรอกข้อมูลทั้งหมด ให้ถูกต้อง.");';
                        echo 'window.location.href = "search.php";';
                        echo '</script>';
                    }
                }
            ?>
                <!-- Main content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card ">
                                    <!-- /.card-header -->
                                    <div class="card-body pad">
                                        <table id="example" class="table table-bordered table-striped table-sm table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" width=15px>รหัสประจำตัว</th>
                                                    <th class="text-center" width=15px>ชื่อ-นามสกุล</th>
                                                    <th class="text-center" width=15px>ชื่อแม่ทีม</th>
                                                    <th class="text-center" width=15px>ชื่อเล่น</th>
                                                    <th class="text-center" width=15px></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                while ($row = mysqli_fetch_assoc($query)) {

                                                ?>
                                                    <tr class="text-center">
                                                        <td><?php echo $row['tb_tag_ID'] ?></td>
                                                        <td><?php echo $row['tb_customer_FisrtName'] ?> <?php echo $row['tb_customer_LastName'] ?></td>
                                                        <td><?php echo $row['tb_customer_NameTeam'] ?></td>
                                                        <td><?php echo $row['tb_customer_nickname'] ?></td>
                                                        <td>
                                                            <button type="button" class="btn btn-sdp-tb btn-sm btn-outline-success btn-outline-success" data-toggle="modal" data-target="#modal-xl<?php echo $row['tb_customer_id'] ?>">
                                                                <i class="fa fa-eye"></i></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <div class="modal fade" id="modal-xl<?php echo $row['tb_customer_id'] ?>">
                                                        <div class="modal-dialog modal-xl">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">ข้อมูลผู้สมัครคู่ค้า</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <div class="form-group row">
                                                                        <label for="example-text-input" class="col-sm-2 col-form-label">รหัสประจำตัว:</label>
                                                                        <div class="col-sm-10">
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" value="<?php echo $row['tb_tag_ID'] ?>" placeholder="ป้อนชื่อสินค้า" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label for="example-text-input" class="col-sm-2 col-form-label">ชื่อ:</label>
                                                                        <div class="col-sm-4">
                                                                            <input type="text" value="<?php echo $row['tb_customer_FisrtName'] ?>" class="form-control" readonly />
                                                                        </div>
                                                                        <label for="example-text-input" class="col-sm-2 col-form-label">นามสกุล:</label>
                                                                        <div class="col-sm-4">
                                                                            <input type="text" value="<?php echo $row['tb_customer_LastName'] ?>" class="form-control" readonly />
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label for="example-text-input" class="col-sm-2 col-form-label">ชื่อเล่น:</label>
                                                                        <div class="col-sm-10">
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" value="<?php echo $row['tb_customer_nickname'] ?>" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label for="example-text-input" class="col-sm-2 col-form-label">ชื่อแม่ทีม</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" class="form-control" value="<?php echo $row['tb_customer_NameTeam'] ?>" readonly>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label for="example-text-input" class="col-sm-2 col-form-label">เบอร์โทรศัพท์:</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="number" class="form-control" value="<?php echo $row['tb_customer_number'] ?>" readonly>
                                                                        </div>
                                                                    </div>


                                                                    <div class="form-group row">
                                                                        <label for="example-text-input" class="col-sm-2 col-form-label">เลขบัตรประชาชน:</label>
                                                                        <div class="col-sm-10">
                                                                            <div class="form-group">
                                                                                <input type="number" class="form-control" value="<?php echo $row['tb_customer_IDCard'] ?>" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label for="example-text-input" class="col-sm-2 col-form-label">ที่อยู่ตามบัตรประชาชน:</label>
                                                                        <div class="col-sm-10">
                                                                            <textarea class="form-control" rows="2" readonly><?php echo $row['tb_customer_AddressIDCard'] ?></textarea>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label for="example-text-input" class="col-sm-2 col-form-label">ที่อยู่ปัจจุบันในการติดต่อ:</label>
                                                                        <div class="col-sm-10">
                                                                            <textarea class="form-control" rows="2" readonly><?php echo $row['tb_customer_addressCall'] ?> </textarea>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label for="example-text-input" class="col-sm-2 col-form-label">รูปโปรไฟล์:</label>
                                                                        <div class="col-sm-10">
                                                                            <?php
                                                                            $profile_sql = "SELECT * FROM db_profile_customer WHERE tb_customer_id = '" . $row['tb_tag_ID'] . "'";
                                                                            $profile_query = mysqli_query($conn, $profile_sql);
                                                                            foreach ($profile_query as $row_profile) {
                                                                                $images_profile = '../assets/img/file_profile/' . $row_profile['tb_profilefile_name'];
                                                                            ?>
                                                                                <img class="img-fluid" src="<?php echo $images_profile; ?>" width="50%">
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label for="example-text-input" class="col-sm-2 col-form-label">รูปบัตร/สำเนาประชาชน:</label>
                                                                        <div class="col-sm-10">
                                                                            <?php
                                                                            $IDCard_sql = "SELECT * FROM db_file_customer WHERE tb_customer_id = '" . $row['tb_tag_ID'] . "'";
                                                                            $IDCard_query = mysqli_query($conn, $IDCard_sql);
                                                                            foreach ($IDCard_query as $row_IDCard_query) {
                                                                                $images_IDCard = '../assets/img/file_ID_Card/' . $row_IDCard_query['tb_filename'];
                                                                            ?>
                                                                                <img class="img-fluid" src="<?php echo $images_IDCard; ?>" width="50%">
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">ออก</button>
                                                                    <!-- <button type="button" class="btn btn-danger">ดาวน์โหลด</button> -->
                                                                </div>
                                                            </div>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                        <!-- /.modal-dialog -->
                                                    </div>
                                                    <!-- /.modal -->
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <!-- /.col-->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /.content -->
            <?php
            }
            ?>
        </div>

        <?php include 'layout/main-footer.php' ?>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="plugins/select2/js/select2.full.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <script>
        $(function() {
            $('.select2').select2()
        });
    </script>
</body>

</html>