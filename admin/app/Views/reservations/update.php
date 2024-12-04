<div class="cr-main-content">
    <div class="container-fluid">
        <!-- Page title & breadcrumb -->
        <div class="cr-page-title cr-page-title-2">
            <div class="cr-breadcrumb">
                <h5 style="color: #ff4f7f">ABA HOTEL - RESERVATION DETAIL</h5>
                <ul>
                    <li><a href="<?= BASE_URL_ADMIN ?>">ABA Hotel</a></li>
                </ul>
            </div>

        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="cr-card card-default">
                    <div class="cr-card-content">
                        <div class="row cr-product-uploads">
                            <!-- <div class="col-lg-4 mb-991">
                                <div class="cr-vendor-img-upload">

                                </div>
                            </div> -->

                            <div class="col-lg-12">
                                <div class="cr-vendor-upload-detail">
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

                                    <form class="row g-3" method="post" enctype="multipart/form-data">
                                        <!-- Input Room Name -->
                                        <div class="col-md-6">
                                            <label for="id_room" class="form-label">Room Name</label>
                                            <?php foreach ($rooms as $room): ?>
                                                <?php if ($room->id == $reservation->id_room): ?>
                                                    <input class="form-control" name="type" id="type" type="text"
                                                        value="<?= $room->name ?>" disabled>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>

                                        <!-- Select Room Type -->
                                        <div class="col-md-6">
                                            <label class="form-label" for="type">Room Type</label>
                                            <?php foreach ($rooms as $room): ?>
                                                <?php foreach ($roomTypes as $roomType): ?>
                                                    <?php if ($room->id == $reservation->id_room && $roomType->id == $room->id_room_type): ?>
                                                        <input class="form-control" name="type" id="type" type="text"
                                                            value="<?= $roomType->name ?>" disabled>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php endforeach; ?>
                                        </div>

                                        <!-- Upload room image -->
                                        <div class="col-md-6">
                                            <label for="id_user" class="form-label">Customer</label>
                                            <?php foreach ($users as $user): ?>
                                                <?php if ($user->id == $reservation->id_user): ?>
                                                    <input class="form-control" name="type" id="type" type="text"
                                                        value="<?= $user->name ?>" disabled>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="phone" class="form-label">Customer Phone Number</label>
                                            <?php foreach ($users as $user): ?>
                                                <?php if ($user->id == $reservation->id_user): ?>
                                                    <input class="form-control" name="type" id="type" type="text"
                                                        value="<?= $user->phone ?>" disabled>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="occupancy" class="form-label">Occupancy</label>
                                            <input type="number" class="form-control" id="occupancy" name="occupancy" value="<?= $reservation->occupancy ?>" disabled>
                                        </div>

                                        <!-- Select status -->
                                        <div class="col-md-6">
                                            <label for="reservation_status" class="form-label">Reservation Status</label>
                                            <select name="reservation_status" id="reservation_status" class="form-control form-select">
                                                <option <?= $reservation->reservation_status == PENDING ? 'selected' : null ?> value="<?= PENDING ?>"><?= ucfirst(PENDING) ?></option>
                                                <option <?= $reservation->reservation_status == CONFIRM ? 'selected' : null ?> value="<?= CONFIRM ?>"><?= ucfirst(CONFIRM) ?></option>
                                                <option <?= $reservation->reservation_status == CHECKIN ? 'selected' : null ?> value="<?= CHECKIN ?>"><?= ucfirst(CHECKIN) ?></option>
                                                <option <?= $reservation->reservation_status == CHECKOUT ? 'selected' : null ?> value="<?= CHECKOUT ?>"><?= ucfirst(CHECKOUT) ?></option>
                                                <option <?= $reservation->reservation_status == CANCEL ? 'selected' : null ?> value="<?= CANCEL ?>"><?= ucfirst(CANCEL) ?></option>
                                            </select>
                                        </div>

                                        <!-- Input Description -->
                                        <div class="col-md-6">
                                            <label for="checkin_date" class="form-label">Check In Date</label>
                                            <input type="datetime" class="form-control" id="checkin_date" name="checkin_date" value="<?= $reservation->checkin_date ?>" disabled>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="checkout_date" class="form-label">Check Out Date</label>
                                            <input type="datetime" class="form-control" id="checkout_date" name="checkout_date" value="<?= $reservation->checkout_date ?>" disabled>
                                        </div>

                                        <!-- <div class="col-md-6">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="password" name="password">
                                        </div> -->

                                        <!-- Submit -->
                                        <div class="col-md-12">
                                            <button type="submit" class="cr-btn default-btn color-success">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>