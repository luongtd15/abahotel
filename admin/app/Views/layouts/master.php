<!-----------------------------------------------------------------------------------
    Item Name: Carrot - Multipurpose eCommerce HTML Template.
    Author: ashishmaraviya
    Version: 2.1
    Copyright 2024
----------------------------------------------------------------------------------->
<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from maraviyainfotech.com/projects/carrot/carrot-v21/admin-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 15:41:02 GMT -->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="admin, dashboard, ecommerce, panel" />
	<meta name="description" content="Carrot - Admin.">
	<meta name="author" content="ashishmaraviya">

	<title>Carrot - Admin.</title>

	<!-- App favicon -->
	<link rel="shortcut icon" href="<?= BASE_URL ?>assets/admin/assets/img/favicon/favicon.ico">

	<!-- Icon CSS -->
	<link href="<?= BASE_URL ?>assets/admin/assets/css/vendor/materialdesignicons.min.css" rel="stylesheet">
	<link href="<?= BASE_URL ?>assets/admin/assets/css/vendor/remixicon.css" rel="stylesheet">
	<link href="<?= BASE_URL ?>assets/admin/assets/css/vendor/owl.carousel.min.css" rel="stylesheet">

	<!-- Vendor CSS -->
	<link href='<?= BASE_URL ?>assets/admin/assets/css/vendor/datatables.bootstrap5.min.css' rel='stylesheet'>
	<link href='<?= BASE_URL ?>assets/admin/assets/css/vendor/responsive.datatables.min.css' rel='stylesheet'>
	<link href='<?= BASE_URL ?>assets/admin/assets/css/vendor/daterangepicker.css' rel='stylesheet'>
	<link href="<?= BASE_URL ?>assets/admin/assets/css/vendor/simplebar.css" rel="stylesheet">
	<link href="<?= BASE_URL ?>assets/admin/assets/css/vendor/bootstrap.min.css" rel="stylesheet">
	<link href="<?= BASE_URL ?>assets/admin/assets/css/vendor/apexcharts.css" rel="stylesheet">
	<link href="<?= BASE_URL ?>assets/admin/assets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet">

	<!-- Main CSS -->
	<link id="main-css" href="<?= BASE_URL ?>assets/admin/assets/css/style.css" rel="stylesheet">

</head>

