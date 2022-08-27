<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Medese Family - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="admin/dist/img/Medese_Family.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300&display=swap" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="assets/plugin/aos/aos.css" rel="stylesheet">
    <link href="assets/plugin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugin/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/plugin/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/plugin/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/plugin/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: BizLand - v3.7.0
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <?php include 'assets/layout/topbar.php' ?>
    <!-- ======= Top Bar ======= -->
    <main id="main">
        <!-- ======= Services Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">
                <div class="section-title">
                    <h5>
                        <strong>กรอกข้อมูลเพื่อเพิ่มข้อมูลของท่าน</strong>
                    </h5>
                </div>
                <?php
                if (isset($_SESSION['regis_medese'])) {
                    unset($_SESSION['regis_medese']);
                }
                // $row_id = mysqli_fetch_array($result);
                $che_id = mysqli_query($conn, "SELECT max(tb_customer_id) as maxid FROM db_customer") or die("ไม่มีข้อมูล");
                $Rid = mysqli_fetch_array($che_id);
                $id_max = str_pad(($Rid["maxid"] + 1), 6, "0", STR_PAD_LEFT);
                ?>
                <form action="admin/connect/insert_array.php" enctype="multipart/form-data" method="post">
                    <input type="hidden" id="Tag_id" name="Tag_id" class="form-control" value="<?php echo 'M' . $id_max; ?>">
                    <div class="row gy-4">
                        <div class="col-lg-12">
                            <div class="portfolio-info">
                                <div class="card-body">
                                    <div class="card-header mb-3" id="card-header">
                                        <h5 class="card-title text-light">ข้อมูลส่วนตัว</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 mb-3">
                                            <div class="form-group">
                                                <label for="inputName">ชื่อ:</label>
                                                <input type="text" id="FisrtName" name="FisrtName" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <div class="form-group">
                                                <label for="inputName">นามสกุล:</label>
                                                <input type="text" id="LastName" name="LastName" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <div class="form-group">
                                                <label for="inputName">ชื่อเล่น:</label>
                                                <input type="text" id="LastName" name="NickName" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <div class="form-group">
                                                <label for="inputName">ชื่อแม่ทีม (หากมี):</label>
                                                <input type="text" id="NameTeam" name="NameTeam" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-6  mb-3">
                                            <div class="form-group">
                                                <label for="inputName">เบอร์โทรศัพท์:</label>
                                                <input type="text" id="Phone_Number" name="Phone_Number" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-6  mb-3">
                                            <div class="form-group">
                                                <label for="inputName">เลขบัตรประชาชน:</label>
                                                <input type="text" id="ID_Card" name="ID_Card" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-header mb-3">
                                        <h5 class="card-title text-light">ที่อยู่</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-12  mb-3">
                                            <div class="form-group">
                                                <label for="inputName">ที่อยู่ตามบัตรประชาชน:</label>
                                                <textarea class="form-control" id="Address_IDCard" name="Address_IDCard" rows="3" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12  mb-3">
                                            <div class="form-group">
                                                <label for="inputName">ที่อยู่ปัจจุบันในการติดต่อ:</label>
                                                <textarea class="form-control" id="AddressCall" name="AddressCall" rows="3" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-header mb-3">
                                        <h5 class="card-title text-light">อัพโหลดรูปภาพตนเอง</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-12  mb-3">
                                            <div class="form-group">
                                                <label for="inputName" class="custom-file-label">อัปโหลดไฟล์:</label>
                                                <div class="fallback">
                                                    <input name="image_profile[]" id="image_profile" accept="image/*" type="file" class="form-control" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-header mb-3">
                                        <h5 class="card-title text-light">อัพโหลดรูปภาพ บัตรประชาชน พร้อมเซ็นสำเนาถูกต้อง</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-6  mb-3">
                                            <div class="form-group">
                                                <!-- <label for="inputName">ภาพตัวอย่าง:</label> -->
                                                <div class="fallback">
                                                    <img class="img-fluid" src="assets/img/บัตรประชาชน-01_0.png" width="75%" id="previewImg">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12  mb-3">
                                            <div class="form-group">
                                                <label for="inputName" class="custom-file-label">อัปโหลดไฟล์:</label>
                                                <div class="fallback">
                                                    <input name="image_IdCard[]" id="image_IdCard" accept="image/*" type="file" class="form-control" required  />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-success" name="add_regis" style="float: right;">ถัดไป</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section><!-- End Portfolio Details Section -->
        <!-- End Services Section -->
    </main>
    <!-- End #main -->


    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/plugin/purecounter/purecounter.js"></script>
    <script src="assets/plugin/aos/aos.js"></script>
    <script src="assets/plugin/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/plugin/glightbox/js/glightbox.min.js"></script>
    <script src="assets/plugin/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/plugin/swiper/swiper-bundle.min.js"></script>
    <script src="assets/plugin/waypoints/noframework.waypoints.js"></script>
    <script src="assets/plugin/php-email-form/validate.js"></script>
    <script src="assets/plugin/inputmask/jquery.inputmask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <!-- <script type="text/javascript">
        let image = document.querySelector("#image");
        let previewImg = document.querySelector("#previewImg");

        image.onchange = evt => {
            const [file] = image.files;
            if (file) {
                previewImg.src = URL.createObjectURL(file);
            }
        }
    </script> -->
</body>

</html>