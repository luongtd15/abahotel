<div class="cr-main-content">
    <div class="container-fluid">
        <!-- Page title & breadcrumb -->
        <div class="cr-page-title cr-page-title-2">
            <div class="cr-breadcrumb">
                <h5 style="color: #ff4f7f">ABA HOTEL - RESERVATION'S DETAILS</h5>
                <ul>
                    <li><a href="<?= BASE_URL_ADMIN ?>">ABA Hotel</a></li>
                </ul>
            </div>
        </div>
        <style>
            .label {
                font-weight: bold;
            }
        </style>
        <div class="row">
            <div class="col-xxl-3 col-xl-4 col-md-12">
                <div class="vendor-sticky-bar">
                    <div class="col-xl-12">
                        <div class="cr-card">
                            <div class="cr-card-content">
                                <div class="cr-vendor-block-img">
                                    <div class="cr-vendor-block-detail">
                                        <div class="profile-img">
                                            <img class="v-img" src="<?= BASE_URL . $invoice->r_image ?>"
                                                alt="vendor image">
                                            <span class="tag-label online"></span>
                                        </div>
                                        <h5 class="name"><?= $invoice->r_name ?></h5>
                                        <p>( abalxrhotel@gmail.com )</p>
                                        <!-- <div class="cr-settings">
                                            <a href="?act=invoice-update&id=<?= $invoice->i_id ?>" class="cr-btn default-btn color-danger">Edit invoice</a>

                                        </div> -->
                                    </div>
                                    <div class="cr-vendor-info">
                                        <ul>
                                            <li><span class="label">Room Type :</span>&nbsp;
                                                <?= $invoice->t_name ?>
                                            </li>
                                            <li><span class="label">Number of beds:</span>&nbsp;
                                                <?= $invoice->t_number_of_beds ?>
                                            </li>
                                            <li><span class="label">Occupancy :</span>&nbsp;
                                                <?= $invoice->i_occupancy ?>
                                            </li>
                                            <!-- <li><span class="label">Check in:</span>&nbsp;
                                                <?= $invoice->i_checkin_date ?>
                                            </li>
                                            <li><span class="label">Check out :</span>&nbsp;
                                                <?= $invoice->i_checkout_date ?>
                                            </li> -->
                                            <li><span class="label">Status :</span>&nbsp;<?= $invoice->i_reservation_status ?></li>
                                            <li><span class="label">Price :</span>&nbsp;

                                                <?= $invoice->i_total_price ?>
                                                $
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-9 col-xl-8 col-md-12">

                <div class="cr-card vendor-profile">
                    <div class="cr-card-content vendor-details mb-m-30">
                        <?php if (isset($_SESSION['errs'])) : ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php foreach ($_SESSION['errs'] as $err) : ?>
                                        <li><?= $err ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <?php unset($_SESSION['errs']) ?>
                        <?php endif; ?>

                        <?php if (isset($_SESSION['success'])) : ?>
                            <div class="alert alert-success">
                                <?= $_SESSION['success'] ?>
                            </div>
                            <?php unset($_SESSION['success']) ?>
                        <?php endif; ?>
                        <form action="" method="post">
                            <div class="row">
                                <!-- <div class="col-sm-12">
                                    <div class="cr-vendor-detail">
                                        <p class="color-success">You can see details of this invoice below.
                                        </p>
                                    </div>
                                </div> -->

                                <div class="col-md-6 col-sm-12">
                                    <div class="cr-vendor-detail">
                                        <h6>Customer
                                            <span class="color-secondary">
                                                <?= $invoice->u_name ?>
                                            </span>
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="cr-vendor-detail">
                                        <h6>Check in date
                                            <span class="color-secondary">
                                                <?= $invoice->i_checkin_date ?>
                                            </span>
                                        </h6>

                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="cr-vendor-detail">
                                        <h6>Phone
                                            <span class="color-secondary">
                                                <?= $invoice->u_phone ?>
                                            </span>
                                        </h6>

                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="cr-vendor-detail">
                                        <h6>Check out date
                                            <span class="color-secondary">
                                                <?= $invoice->i_checkout_date ?>
                                            </span>
                                        </h6>

                                    </div>
                                </div>


                                <div class="col-md-6 col-sm-12">
                                    <div class="cr-vendor-detail">
                                        <h6 class="mb-3">Status</h6>
                                        <select name="reservation_status" id="reservation_status" class="form-control form-select">
                                            <option value="<?= PENDING ?>" <?= $reservation->reservation_status == PENDING ? 'selected' : '' ?>>
                                                <?= ucfirst(PENDING) ?>
                                            </option>
                                            <option value="<?= CONFIRM ?>" <?= $reservation->reservation_status == CONFIRM ? 'selected' : '' ?>>
                                                <?= ucfirst(CONFIRM) ?>
                                            </option>
                                            <option value="<?= CHECKIN ?>" <?= $reservation->reservation_status == CHECKIN ? 'selected' : '' ?>>
                                                <?= ucfirst(CHECKIN) ?>
                                            </option>
                                            <option value="<?= CHECKOUT ?>" <?= $reservation->reservation_status == CHECKOUT ? 'selected' : '' ?>>
                                                <?= ucfirst(CHECKOUT) ?>
                                            </option>
                                            <option value="<?= CANCEL ?>" <?= $reservation->reservation_status == CANCEL ? 'selected' : '' ?>>
                                                <?= ucfirst(CANCEL) ?>
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="cr-vendor-detail">
                                        <h6>Email
                                            <span class="color-secondary">
                                                <?= $invoice->u_email ?>
                                            </span>
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <button type="submit" class="cr-btn default-btn color-secondary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>