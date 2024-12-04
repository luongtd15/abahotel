<div class="cr-main-content">
    <div class="container-fluid">
        <!-- Page title & breadcrumb -->
        <div class="cr-page-title">
            <div class="cr-breadcrumb">
                <h5>ABA Hotel</h5>
                <ul>
                    <li><a href="index.html">ABA Hotel</a></li>
                    <li>Statistical data</li>
                </ul>
            </div>
            <div class="cr-tools">
                <div id="pagedate">
                    <div class="cr-date-range" title="Date">
                        <span></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="row">

                    

                    <div class="col-xl-4 col-md-6">
                        <div class="cr-card">
                            <div class="cr-card-content label-card">
                                <div class="title">
                                    <span class="icon icon-2"><i class="ri-archive-drawer-line"></i></span>
                                    <div class="growth-numbers">
                                        <h4>Room Types</h4>
                                        <h5><?= $room_types ?></h5>
                                    </div>
                                </div>
                                <!-- <p class="card-groth down">
                                    <i class="ri-arrow-down-line"></i>
                                    1.7%
                                    <span>Last Month</span>
                                </p> -->
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-6">
                        <div class="cr-card">
                            <div class="cr-card-content label-card">
                                <div class="title">
                                    <span class="icon icon-3"><i class="ri-ancient-gate-line"></i></span>
                                    <div class="growth-numbers">
                                        <h4>Available Room</h4>
                                        <h5><?= $availableRooms ?></h5>
                                    </div>
                                </div>
                                <!-- <p class="card-groth down">
                                    <i class="ri-arrow-down-line"></i>
                                    3.8%
                                    <span>Last Month</span>
                                </p> -->
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-6">
                        <div class="cr-card">
                            <div class="cr-card-content label-card">
                                <div class="title">
                                    <span class="icon icon-4"><i class="ri-ancient-pavilion-line"></i></span>
                                    <div class="growth-numbers">
                                        <h4>Occupied Room</h4>
                                        <h5><?= $occupiedRooms ?></h5>
                                    </div>
                                </div>
                                <!-- <p class="card-groth up">
                                    <i class="ri-arrow-up-line"></i>
                                    8%
                                    <span>Last Month</span>
                                </p> -->
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-6">
                        <div class="cr-card">
                            <div class="cr-card-content label-card">
                                <div class="title">
                                    <span class="icon icon-1"><i class="ri-shield-user-line"></i></span>
                                    <div class="growth-numbers">
                                        <h4>Customers</h4>
                                        <h5><?= $customers ?></h5>
                                    </div>
                                </div>
                                <!-- <p class="card-groth up">
                                    <i class="ri-arrow-up-line"></i>
                                    32%
                                    <span>Last Month</span>
                                </p> -->
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-6">
                        <div class="cr-card">
                            <div class="cr-card-content label-card">
                                <div class="title">
                                    <span class="icon icon-5"><i class="ri-stack-line"></i></span>
                                    <div class="growth-numbers">
                                        <h4>Feedbacks</h4>
                                        <h5><?= $feedbacks ?></h5>
                                    </div>
                                </div>
                                <!-- <p class="card-groth up">
                                    <i class="ri-arrow-up-line"></i>
                                    32%
                                    <span>Last Month</span>
                                </p> -->
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-6">
                        <div class="cr-card">
                            <div class="cr-card-content label-card">
                                <div class="title">
                                    <span class="icon icon-6"><i class="ri-history-line"></i></span>
                                    <div class="growth-numbers">
                                        <h4>Reservations</h4>
                                        <h5><?= $invoices ?></h5>
                                    </div>
                                </div>
                                <!-- <p class="card-groth up">
                                    <i class="ri-arrow-up-line"></i>
                                    32%
                                    <span>Last Month</span>
                                </p> -->
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>



        <!-- best seller -->
        <div class="row">
            <div class="col-xxl-6 col-xl-12">
                <div class="cr-card" id="best_seller_tbl">
                    <div class="cr-card-header">
                        <h4 class="cr-card-title">Available Room</h4>
                        <div class="header-tools">
                            <a href="javascript:void(0)" class="m-r-10 cr-full-card" title="Full Screen"><i
                                    class="ri-fullscreen-line"></i></a>
                            <div class="cr-date-range dots">
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <div class="cr-card-content card-default">
                        <div class="best-seller-table">
                            <div class="table-responsive">
                                <table id="best_seller_data_table" class="table">
                                    <thead>
                                        <tr>
                                            <th>Room</th>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($availableRoom as $room): ?>
                                            <tr>
                                                <td><img class="cat-thumb" src="<?= BASE_URL . $room->r_image ?>"
                                                        alt="clients Image">
                                                </td>
                                                <td>
                                                    <span class="cat">
                                                        <?= $room->r_name ?>
                                                    </span>
                                                </td>
                                                <td><?= $room->t_name ?></td>
                                                <td>
                                                    <?= $room->r_status == 'available' ?
                                                        '<span class="color-secondary">available</span>' :
                                                        '<span class="color-primary">occupied</span>' ?>
                                                </td>
                                            </tr>

                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-6 col-xl-12">
                <div class="cr-card" id="top_product_tbl">
                    <div class="cr-card-header">
                        <h4 class="cr-card-title">Occupied Room</h4>
                        <div class="header-tools">
                            <a href="javascript:void(0)" class="m-r-10 cr-full-card" title="Full Screen"><i
                                    class="ri-fullscreen-line"></i></a>
                            <div class="cr-date-range dots">
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <div class="cr-card-content card-default">
                        <div class="top-product-table">
                            <div class="table-responsive">
                                <table id="top_product_data_table" class="table">
                                    <thead>
                                        <tr>
                                            <th>Room</th>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($occupiedRoom as $room): ?>
                                            <tr>
                                                <td><img class="cat-thumb" src="<?= BASE_URL . $room->r_image ?>"
                                                        alt="clients Image">
                                                </td>
                                                <td>
                                                    <span class="cat">
                                                        <?= $room->r_name ?>
                                                    </span>
                                                </td>
                                                <td><?= $room->t_name ?></td>
                                                <td>
                                                    <?= $room->r_status == 'available' ?
                                                        '<span class="color-secondary">available</span>' :
                                                        '<span class="color-primary">occupied</span>' ?>
                                                </td>
                                            </tr>

                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Reservations -->
        <div class="row">
            <div class="col-xxl-12 col-xl-12">
                <div class="cr-card" id="ordertbl">
                    <div class="cr-card-header">
                        <h4 class="cr-card-title">Recent Reservations</h4>
                        <div class="header-tools">
                            <a href="javascript:void(0)" class="m-r-10 cr-full-card" title="Full Screen"><i
                                    class="ri-fullscreen-line"></i></a>
                            <div class="cr-date-range dots">
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <div class="cr-card-content card-default">
                        <div class="order-table">
                            <div class="table-responsive">
                                <table id="recent_order_data_table" class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Room</th>
                                            <th>Name</th>
                                            <th>Customer</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Since</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($recentReservations as $reservation): ?>
                                            <tr>
                                                <td class="token"><?= $reservation->i_id ?></td>
                                                <td><img class="cat-thumb" src="<?= BASE_URL . $reservation->r_image ?>"
                                                        alt="clients Image">
                                                </td>
                                                <td>
                                                    <span class="name"><?= $reservation->r_name ?></span>
                                                </td>
                                                <td><?= $reservation->u_name ?></td>
                                                <td><?= $reservation->i_total_price ?>$</td>
                                                <td>
                                                    <?php
                                                    if (isset($reservation->i_reservation_status)) {
                                                        if ($reservation->i_reservation_status == PENDING) {
                                                            echo "<span class='color-warning'>Pending</span>";
                                                        } elseif ($reservation->i_reservation_status == CONFIRM) {
                                                            echo "<span class='color-success'>Confirmed</span>";
                                                        } elseif ($reservation->i_reservation_status == CHECKIN) {
                                                            echo "<span class='color-info'>Checked in</span>";
                                                        } elseif ($reservation->i_reservation_status == CHECKOUT) {
                                                            echo "<span class='color-danger'>Checked out</span>";
                                                        } else {
                                                            echo "<span class='color-secondary'>Cancelled</span>";
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td><?= $reservation->i_created_at ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>