<body>
	<main class="wrapper sb-default ecom">
		<!-- Loader -->
		<div id="cr-overlay">
			<div class="loader"></div>
		</div>



		<!-- Header -->
		<?php require_once PATH_VIEW_ADMIN . "layouts/partials/topBar.php" ?>

		<!-- sidebar -->
		<?php require_once PATH_VIEW_ADMIN . "layouts/partials/sideBar.php" ?>

		<!-- Notify sidebar -->


		<!-- Main content -->
		<?php require_once PATH_VIEW_ADMIN . $view . ".php"; ?>


		<!-- Footer -->
		<?php require_once PATH_VIEW_ADMIN . "layouts/partials/footer.php" ?>

		<!-- Feature tools -->
		<div class="cr-tools-sidebar-overlay"></div>
		<div class="cr-tools-sidebar">
			<a href="javascript:void(0)" class="cr-tools-sidebar-toggle in-out">
				<i class="ri-settings-4-line"></i>
			</a>
			<div class="cr-bar-title">
				<h6>Tools</h6>
				<a href="javascript:void(0)" class="close-tools"><i class="ri-close-line"></i></a>
			</div>
			<div class="cr-tools-detail">
				<div class="cr-tools-block">
					<h3>Sidebar</h3>
					<div class="cr-tools-info">
						<div class="cr-tools-item sidebar active" data-sidebar-mode-tool="light">
							<img src="<?= BASE_URL ?>assets/admin/assets/img/tools/side-light.png" alt="light">
							<p>light</p>
						</div>
						<div class="cr-tools-item sidebar" data-sidebar-mode-tool="dark">
							<img src="<?= BASE_URL ?>assets/admin/assets/img/tools/side-dark.png" alt="dark">
							<p>dark</p>
						</div>
						<div class="cr-tools-item sidebar" data-sidebar-mode-tool="bg-1">
							<img src="<?= BASE_URL ?>assets/admin/assets/img/tools/side-bg-1.png" alt="background">
							<p>Bg-1</p>
						</div>
						<div class="cr-tools-item sidebar" data-sidebar-mode-tool="bg-2">
							<img src="<?= BASE_URL ?>assets/admin/assets/img/tools/side-bg-2.png" alt="background">
							<p>Bg-2</p>
						</div>
						<div class="cr-tools-item sidebar" data-sidebar-mode-tool="bg-3">
							<img src="<?= BASE_URL ?>assets/admin/assets/img/tools/side-bg-3.png" alt="background">
							<p>Bg-3</p>
						</div>
						<div class="cr-tools-item sidebar" data-sidebar-mode-tool="bg-4">
							<img src="<?= BASE_URL ?>assets/admin/assets/img/tools/side-bg-4.png" alt="background">
							<p>Bg-4</p>
						</div>
					</div>
				</div>
				<div class="cr-tools-block">
					<h3>Header</h3>
					<div class="cr-tools-info">
						<div class="cr-tools-item header active" data-header-mode="light">
							<img src="<?= BASE_URL ?>assets/admin/assets/img/tools/header-light.png" alt="light">
							<p>light</p>
						</div>
						<div class="cr-tools-item header" data-header-mode="dark">
							<img src="<?= BASE_URL ?>assets/admin/assets/img/tools/header-dark.png" alt="dark">
							<p>dark</p>
						</div>
					</div>
				</div>
				<div class="cr-tools-block">
					<h3>Backgrounds</h3>
					<div class="cr-tools-info">
						<div class="cr-tools-item bg active" data-bg-mode="default">
							<img src="<?= BASE_URL ?>assets/admin/assets/img/tools/bg-0.png" alt="default">
							<p>Default</p>
						</div>
						<div class="cr-tools-item bg" data-bg-mode="bg-1">
							<img src="<?= BASE_URL ?>assets/admin/assets/img/tools/bg-1.png" alt="bg-1">
							<p>Bg-1</p>
						</div>
						<div class="cr-tools-item bg" data-bg-mode="bg-2">
							<img src="<?= BASE_URL ?>assets/admin/assets/img/tools/bg-2.png" alt="bg-2">
							<p>Bg-2</p>
						</div>
						<div class="cr-tools-item bg" data-bg-mode="bg-3">
							<img src="<?= BASE_URL ?>assets/admin/assets/img/tools/bg-3.png" alt="bg-3">
							<p>Bg-3</p>
						</div>
						<div class="cr-tools-item bg" data-bg-mode="bg-4">
							<img src="<?= BASE_URL ?>assets/admin/assets/img/tools/bg-4.png" alt="bg-4">
							<p>Bg-4</p>
						</div>
						<div class="cr-tools-item bg" data-bg-mode="bg-5">
							<img src="<?= BASE_URL ?>assets/admin/assets/img/tools/bg-5.png" alt="bg-5">
							<p>Bg-5</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

	<!-- Vendor Custom -->
	<script src="<?= BASE_URL ?>assets/admin/assets/js/vendor/jquery-3.6.4.min.js"></script>
	<script src="<?= BASE_URL ?>assets/admin/assets/js/vendor/simplebar.min.js"></script>
	<script src="<?= BASE_URL ?>assets/admin/assets/js/vendor/bootstrap.bundle.min.js"></script>
	<script src="<?= BASE_URL ?>assets/admin/assets/js/vendor/apexcharts.min.js"></script>
	<script src="<?= BASE_URL ?>assets/admin/assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="<?= BASE_URL ?>assets/admin/assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
	<script src="<?= BASE_URL ?>assets/admin/assets/js/vendor/owl.carousel.min.js"></script>
	<!-- Data Tables -->
	<script src='<?= BASE_URL ?>assets/admin/assets/js/vendor/jquery.datatables.min.js'></script>
	<script src='<?= BASE_URL ?>assets/admin/assets/js/vendor/datatables.bootstrap5.min.js'></script>
	<script src='<?= BASE_URL ?>assets/admin/assets/js/vendor/datatables.responsive.min.js'></script>
	<!-- Caleddar -->
	<script src="<?= BASE_URL ?>assets/admin/assets/js/vendor/jquery.simple-calendar.js"></script>
	<!-- Date Range Picker -->
	<script src="<?= BASE_URL ?>assets/admin/assets/js/vendor/moment.min.js"></script>
	<script src="<?= BASE_URL ?>assets/admin/assets/js/vendor/daterangepicker.js"></script>
	<script src="<?= BASE_URL ?>assets/admin/assets/js/vendor/date-range.js"></script>

	<!-- Main Custom -->
	<script src="<?= BASE_URL ?>assets/admin/assets/js/main.js"></script>
	<script src="<?= BASE_URL ?>assets/admin/assets/js/data/ecommerce-chart-data.js"></script>
</body>


<!-- Mirrored from maraviyainfotech.com/projects/carrot/carrot-v21/admin-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 15:41:34 GMT -->

</html>