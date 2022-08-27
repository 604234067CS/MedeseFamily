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
    <title>Medese Family | Home</title>
    <link rel="icon" type="image/png" sizes="16x16" href="dist/img/Medese_Family.png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- <link rel="stylesheet" href="plugins/datatables-bs4/dataTables.bootstrap4.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
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
                                        โปรไฟล์
                                    </h3>
                                </div>
                                <?php
                                $strSQL = "SELECT * FROM db_admin WHERE tb_admin_id = '" . $_SESSION['tb_admin_id'] . "' ";
                                $objQuery = mysqli_query($conn, $strSQL);
                                $objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
                                ?>
                                <form action="connect/update_progile.php" method="post">
                                <input type="hidden" class="form-control" name="admin_id" value="<?php echo $objResult['tb_admin_id'] ?>">
                                    <div class="card-body pad">
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">ชื่อ:</label>
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="name" value="<?php echo $objResult['tb_nickname'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">ชื่อผู้ใช้:</label>
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="username" value="<?php echo $objResult['tb_username'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">รหัสผ่าน:</label>
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <input type="password" class="form-control" name="password" value="<?php echo $objResult['tb_password'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-tools">
                                            <button type="submit" class="btn btn-success" name="update_profile" style="float: right;">บันทุึก</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.col-->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->



        <?php include 'layout/main-footer.php' ?>
    </div>
    <!-- /-wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="dist/js/adminlte.js"></script>
    <!-- OPTIONAL SCRIPTS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard3.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

    <!-- <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script> -->
    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
            $('#example').dataTable({
                "oLanguage": {
                    "sLengthMenu": "แสดง _MENU_ เร็คคอร์ด ต่อหน้า",
                    "sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",
                    "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ เร็คคอร์ด",
                    "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
                    "sInfoFiltered": "(จากเร็คคอร์ดทั้งหมด _MAX_ เร็คคอร์ด)",
                    "sSearch": "ค้นหา :",
                    "aaSorting": [
                        [0, 'desc']
                    ],
                    "oPaginate": {
                        "sFirst": "หน้าแรก",
                        "sPrevious": "ก่อนหน้า",
                        "sNext": "ถัดไป",
                        "sLast": "หน้าสุดท้าย"
                    },
                }
            });
        });
    </script>
</body>

</html>