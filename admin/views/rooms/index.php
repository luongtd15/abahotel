<div class="cr-main-content">
    <div class="container-fluid">
        <!-- Page title & breadcrumb -->
        <div class="cr-page-title cr-page-title-2">
            <div class="cr-breadcrumb">
                <h5 class="text-danger">ABA HOTEL - ROOMS</h5>
                <a href="?act=room-create">Create a new room</a>
                <ul>
                    <li><a href="<?= BASE_URL_ADMIN ?>">ABA Hotel</a></li>
                    <li>Rooms</li>
                </ul>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="cr-card card-default product-list">
                    <div class="cr-card-content ">
                        <div class="table-responsive">
                            <table id="product_list" class="table table-stripedr" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Room</th>
                                        <th>Name</th>
                                        <th>Room Type</th>
                                        <th>Numer of beds</th>
                                        <th>Max Occupancy</th>
                                        <th>Status</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($rooms as $room):  ?>
                                        <tr>
                                            <td><img class="tbl-thumb" src=''
                                                    alt="Product Image"></td>
                                            <td><?= $room['r_name'] ?></td>
                                            <td><?= $room['t_name'] ?></td>
                                            <td><?= $room['t_number_of_beds'] ?></td>
                                            <td><?= $room['t_max_occupancy'] ?></td>
                                            <td><?= $room['r_status'] ?></td>
                                            <td><?= $room['r_description'] ?></td>
                                            <td><span class="active"><?= $room['t_price'] ?>$</span></td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <button type="button"
                                                        class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false" data-display="static">
                                                        <span class="sr-only"><i
                                                                class="ri-settings-3-line"></i></span>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item text-info" href="?act=room-detail&id=<?= $room['r_id_room'] ?>">Details</a>
                                                        <a class="dropdown-item text-warning" href="">Edit</a>
                                                        <a class="dropdown-item text-body-tertiary" href="#">Delete</a>
                                                    </div>
                                                </div>
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