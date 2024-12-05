<div class="cr-main-content">
    <div class="container-fluid">
        <!-- Page title & breadcrumb -->
        <div class="cr-page-title cr-page-title-2">
            <div class="cr-breadcrumb">
                <h5 style="color: #fb2f2f">ABA HOTEL - ROOMS</h5>
                <ul>
                    <li><a href="<?= BASE_URL_ADMIN ?>">ABA Hotel</a></li>
                    <li>Rooms</li>
                </ul>
            </div>

        </div>

        <div class="cr-page-title cr-page-title-2">
            <div class="cr-breadcrumb">
                <a href="?act=room-create" class="cr-btn radius-0 outline-btn color-danger">Create a new room</a>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="cr-card card-default product-list">
                    <div class="cr-card-content ">
                        <?php if (isset($_SESSION['errs'])) : ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <li><?= $_SESSION['errs'] ?></li>
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
                        <div class="table-responsive">
                            <table id="product_list" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Room</th>
                                        <th>Name</th>
                                        <th>Room Type</th>
                                        <th>Beds</th>
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
                                            <td>
                                                <div>
                                                    <a class="dropdown-item text-info" href="?act=room-detail&id=<?= $room->r_id ?>">
                                                        <img class="img-fluid" src='<?= BASE_URL . $room->r_image ?>' alt="Room Image">
                                                    </a>
                                                </div>
                                            </td>
                                            <td><?= $room->r_name ?></td>
                                            <td><?= $room->t_name ?></td>
                                            <td><?= $room->t_number_of_beds ?></td>
                                            <td><?= $room->t_max_occupancy ?></td>
                                            <td>
                                                <?= $room->r_status == STATUS_AVAILABLE ?
                                                    '<span class="color-secondary">available</span>' :
                                                    '<span class="color-primary">occupied</span>' ?>
                                            </td>
                                            <td><?= $room->r_description ?></td>
                                            <td><span class="color-danger"><?= $room->t_price ?>$</span></td>
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
                                                        <a class="dropdown-item text-warning" href="?act=room-update&id=<?= $room->r_id ?>">Edit</a>
                                                        <a class="dropdown-item text-body-tertiary" href="?act=room-delete&id=<?= $room->r_id ?>" onclick="return confirmDelete()">Delete</a>
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
<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this room?");
    }
</script>