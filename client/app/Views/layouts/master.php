
<!-----------------------------------------------------------------------------------
    Item Name: Carrot - Multipurpose eCommerce HTML Template.
    Author: ashishmaraviya
    Version: 2.1
    Copyright 2024
----------------------------------------------------------------------------------->
<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from maraviyainfotech.com/projects/carrot/carrot-v21/client-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 15:41:02 GMT -->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="client, dashboard, ecommerce, panel" />
	<meta name="description" content="Carrot - client.">
	<meta name="author" content="ashishmaraviya">

	<title>Carrot</title>

	<!-- App favicon -->
    <link rel="shortcut icon" href="<?= BASE_URL ?>assets/client/assets/img/logo/favicon.png">

    <!-- Icon CSS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/client/assets/css/vendor/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/client/assets/css/vendor/remixicon.css">

    <!-- Vendor -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/client/assets/css/vendor/animate.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/client/assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/client/assets/css/vendor/aos.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/client/assets/css/vendor/range-slider.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/client/assets/css/vendor/swiper-bundle.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/client/assets/css/vendor/jquery.slick.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/client/assets/css/vendor/slick-theme.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/client/assets/css/style.css">

</head>

<body>
	<main class="wrapper sb-default ecom">
		<!-- Loader -->
		<div id="cr-overlay">
			<div class="loader"></div>
		</div>



		<!-- Header -->
		<?php require_once PATH_VIEW . "layouts/partials/topBar.php" ?>

		<!-- sidebar -->

		<!-- Notify sidebar -->


		<!-- Main content -->
		<?php require_once PATH_VIEW . $view . ".php"; ?>


		<!-- Footer -->
		<?php require_once PATH_VIEW . "layouts/partials/footer.php" ?>
		<?php require_once PATH_VIEW . "layouts/partials/tabToTop.php" ?>
		<?php require_once PATH_VIEW . "layouts/partials/cart.php" ?>
		<?php require_once PATH_VIEW . "layouts/partials/sideTool.php" ?>
		<?php require_once PATH_VIEW . "layouts/partials/model.php" ?>


	</main>

	<script src="<?= BASE_URL ?>assets/client/assets/js/vendor/jquery-3.6.4.min.js"></script>
    <script src="<?= BASE_URL ?>assets/client/assets/js/vendor/jquery.zoom.min.js"></script>
    <script src="<?= BASE_URL ?>assets/client/assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="<?= BASE_URL ?>assets/client/assets/js/vendor/mixitup.min.js"></script>

    <script src="<?= BASE_URL ?>assets/client/assets/js/vendor/range-slider.js"></script>
    <script src="<?= BASE_URL ?>assets/client/assets/js/vendor/aos.min.js"></script>
    <script src="<?= BASE_URL ?>assets/client/assets/js/vendor/swiper-bundle.min.js"></script>
    <script src="<?= BASE_URL ?>assets/client/assets/js/vendor/slick.min.js"></script>

    <!-- Main Custom -->
    <script src="<?= BASE_URL ?>assets/client/assets/js/main.js"></script>
</body>


<!-- Mirrored from maraviyainfotech.com/projects/carrot/carrot-v21/client-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 15:41:34 GMT -->

</html>