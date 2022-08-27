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
    <!-- plugin CSS Files -->
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

        <?php
        if (isset($_GET['cus_id'])) {
            echo '<script type="text/javascript">';
            echo 'alert("ทำการสมัครเสร็จสิ้น ดาวน์โหลดไฟล์ หรือแคปภาพหน้าจอเพื่อเป็นหลักฐานการสมัคร.");';
            echo '</script>';
            $cus_id = $_GET['cus_id'];
        ?>
            <!-- ======= Section ======= -->
            <section id="portfolio-details" class="portfolio-details">
                <div class="container">
                    <div class="section-title">
                        <h5>
                            <strong>สมัครเสร็จสิ้น โปรดเก็บหลักฐานการสมัครของท่าน</strong>
                        </h5>
                    </div>
                    <form action="" enctype="multipart/form-data" method="post">

                        <div class="row gy-4">
                            <div class="col-lg-12">
                                <div class="portfolio-info">
                                    <div class="card-body">
                                        <?php
                                        require_once __DIR__ . '/vendor/autoload.php';

                                        $defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
                                        $fontDirs = $defaultConfig['fontDir'];

                                        $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
                                        $fontData = $defaultFontConfig['fontdata'];

                                        $mpdf = new \Mpdf\Mpdf([
                                            'fontDir' => array_merge($fontDirs, [
                                                __DIR__ . '/tmp',
                                            ]),
                                            'fontdata' => $fontData + [
                                                'saraban' => [
                                                    'R' => 'NotoSansThai-Light.ttf',
                                                    'B' => 'NotoSansThai-Bold.ttf',
                                                ]
                                            ],
                                            'default_font' => 'saraban'
                                        ]);
                                        ob_start();
                                        ?>

                                        <?php
                                        $sql_customer = "SELECT db_customer.tb_customer_FisrtName,
                                                            db_customer.tb_customer_LastName,
                                                            db_customer.tb_customer_nickname,
                                                            db_customer.tb_customer_NameTeam,
                                                            db_customer.tb_customer_number,
                                                            db_customer.tb_customer_IDCard,
                                                            db_customer.tb_tag_ID,
                                                            db_profile_customer.tb_profilefile_name
                                                        FROM  db_customer
                                                        LEFT JOIN db_profile_customer ON db_customer.tb_tag_ID =  Db_profile_customer.tb_customer_id
                                                        WHERE db_customer.tb_customer_id = $cus_id";
                                        $sql_query = mysqli_query($conn, $sql_customer);
                                        while ($row_customer = mysqli_fetch_assoc($sql_query)) {
                                            $images_profile =  './assets/img/file_profile/' . $row_customer["tb_profilefile_name"];
                                        ?>
                                            <div class="row">
                                                <center>
                                                    <div class="col-6 mb-3">
                                                        <div class="form-group">
                                                            <!-- <label for="inputName">รหัสประจำตัว:</label> Mxxxx1 -->
                                                            <img class="img-fluid" src="<?php echo $images_profile; ?>" width="50%">
                                                        </div>
                                                    </div>
                                                </center>
                                                <center>
                                                    <div class="col-12 mb-3">
                                                        <ul>
                                                            <li><strong>รหัสประจำตัว   </strong>: <?php echo $row_customer['tb_tag_ID']; ?></li>
                                                            <li><strong>ชื่อ-นามสกุล   </strong>: <?php echo $row_customer['tb_customer_FisrtName']; ?> <?php echo $row_customer['tb_customer_LastName']; ?> </li>
                                                            <li><strong>ชื่อเล่น        </strong>: <?php echo $row_customer['tb_customer_nickname']; ?></li>
                                                            <li><strong>ชื่อแม่ทีม      </strong>: <?php echo $row_customer['tb_customer_NameTeam']; ?></li>
                                                            <li><strong>เบอร์โทรศัพท์  </strong>: <?php echo $row_customer['tb_customer_number']; ?></li>
                                                            <li><strong>เลขบัตรประชาชน</strong>: <?php echo $row_customer['tb_customer_IDCard'];  ?> </li>
                                                            <!-- <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li> -->
                                                        </ul>
                                                    </div>
                                                </center>
                                            <?php
                                        }
                                            ?>
                                            <!-- <div class="card-header mb-3">
                                        <h5 class="card-title text-light">อัปโหลด ภาพ/สำเนาบัตรประชาชน</h4>
                                    </div> -->
                                            <!--<div class="col-4 mb-3">
                                            <div class="form-group">
                                                 <label for="inputName">ภาพตัวอย่าง:</label> 
                                                <div class="fallback">
                                                    <img class="img-fluid" src="assets/img/example.jpg" width="75%">
                                                </div>
                                            </div>
                                        </div>-->
                                            </div>
                                            <?php
                                            $html = ob_get_contents();
                                            $mpdf->WriteHTML($html);
                                            $mpdf->Output("assets/PDF/regis_report.pdf");
                                            ob_end_flush()
                                            ?>
                                    </div>
                                    <center>
                                        <p>ดาวน์โหลดไฟล์ หรือแคปภาพหน้าจอเพื่อเป็นหลักฐานการสมัคร</p>
                                        <a type="button" href="assets/PDF/regis_report.pdf" class="btn btn-danger">ดาวน์โหลด</a>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        <?php
        }
        ?>
        <!-- End  Section -->

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
       let image =document.querySelector("#image");
       let previewImg =document.querySelector("#previewImg");

       image.onchange = evt =>{
        const [file] = image.files;
        if(file){
            previewImg.src = URL.createObjectURL(file);
        }
       }
    </script> -->
</body>

</html>