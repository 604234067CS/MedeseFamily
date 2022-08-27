<?php
session_start();
session_regenerate_id(true);
require_once 'admin/connect/connect_db.php';
?>
<!-- ======= Top Bar ======= -->
<section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
            <a>Medese Family </a>
            <i class="bi bi-phone d-flex align-items-center ms-4"><span>+66 095 545 4599</span></i>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
            <a href="https://www.facebook.com/medesefamily/" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/medesefamily/" class=""><i class="bi bi-instagram"></i></a>
            <a>
                <div class="line-it-button" data-lang="th" data-type="friend" data-env="REAL" data-count="true" data-home="true" data-lineId="@Medesefamily" style="display: none;"></div>
                <script src="https://www.line-website.com/social-plugins/js/thirdparty/loader.min.js" async="async" defer="defer"></script>
                <!-- <div class="line-it-button" data-lang="th" data-type="friend" data-env="REAL" data-count="true" data-home="true" 00000000data-lineId="@linemyshop" style="display: none;"></div>
                <script src="https://www.line-website.com/social-plugins/js/thirdparty/loader.min.js" async="async" defer="defer"></script> -->
            </a>
        </div>
    </div>
</section>

<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <h1>
            <a href="index.php">
                <img src="assets/img/logo_Medese_family.png" class="img-fluid" alt="logo Medese Family" width="120">
                <span>.</span>
            </a>
        </h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->
    </div>
</header>
<!-- End Header -->