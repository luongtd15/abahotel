
<section class="section-register padding-tb-100">
        <div class="container">
            <div class="row d-none">
                <div class="col-lg-12">
                    <div class="mb-30" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                        <div class="cr-banner">
                            <h2>Register</h2>
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
                    <div class="cr-register" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                        <div class="form-logo">
                            <img src="<?= BASE_URL ?>assets/client/assets/img/logo/logo.png" alt="logo">
                        </div>
                        <form class="cr-content-form" method="POST" action="<?= BASE_URL . '?act=register' ?>">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label> Name*</label>
                                        <input  type="text" placeholder="Enter Your  Name" class="cr-form-control" name="name"value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Age*</label>
                                        <input  type="number" placeholder="Enter Your age" class="cr-form-control" name="age" value="<?php echo isset($_POST['age']) ? $_POST['age'] : ''; ?>">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Email*</label>
                                        <input  type="email" placeholder="Enter Your email" class="cr-form-control" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" >
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Password*</label>
                                        <input  type="password" placeholder="Enter Your pass" class="cr-form-control" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>" >
                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Phone Number*</label>
                                        <input  type="number" placeholder="Enter Your phone number"
                                            class="cr-form-control"name="phone" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : ''; ?>">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Address*</label>
                                        <input  type="text" placeholder="Address" class="cr-form-control"name="address"value="<?php echo isset($_POST['address']) ? $_POST['address'] : ''; ?>">
                                    </div>
                                </div>
                               
                                
                              
                                
                                <div class="cr-register-buttons">
                                    <button type="submit" class="cr-button" name="register"value="1">Register</button>
                                    <a href="login.html" class="link">
                                        Have an account?
                                    </a>
                                </div>
                            </div>
                         
                         
<!-- register.php -->
<?php if (!empty($thongBaoLoi)): ?>
    <div class="alert alert-danger">
        <?php echo $thongBaoLoi; ?>
    </div>
<?php endif; ?>

<?php if (!empty($thongBaoThanhCong)): ?>
    <div class="alert alert-success">
        <?php echo $thongBaoThanhCong; ?>
    </div>
<?php endif; ?>






                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
