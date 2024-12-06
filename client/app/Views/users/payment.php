<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from maraviyainfotech.com/projects/carrot/carrot-v21/carrot-html/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 15:30:26 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="ecommerce, market, shop, mart, cart, deal, multipurpose, marketplace">
    <meta name="description" content="Carrot - Multipurpose eCommerce HTML Template.">
    <meta name="author" content="ashishmaraviya">

    <title>Pay</title>

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

<body class="body-bg-6">

    <!-- Checkout section -->
    <section class="cr-checkout-section padding-tb-50">
        <div class="container">
            <div class="row">
                <!-- Sidebar Area Start -->
                <div class="cr-checkout-rightside col-lg-4 col-md-12">
                    <div class="cr-sidebar-wrap">
                        <!-- Sidebar Summary Block -->
                        <div class="cr-sidebar-block">
                            <div class="cr-sb-title">
                                <h3 class="cr-sidebar-title">Summary</h3>
                            </div>
                            <div class="cr-sb-block-content">
                                <div class="cr-checkout-summary">
                                    <div>
                                        <span class="text-left">Check In</span>
                                        <span class="text-right"><?= $reservation->i_checkin_date ?></span>
                                    </div>
                                    <div>
                                        <span class="text-left">Check Out</span>
                                        <span class="text-right"><?= $reservation->i_checkout_date ?></span>
                                    </div>
                                    <div>
                                        <span class="text-left">Days</span>
                                        <span class="text-right">
                                            <?php
                                            $reservation->i_checkin_date = new DateTime($reservation->i_checkin_date);
                                            $reservation->i_checkout_date = new DateTime($reservation->i_checkout_date);
                                            $interval = $reservation->i_checkin_date->diff($reservation->i_checkout_date);
                                            $days = $interval->days;
                                            echo $days;
                                            ?>
                                        </span>
                                    </div>
                                    <div class="cr-checkout-summary-total">
                                        <span class="text-left">Total Price</span>
                                        <span class="text-right text-danger"><?= $reservation->i_total_price ?>$</span>
                                    </div>
                                </div>
                                <div class="cr-checkout-pro">
                                    <div class="col-sm-12 mb-6">
                                        <div class="cr-product-inner">
                                            <div class="cr-pro-image-outer">
                                                <div class="cr-pro-image">
                                                    <a href="product-left-sidebar.html" class="image">
                                                        <img class="main-image" src="<?= BASE_URL . $reservation->r_image ?>"
                                                            alt="Product">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="cr-pro-content cr-product-details">
                                                <h5 class="cr-pro-title">
                                                    <a href=""><?= $reservation->r_name ?></a>
                                                </h5>
                                                <div class="cr-pro-rating">
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-line"></i>
                                                </div>
                                                <p class="cr-price">Price:
                                                    <span class="new-price"><?= $reservation->t_price ?>$</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <!-- Sidebar Summary Block -->
                    </div>
                    <div class="cr-sidebar-wrap cr-checkout-pay-wrap">
                        <!-- Sidebar Payment Block -->
                        <div class="cr-sidebar-block">
                            <div class="cr-sb-title">
                                <h3 class="cr-sidebar-title">Scan this QR code</h3>
                            </div>
                            <div class="cr-sb-block-content">
                                <div class="cr-checkout-pay" style="margin-top: 20px;">
                                    <img src="<?= BASE_URL ?>uploads/qr.jpg" alt="QR Code" style="max-width: 200px; width: 100%; height: auto; border: 1px solid #ccc; border-radius: 10px;">
                                </div>
                            </div>
                        </div>
                        <!-- Sidebar Payment Block -->
                    </div>
                </div>

                <div class="cr-checkout-leftside col-lg-8 col-md-12 m-t-991">
                    <!-- checkout content Start -->
                    <div class="cr-checkout-content">
                        <div class="cr-checkout-inner">
                            <div class="cr-checkout-wrap">
                                <div class="cr-checkout-block cr-check-bill">
                                    <h3 class="cr-checkout-title">Billing Details</h3>
                                    <div class="cr-bl-block-content">
                                        <div class="cr-check-bill-form mb-minus-24">
                                            <form action="" method="post">
                                                <span class="cr-bill-wrap cr-bill-half">
                                                    <div class="form-group">
                                                        <label for="firstname">User Name:</label>
                                                        <input type="text" name="firstname" id="firstname" value="<?= htmlspecialchars($reservation->u_name) ?>" disabled>
                                                    </div>
                                                </span>
                                                <span class="cr-bill-wrap cr-bill-half">
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="text" name="email" id="email" value="<?= htmlspecialchars($reservation->u_email) ?>" disabled>
                                                    </div>
                                                </span>
                                                <span class="cr-bill-wrap cr-bill-half">
                                                    <div class="form-group">
                                                        <label for="phone">Phone</label>
                                                        <input type="text" name="phone" id="phone" value="<?= htmlspecialchars($reservation->u_phone) ?>" disabled>
                                                    </div>
                                                </span>
                                                <span class="cr-bill-wrap cr-bill-half">
                                                    <div class="form-group">
                                                        <label for="Occupancy">Occupancy</label>
                                                        <input type="text" name="Occupancy" id="Occupancy" value="<?= htmlspecialchars($reservation->i_occupancy) ?>" disabled>
                                                    </div>
                                                </span>
                                                <span class="cr-bill-wrap cr-bill-half">
                                                    <div class="form-group">
                                                        <label for="Beds">Beds</label>
                                                        <input type="text" name="Beds" id="Beds" value="<?= htmlspecialchars($reservation->t_number_of_beds) ?>" disabled>
                                                    </div>
                                                </span>
                                                <span class="cr-bill-wrap cr-bill-half">
                                                    <span class="cr-check-order-btn">
                                                        <a href="?act=status-change&id=<?= $reservation->i_id ?>" class="cr-button mt-30">Done</a>
                                                    </span>
                                                </span>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--cart content End -->
                </div>
            </div>
        </div>
    </section>
    <!-- Checkout section End -->


    <!-- Side-tool -->
    <div class="cr-tool-overlay"></div>
    <div class="cr-tool">
        <div class="cr-tool-btn">
            <a href="javascript:void(0)" class="btn-cr-tool result-placeholder">
                <i class="ri-settings-line"></i>
            </a>
            <div class="color-variant">
                <div class="cr-bar-title">
                    <h6>Tools</h6>
                    <a href="javascript:void(0)" class="close-tools">
                        <i class="ri-close-line"></i>
                    </a>
                </div>
                <div class="cr-tools-detail">
                    <div class="heading">
                        <h2>Select Color</h2>
                    </div>
                    <ul class="cr-color">
                        <li class="colors c1 active-colors">
                        </li>
                        <li class="colors c2">
                        </li>
                        <li class="colors c3">
                        </li>
                        <li class="colors c4">
                        </li>
                        <li class="colors c5">
                        </li>
                        <li class="colors c6">
                        </li>
                        <li class="colors c7">
                        </li>
                        <li class="colors c8">
                        </li>
                        <li class="colors c9">
                        </li>
                        <li class="colors c10">
                        </li>
                    </ul>
                </div>
                <div class="cr-tools-detail">
                    <div class="heading">
                        <h2>Dark mode</h2>
                    </div>
                    <ul class="dark-mode">
                        <li class="dark">
                        </li>
                        <li class="white active-dark-mode">
                        </li>
                    </ul>
                </div>
                <div class="cr-tools-detail">
                    <div class="heading">
                        <h2>RTL mode</h2>
                    </div>
                    <ul class="rtl-mode">
                        <li class="rtl">
                            <img src="<?= BASE_URL ?>assets/client/assets/img/tool/rtl.png" alt="rtl">
                        </li>
                        <li class="ltr active-rtl-mode">
                            <img src="<?= BASE_URL ?>assets/client/assets/img/tool/ltr.png" alt="ltr">
                        </li>
                    </ul>
                </div>
                <div class="cr-tools-detail">
                    <div class="heading">
                        <h2>Backgrounds</h2>
                    </div>
                    <ul class="bg-panel">
                        <li class="bg-1">
                            <img src="<?= BASE_URL ?>assets/client/assets/img/shape/bg-shape-1.png" alt="bg-shape-1">
                        </li>
                        <li class="bg-2">
                            <img src="<?= BASE_URL ?>assets/client/assets/img/shape/bg-shape-2.png" alt="bg-shape-2">
                        </li>
                        <li class="bg-3">
                            <img src="<?= BASE_URL ?>assets/client/assets/img/shape/bg-shape-3.png" alt="bg-shape-3">
                        </li>
                        <li class="bg-4">
                            <img src="<?= BASE_URL ?>assets/client/assets/img/shape/bg-shape-4.png" alt="bg-shape-4">
                        </li>
                        <li class="bg-5">
                            <img src="<?= BASE_URL ?>assets/client/assets/img/shape/bg-shape-5.png" alt="bg-shape-5">
                        </li>
                        <li class="bg-6 active-bg-panel">
                            <img src="<?= BASE_URL ?>assets/client/assets/img/shape/bg-shape-6.png" alt="bg-shape-6">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor Custom -->
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


<!-- Mirrored from maraviyainfotech.com/projects/carrot/carrot-v21/carrot-html/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 15:30:26 GMT -->

</html>