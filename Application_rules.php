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

        <!-- =======  Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">
                <div class="section-title">
                    <h5>
                        <strong>สัญญาคู่ค้าในการจำหน่ายสินค้า</strong>
                        <h6>บริษัท Medese Family จำกัด</h6>
                    </h5>
                </div>

                <form action="admin/connect/insertdata_all.php" enctype="multipart/form-data" method="POST">
                    <?php
                    if (isset($_SESSION['regis_medese'])) {
                        // unset($_SESSION['regis_medese']);
                        foreach ($_SESSION['regis_medese'] as $key => $row_regis_medese) {
                            $FisrtName =  $row_regis_medese['FisrtName'];
                            $LastName = $row_regis_medese['LastName'];
                            $NickName = $row_regis_medese['NickName'];
                            $NameTeam = $row_regis_medese['NameTeam'];
                            $Phone_Number = $row_regis_medese['Phone_Number'];
                            $ID_Card = $row_regis_medese['ID_Card'];
                            $Address_IDCard = $row_regis_medese['Address_IDCard'];
                            $AddressCall = $row_regis_medese['AddressCall'];
                            $new_name_profile = $row_regis_medese['new_name_profile'];
                            $imgs_IdCard = $row_regis_medese['imgs_IdCard'];
                            $Tag_id = $row_regis_medese['Tag_id'];
                        }
                    }
                    ?>
                    <input type="hidden" name="FisrtName" class="form-control" value="<?php echo $FisrtName ?>">
                    <input type="hidden" name="LastName" class="form-control" value="<?php echo $LastName ?>">
                    <input type="hidden" name="NickName" class="form-control" value="<?php echo $NickName ?>">
                    <input type="hidden" name="NameTeam" class="form-control" value="<?php echo $NameTeam ?>">
                    <input type="hidden" name="Phone_Number" class="form-control" value="<?php echo $Phone_Number ?>">
                    <input type="hidden" name="ID_Card" class="form-control" value="<?php echo $ID_Card ?>">
                    <input type="hidden" name="Address_IDCard" class="form-control" value="<?php echo $Address_IDCard ?>">
                    <input type="hidden" name="AddressCall" class="form-control" value="<?php echo $AddressCall ?>">
                    <input type="hidden" name="imgs_IdCard" class="form-control" value="<?php echo $imgs_IdCard ?>">
                    <input type="hidden" name="new_name_profile" class="form-control" value="<?php echo $new_name_profile ?>">
                    <input type="hidden" name="Tag_id" class="form-control" value="<?php echo $Tag_id ?>">


                    <div class="row gy-4">
                        <div class="col-lg-12">
                            <div class="portfolio-info">
                                <div class="card-body">
                                    <div class="row">
                                        <strong>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; บริษัท Medese Family จำกัด กำหนดคู่สัญญาระหว่างบริษัทฯและคู่ค้า เพื่อเป็นข้อตกลงที่เข้าใจตรงกันดังนี้
                                        </strong>
                                        <p>
                                            1.การเป็นคู่ค้าในการจำหน่าย (คู่ค้าหมายถึง หัวหน้าทีม หรือหัวหน้าสายงาน และหมายความรวมถึงลูกทีม ในการจำหน่ายผลิตภัณฑ์ของบริษัท Medese Family จำกัด)
                                            <br /> &nbsp;
                                            <span>
                                                1.1คู่ค้าตกลงจำหน่ายสินค้าทุกชนิด ภายใต้แบรนด์ของบริษัทฯ ตามราคาที่บริษัทกำหนดเท่านั้น โดยบริษัทมีการออกบัตรแสดงการเป็นตัวแทนขายสินค้าให้กับคู่ค้า
                                            </span>
                                        </p>
                                        <p>
                                            2. เงื่อนไขการเป็นคู่ค้าในการจำหน่าย
                                            <br /> &nbsp;&nbsp;&nbsp;
                                            <span>
                                                2.1 ห้ามคู่ค้าจำหน่าย สั่ง หรือเบิกสินค้า จากหัวหน้าทีมคู่ค้าทีมอื่น ที่ไม่ใช่สายงานของตัวเองโดยเด็ดขาดรวมถึงผู้ที่มีตำแหน่งหัวหน้าทีมคู่ค้าห้ามขายสินค้าให้ลูกทีมของสายงานอื่นโดยเด็ดขาดเช่นกัน
                                            </span> <br />&nbsp;&nbsp;&nbsp;

                                            <span>
                                                2.2 ห้ามคู่ค้าย้ายทีมหรือเปลี่ยนหัวหน้าทีมคู่ค้า หากมีเหตุจำเป็น ต้องแจ้งให้บริษัท เป็นผู้พิจารณาเท่านั้น
                                            </span><br /> &nbsp;&nbsp;&nbsp;

                                            <span>
                                                2.3 ห้ามคู่ค้า และหัวหน้าทีมคู่ค้าจำหน่ายสินค้าราคาส่ง และราคาปลีก ที่ต่ำกว่าราคาที่บริษัทกำหนดไว้เด็ดขาด
                                                เพื่อป้องกันความเสียหายจากการขายตัดราคา อันเป็นเหตุให้คู่ค้ารายอื่นเกิดความเสียหาย และบริษัทเกิดผลกระทบในการดำเนินธุรกิจ
                                                ซึ่งถือเป็นสาระสำคัญในการเป็นคู่ค้าจำหน่ายสินค้า
                                            </span><br /> &nbsp;&nbsp;&nbsp;

                                            <span>
                                                2.4 ห้ามคู่ค้า หัวหน้าทีมคู่ค้า จำหน่ายโดยจัดโปรโมชั่น ลด แลก แจก แถม ให้แก่ลูกค้าเอง เว้นแต่โปรโมชั่นที่ทางบริษัทจัดขึ้นเท่านั้น
                                            </span><br /> &nbsp;&nbsp;&nbsp;

                                            <span>
                                                2.5 ห้ามคู่ค้าจำหน่ายสินค้าในช่องทางจัดจำหน่ายบน Marketplace ทุกช่องทาง เช่น Lazada Shopee หรืออื่น ๆ ในทำนองเดียวกันโดยเด็ดขาด
                                            </span><br /> &nbsp;&nbsp;&nbsp;

                                            <span>
                                                2.6 ห้ามคู่ค้า ปลอมแปลง เลียนแบบ ทำซ้ำ หรือแปรสภาพของสินค้า หรือบรรจุในบรรจุภัณฑ์ที่ไม่ใช่ของบริษัทฯ โดยเด็ดขาด
                                            </span><br /> &nbsp;&nbsp;&nbsp;

                                            <span>
                                                2.7 ห้ามคู่ค้าจำหน่ายสินค้าที่หมดอายุโดยเด็ดขาด
                                            </span><br /> &nbsp;&nbsp;&nbsp;
                                            <span>
                                                2.8 ห้ามคู่ค้าจำหน่ายสินค้าโดยใช้ชื่อร้านช่องทางจำหน่ายของตนเอง ซึ่งส่อให้ลูกค้าเข้าใจว่าเป็นของบริษัทโดยเด็ดขาด
                                            </span><br /> &nbsp;&nbsp;&nbsp;
                                            <span>
                                                2.9 ห้ามคู่ค้าโฆษณาขายสินค้าอวดอ้างเกินจริง หรือไม่เป็นไปตามที่กฎหมายกำหนดเด็ดขาด
                                            </span><br /> &nbsp;&nbsp;&nbsp;
                                            <span>
                                                2.10 ห้ามคู่ค้ากระทำการใด ๆ รวมถึงพฤติกรรมที่ทำให้บริษัทฯ หัวหน้าทีมคู่ค้า หรือคู่ค้าคนอื่นได้รับความเสียหายโดยเด็ดขาด
                                            </span><br /> &nbsp;&nbsp;&nbsp;
                                            <span>
                                                2.11 ห้ามคู่ค้าเปลี่ยน หรือคืนสินค้าให้กับบริษัทฯ เว้นแต่สินค้ามีปัญหาอันเกิดจากการผลิตของบริษัทฯ เอง
                                                โดยต้องแจ้งให้ทราบภายใน 7 วัน นับตั้งแต่วันที่ได้รับสินค้าดังกล่าว </span>
                                        </p>
                                        <p>
                                            3. การกระทำที่เป็นการผิดสัญญาคู่ค้าในการจำหน่าย
                                            หากคู่ค้าฝ่าฝืนหรือกระทำผิดเงื่อนไขการเป็นคู่ค้าที่กำหนดไว้สัญญาฉบับนี้ข้อใดข้อหนึ่ง
                                            หรือหลายข้อรวมกัน บริษัทจะถือว่า เป็นการทำผิดสัญญา การเป็นคู่ค้าในการจำหน่าย
                                            บริษัทมีสิทธิยกเลิกการเป็นคู่ค้าจำหน่ายได้ทันทีโดยไม่ต้องบอกกล่าวให้ทราบล่วงหน้า
                                        </p>
                                        <p>
                                            4.ผลจากการผิดสัญญาคู่ค้าในการจำหน่าย
                                            <br /> &nbsp;&nbsp;&nbsp;
                                            <span>
                                                4.1 ในกรณีที่คู่ค้าพ้นจากการเป็นคู่ค้าแล้ว หากบริษัทพบว่าคู่ค้ามีการแอบอ้างจำหน่ายสินค้าในฐานะคู่ค้าของบริษัทฯ
                                                บริษัทจะถือว่าเป็นการละเมิดสิทธิในการจำหน่ายสินค้า ซึ่งมีสิทธิเรียกร้อง ฟ้องร้อง หรือสามารถดำเนินคดีทั้งทางแพ่ง
                                                และทางอาญากับคู่ค้าได้ทั้งสิ้น
                                            </span> <br /> &nbsp;&nbsp;&nbsp;

                                            <span>
                                                4.2 ในกรณีที่คู่ค้าพ้นจากการเป็นคู่ค้าในการจำหน่ายสินค้าแล้ว
                                                คู่ค้าต้องตกลงยินยอมให้บริษัทเผยแพร่เอกสารยกเลิกการเป็นคู่ค้าในการจำหน่ายโดยยินยอมให้ลงประกาศในพื้นที่ใด ๆ
                                                หรือลงในกลุ่มช่องทางจำหน่ายได้ทันที ได้ทุกช่องทางสื่อ โดยคู่ค้าไม่มีสิทธิดำเนินการฟ้องร้อง
                                                หรือดำเนินคดีกับบริษัท ไม่ว่าทางแพ่ง หรือทางอาญาทั้งสิ้น และไม่ถือเป็นการละเมิดสิทธิของคู่ค้า
                                                เพราะบริษัทมีความจำเป็นต้องลงประกาศให้ทราบโดยทั่วกัน เพื่อป้องกันความเสียหายและชื่อเสียงของบริษัท
                                            </span><br /> &nbsp;&nbsp;&nbsp;

                                            <span>
                                                4.3 คู่ค้าที่ได้รับการรับรองจากบริษัทให้เป็นตำแหน่ง Executive Distributor
                                                ขึ้นไป หากท่านได้มีการขายสินค้าแบรนด์อื่นเพิ่ม บริษัทขอพิจารณาสิทธิการท่องเที่ยว
                                                การแลกของรางวัล และเงินรางวัลค่าตำแหน่ง
                                            </span><br /> &nbsp;&nbsp;&nbsp;

                                            <span>
                                                4.4 หากคู่ค้ามีการชักชวนตัวแทน ทั้งของทีมตัวเองและทีมอื่น ไปขายสินค้าแบรนด์อื่น บริษัทมีสิทธิยกเลิกในการเป็นคู่ค้าทันที
                                            </span><br /> &nbsp;&nbsp;&nbsp;

                                            <span>
                                                4.5 ในกรณีที่คู่ค้าฝ่าฝืน หรือกระทำผิดเงื่อนไข การเป็นคู่ค้าในการจำหน่ายที่กำหนดไว้ในสัญญาฉบับนี้ ข้อใดข้อหนึ่งหรือหลายข้อรวมกัน
                                                คู่ค้าต้องเสียค่าปรับให้แก่บริษัท เป็นเงินจำนวน 300,000 บาท (สามแสนบาท)
                                                และบริษัทมีสิทธิฟ้องร้องดำเนินคดีกับคู่ค้าทั้งทางแพ่งและทางอาญาแล้วแต่กรณีของความผิดตามกฎหมายและความเสียหายอื่น ๆ
                                                ที่เกิดขึ้นกับบริษัทฯ โดยคู่ค้าต้องรับผิดชอบค่าใช้จ่ายในการทวงถาม ค่าธรรมเนียมศาล ค่าทนายความ
                                                และค่าใช้จ่ายอื่นใด ที่เกิดขึ้นจากการฝ่าฝืน หรือจากการที่บริษัทฯ ดำเนินการฟ้องร้องดำเนินคดีต่อศาล
                                                พร้อมด้วยดอกเบี้ยอัตราร้อยละ 15 ต่อปี นับแต่วันผิดสัญญา
                                            </span><br /> &nbsp;&nbsp;&nbsp;

                                            <span>
                                                4.6 ในกรณีที่คู่ค้าฝ่าฝืน หรือกระทำผิดเงื่อนไข การเป็นคู่ค้าที่กำหนดไว้ในสัญญาฉบับนี้
                                                ไม่ถือว่าบริษัทมีส่วนรู้เห็นในการกระทำดังกล่าว และจะไม่รับผิดชอบต่อความเสียหายใด ๆ
                                                ที่อาจเกิดขึ้น โดยตัวคู่ค้าต้องเป็นผู้รับผิดต่อบุคคลที่ได้รับความเสียหายเองโดยตรงแต่เพียงผู้เดียว
                                            </span>
                                        </p>

                                        <p>
                                            5. ข้อตกลงอื่น ๆ
                                            <span><br /> &nbsp;&nbsp;&nbsp;
                                                5.1 ในกรณีที่คู่ค้าจำหน่ายสินค้าของบริษัทให้บุคคลอื่นนำสินค้าของบริษัทไปจำหน่ายต่ำกว่าราคาที่บริษัทกำหนดไว้คู่ค้าต้องรับผิดชอบค่าเสียหายให้แก่บริษัท
                                                เป็นจำนวนเงิน 300,000 บาท (สามแสนบาท) และดำเนินคดี
                                            </span>
                                        </p>
                                        <center>
                                            <div class="container mt-3">
                                                <!-- <button type="button" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#demo">Simple collapsible</button> -->
                                                <input type="checkbox" name="accepttos" id="accepttos" class="form-check-input accepttos" data-bs-toggle="collapse" data-bs-target="#demo">
                                                &nbsp; <strong>ฉันได้อ่านเข้าใจและยอมรับใน ข้อตกลงและเงื่อนไขทั้งหมด</strong>
                                                <br />
                                                <div id="demo" class="collapse">
                                                    <button type="submit" class="btn btn-success" name="add_regis_medese">ถัดไป</button>
                                                    <a type="button" href="index.php" class="btn btn-danger">ยกเลิก</a>
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </section>

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

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script type="text/javascript">
        $(function checkform() {
            with(frm) {
                if (accepttos.checked == true) {
                    continue_bt.disabled == false;
                } else {
                    continue_bt.disabled == true;
                }
            }
        });
    </script>
</body>

</html>