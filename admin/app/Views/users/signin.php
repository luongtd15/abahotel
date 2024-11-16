<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from maraviyainfotech.com/projects/carrot/carrot-v21/carrot-html/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 15:30:26 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="ecommerce, market, shop, mart, cart, deal, multipurpose, marketplace">
    <meta name="description" content="Carrot - Multipurpose eCommerce HTML Template.">
    <meta name="author" content="ashishmaraviya">

    <title>Carrot - Multipurpose eCommerce HTML Template</title>

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

    <!-- Loader -->
    <div id="cr-overlay">
        <span class="loader"></span>
    </div>

    <!-- Header -->

    <!-- Breadcrumb -->

    <!-- Login -->
    <section class="section-login padding-tb-100">
        <div class="container">

            <div class="row d-none">
                <div class="col-lg-12">
                    <div class="mb-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                        <div class="cr-banner">
                            <h2>Login</h2>
                        </div>
                        <div class="cr-banner-sub-title">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore lacus vel facilisis. </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">


                <div class="col-12">
                    <div class="cr-login">
                        <?php if (isset($_SESSION['err'])) : ?>
                            <div class="alert alert-danger">
                                <?= $_SESSION['err'] ?>
                            </div>
                            <?php unset($_SESSION['err']) ?>
                        <?php endif; ?>
                        <div class="form-logo">
                            <img src="<?= BASE_URL ?>assets/client/assets/img/logo/logo.png" alt="logo">
                        </div>
                        <form class="cr-content-form" method="post">

                            <div class="form-group">
                                <label>Email Address*</label>
                                <input type="text" placeholder="Enter Your Email" class="cr-form-control" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>">
                            </div>

                            <div class="form-group">
                                <label>Password*</label>
                                <input type="password" placeholder="Enter Your Password" class="cr-form-control" name="password">
                            </div>

                            <!-- <div class="remember">
                                <span class="form-group custom">
                                    <input type="checkbox" id="html">
                                    <label for="html">Remember Me</label>
                                </span>
                                <a class="link" href="forgot.html">Forgot Password?</a>
                            </div><br> -->

                            <div class="login-buttons">
                                <button type="submit" class="cr-button">Login</button>
                                <!-- <a href="register.html" class="link">
                                    Signup?
                                </a> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->


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


<!-- Mirrored from maraviyainfotech.com/projects/carrot/carrot-v21/carrot-html/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 15:30:27 GMT -->

</html>