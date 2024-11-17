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
                <div class="cr-login" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                    <div class="form-logo">
                        <img src="assets/img/logo/logo.png" alt="logo">
                    </div>
                    <form class="cr-content-form" method="POST" action="<?= BASE_URL . '?act=checklogin' ?>">
                        <div class="form-group">
                            <label>Email Address*</label>
                            <input type="email" placeholder="Enter Your Email" class="cr-form-control" name="email" value="Thao@gmail.com">
                        </div>
                        <div class="form-group">
                            <label>Password*</label>
                            <input type="password" placeholder="Enter Your password" class="cr-form-control" name="password" value="123456">
                        </div>
                        <div class="remember">
                            <span class="form-group custom">
                                <input type="checkbox" id="html">
                                <label for="html">Remember Me</label>
                            </span>
                            <a class="link" href="forgot.html">Forgot Password?</a>
                        </div><br>
                        <div class="login-buttons">
                            <button type="submit" class="cr-button" name="login" value="1">Login</button>
                            <a href="register.html" class="link">
                                Signup?
                            </a>
                        </div>


                    </form>
                    <?php
                    // Kiểm tra nếu có thông báo lỗi từ session
                    if (isset($_SESSION['error'])) {
                        echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
                        unset($_SESSION['error']); // Xóa thông báo lỗi sau khi đã hiển thị
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>