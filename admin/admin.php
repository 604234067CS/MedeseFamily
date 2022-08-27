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
    <title>Medese Family | Admin</title>
    <link rel="icon" type="image/png" sizes="16x16" href="dist/img/Medese_Family.png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300&display=swap" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- <link rel="stylesheet" href="plugins/datatables-bs4/dataTables.bootstrap4.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
                                        จัดการข้อมูลแอดมิน
                                    </h3>
                                    <!-- tools box -->
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool bg-gradient-warning btn-sm" data-toggle="modal" data-target="#modal-lg">
                                            <i class="fas fa-pencil-alt"></i>เพิ่มข้อมูล
                                        </button>
                                    </div>
                                    <!-- /. tools -->
                                </div>
                                <!-- /.card-header -->

                                <div class="card-body pad">
                                    <?php
                                    $admin_sql = "SELECT * FROM db_admin";
                                    $admin_query = mysqli_query($conn, $admin_sql);
                                    if (mysqli_num_rows($admin_query) > 0) {
                                    ?>
                                        <table id="example" class="table table-bordered table-striped table-sm table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">ลำดับ</th>
                                                    <th class="text-center">ชื่อผู้ใช้</th>
                                                    <th class="text-center">username</th>
                                                    <th class="text-center">รหัสผ่าน</th>
                                                    <th class="text-center">action</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            while ($row = mysqli_fetch_assoc($admin_query)) {
                                            ?>
                                                <tbody class="text-center">
                                                    <tr>
                                                        <td class="text-center"><?php echo $row['tb_admin_id'] ?></td>
                                                        <td class="text-center"><?php echo $row['tb_nickname'] ?></td>
                                                        <td class="text-center"><?php echo $row['tb_username'] ?></td>
                                                        <td class="text-center"><?php echo $row['tb_password'] ?></td>
                                                        <td>
                                                            <button type="button" class="btn btn-sdp-tb btn-sm btn-default btn-outline-secondary" data-toggle="modal" data-target="#modal-lg3<?php echo $row['tb_admin_id'] ?>">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </button>
                                                            <?php
                                                            if ($row['tb_admin_id'] == 1) {
                                                            ?>
                                                            <?php
                                                            } elseif ($row['tb_admin_id'] !== 1) {
                                                            ?>
                                                                <button type="button" class="btn btn-sdp-danger btn-sm btn-outline-danger btn-outline-danger" onclick="delete_admin(<?php echo $row['tb_admin_id']; ?>)">
                                                                    <i class="far fa-trash-alt"></i>
                                                                </button>

                                                            <?php
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                </tbody>

                                                <!-- /.เพิ่มข้อมูล -->
                                                <div class="modal fade" id="modal-lg3<?php echo $row['tb_admin_id'] ?>">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">แก้ไขข้อมูล</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="connect/update_admin.php" enctype="multipart/form-data" method="POST">
                                                                <div class="modal-body">
                                                                    <input type="hidden" class="form-control" name="update_id" value="<?php echo $row['tb_admin_id'] ?>">

                                                                    <div class="form-group row">
                                                                        <label for="example-text-input" class="col-sm-2 col-form-label">ชื่อ:</label>
                                                                        <div class="col-sm-10">
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" name="name" value="<?php echo $row['tb_nickname'] ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="example-text-input" class="col-sm-2 col-form-label">ชื่อผู้ใช้:</label>
                                                                        <div class="col-sm-10">
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" name="username" value="<?php echo $row['tb_username'] ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="example-text-input" class="col-sm-2 col-form-label">รหัสผ่าน:</label>
                                                                        <div class="col-sm-10">
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" name="password" value="<?php echo $row['tb_password'] ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">ออก</button>
                                                                    <button type="submit" class="btn btn-success" name="update_admin">บันทึก</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->

                                                <!-- /.เพิ่มข้อมูล -->
                                                <!-- <div class="modal fade" id="modal-lg2<?php echo $row['tb_admin_id'] ?>">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">ตรวจสอบข้อมูล</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group row">
                                                                    <label for="example-text-input" class="col-sm-2 col-form-label">ชื่อ:</label>
                                                                    <div class="col-sm-10">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" name="name" value="<?php echo $row['tb_nickname'] ?>" readonly>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="example-text-input" class="col-sm-2 col-form-label">ชื่อผู้ใช้:</label>
                                                                    <div class="col-sm-10">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" name="username" value="<?php echo $row['tb_username'] ?>" readonly>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="example-text-input" class="col-sm-2 col-form-label">รหัสผ่าน:</label>
                                                                    <div class="col-sm-10">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" name="password" value="<?php echo $row['tb_password'] ?>" readonly>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">ออก</button>
                                                                <button type="button" class="btn btn-success">บันทึก</button>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                </div> --> 
                                                <!-- /.modal -->
                                            <?php

                                            }
                                            ?>
                                        </table>
                                    <?php
                                    } else {
                                        echo '<div class="text-danger">ไม่มีข้อมูลในตาราง</div>';
                                    }
                                    ?>
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
        </div>
        <!-- /.content-wrapper -->

        <!-- /.เพิ่มข้อมูล -->
        <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">เพิ่มข้อมูล</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="connect/insert_admin.php" enctype="multipart/form-data" method="POST">
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">ชื่อ:</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">ชื่อผู้ใช้:</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="username">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">รหัสผ่าน:</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="password">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">แอดมิน:</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="mySwitch" name="admin_head" value="yes" checked>
                                            <label class="form-check-label" for="mySwitch">แอดมินหลัก</label> &nbsp;
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">ออก</button>
                            <button type="submit" class="btn btn-success" name="insert_admin">บันทึก</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->



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
    <!-- Bootstrap Switch -->
    <script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard3.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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

        function delete_admin(_delid) {
            if (confirm("คุณต้องการที่จะลบหรือไม่?")) {
                window.location.href = 'connect/delete_admin.php?Del_id=' + _delid + '';
                return true;
            }
        }
    </script>
</body>

</html>