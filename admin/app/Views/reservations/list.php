<div class="cr-main-content">
    <div class="container-fluid">
        <!-- Page title & breadcrumb -->
        <div class="cr-page-title cr-page-title-2">
            <div class="cr-breadcrumb">
                <h5 style="color: #ff4f7f">ABA HOTEL - RESERVATIONS</h5>
                <ul>
                    <li><a href="<?= BASE_URL_ADMIN ?>">ABA Hotel</a></li>
                    <li>Reservations</li>
                </ul>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="cr-card" id="ordertbl">
                    <div class="cr-card-header">
                        <h4 class="cr-card-title">Reservations</h4>
                        <div class="header-tools">
                            <a href="javascript:void(0)" class="m-r-10 cr-full-card"><i
                                    class="ri-fullscreen-line"></i></a>
                            <div class="cr-date-range dots">
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <div class="cr-card-content card-default">
                        <div class="order-table">
                            <div class="table-responsive">
                                <?php if (isset($_SESSION['errs'])) : ?>
                                    <div class="alert alert-danger">
                                        <ul>
                                            <li><?= $_SESSION['errs'] ?></li>
                                        </ul>
                                    </div>
                                    <?php unset($_SESSION['errs']) ?>
                                <?php endif; ?>
                                <table id="recent_order" class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Room</th>
                                            <th>Room Type</th>
                                            <th>Customer</th>
                                            <th>Phone</th>
                                            <th>Occupancy</th>
                                            <th>Status</th>
                                            <th>Check in</th>
                                            <th>Check out</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($invoices as $invoice): ?>
                                            <tr>
                                                <td class="token"><?= $invoice->i_id ?></td>
                                                <td>
                                                    <div>
                                                        <a class="dropdown-item text-info" href="?act=invoice-detail&id=<?= $invoice->i_id ?>">
                                                            <img class="cat-thumb" src='<?= BASE_URL . $invoice->r_image ?>' alt="Room Image">
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="color-secondary">
                                                        <?= $invoice->t_name ?>
                                                    </span>
                                                </td>
                                                <td><?= $invoice->u_name ?></td>
                                                <td><?= $invoice->u_phone ?></td>
                                                <td><?= $invoice->i_occupancy ?></td>
                                                <td>
                                                    <?php
                                                    if (isset($invoice->i_reservation_status)) {
                                                        if ($invoice->i_reservation_status == PENDING) {
                                                            echo "<span class='color-warning'>Pending</span>";
                                                        } elseif ($invoice->i_reservation_status == CONFIRM) {
                                                            echo "<span class='color-success'>Confirmed</span>";
                                                        } elseif ($invoice->i_reservation_status == CHECKIN) {
                                                            echo "<span class='color-info'>Checked in</span>";
                                                        } elseif ($invoice->i_reservation_status == CHECKOUT) {
                                                            echo "<span class='color-danger'>Checked out</span>";
                                                        } else {
                                                            echo "<span class='color-secondary'>Cancelled</span>";
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td><?= $invoice->i_checkin_date ?></td>
                                                <td><?= $invoice->i_checkout_date ?>
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
    </div>
</div>