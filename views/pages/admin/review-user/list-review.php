<?php

session_start();

require("../../../../functions/functions.php");
require("../../../../actions/list-review.php");
require("../../../../constants/path.php");

if (!isUserLogin()) {
    header("Location: ../admin/login.php");
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>BRODO | Admin Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport"/>
    <link rel="icon" href="../../../../assets/admin/img/kaiadmin/favicon.ico" type="image/x-icon"/>

    <!-- Fonts and icons -->
    <script src="../../../../assets/admin/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {families: ["Public Sans:300,400,500,600,700"]},
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["../../../../assets/admin/css/fonts.min.css"],
            },
            active: function () {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="../../../../assets/admin/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../../../../assets/admin/css/plugins.min.css"/>
    <link rel="stylesheet" href="../../../../assets/admin/css/kaiadmin.min.css"/>

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="../../../../assets/admin/css/demo.css"/>
</head>
<body>

<div class="wrapper">
    <!-- Sidebar -->
    <?php include('../../../parts/dashboard-admin/sidebar.php'); ?>
    <!-- End Sidebar -->

    <div class="main-panel">

        <?php include('../../../parts/dashboard-admin/main-header.php'); ?>


        <?php include('../../../parts/review-user/list-review-content.php'); ?>


        <?php include('../../../parts/dashboard-admin/footer.php'); ?>
    </div>
</div>


<!--   Core JS Files   -->
<script src="../../../../assets/admin/js/core/jquery-3.7.1.min.js"></script>
<script src="../../../../assets/admin/js/core/popper.min.js"></script>
<script src="../../../../assets/admin/js/core/bootstrap.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="../../../../assets/admin/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

<!-- Chart JS -->
<script src="../../../../assets/admin/js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="../../../../assets/admin/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="../../../../assets/admin/js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="../../../../assets/admin/js/plugin/datatables/datatables.min.js"></script>

<!-- Bootstrap Notify -->
<script src="../../../../assets/admin/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

<!-- jQuery Vector Maps -->
<script src="../../../../assets/admin/js/plugin/jsvectormap/jsvectormap.min.js"></script>
<script src="../../../../assets/admin/js/plugin/jsvectormap/world.js"></script>

<!-- Google Maps Plugin -->
<script src="../../../../assets/admin/js/plugin/gmaps/gmaps.js"></script>

<!-- Sweet Alert -->
<script src="../../../../assets/admin/js/plugin/sweetalert/sweetalert.min.js"></script>

<!-- Kaiadmin JS -->
<script src="../../../../assets/admin/js/kaiadmin.min.js"></script>

</body>
</html>
