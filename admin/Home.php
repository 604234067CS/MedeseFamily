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
                                        ข้อมูลผู้สมัครการขาย 
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body pad">
                                    <?php

                                    $customer_sql = "SELECT * FROM db_customer";
                                    $customer_query = mysqli_query($conn, $customer_sql);
                                    if (mysqli_num_rows($customer_query) > 0) {
                                    ?>
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
                                                while ($row = mysqli_fetch_assoc($customer_query)) {
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
                                                    </td>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
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