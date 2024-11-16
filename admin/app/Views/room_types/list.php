<div class="cr-main-content">
    <div class="container-fluid">
        <!-- Page title & breadcrumb -->
        <div class="cr-page-title cr-page-title-2">
            <div class="cr-breadcrumb">
                <h5 style="color: #5f6af5">ABA HOTEL - ROOM TYPES</h5>
                <ul>
                    <li><a href="<?= BASE_URL_ADMIN ?>">ABA Hotel</a></li>
                    <li>Room types</li>
                </ul>
            </div>

        </div>

        <div class="cr-page-title cr-page-title-2">
            <div class="cr-breadcrumb">
                <a href="?act=room-type-create" class="cr-btn radius-0 outline-btn color-primary">Create a new room type</a>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="cr-card card-default product-list">
                    <div class="cr-card-content ">
                        <div class="table-responsive">
                            <?php if (isset($_SESSION['success'])) : ?>
                                <div class="alert alert-success">
                                    <?= $_SESSION['success'] ?>
                                </div>
                                <?php unset($_SESSION['success']) ?>
                            <?php endif; ?>
                            <table id="product_list" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Numer of beds</th>
                                        <th>Max Occupancy</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($room_types as $room_type):  ?>
                                        <tr>
                                            <td>
                                                <?= $room_type->id ?>
                                            </td>
                                            <td><?= $room_type->name ?></td>
                                            <td><?= $room_type->number_of_beds ?></td>
                                            <td><?= $room_type->max_occupancy ?></td>
                                            <td><span class="color-danger"><?= $room_type->price ?> $</span></td>
                                            <td><?= $room_type->description ?></td>

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

                                                        <a class="dropdown-item text-warning" href="?act=room-type-update&id=<?= $room_type->id ?>">Edit</a>
                                                        <a class="dropdown-item text-body-tertiary" href="?act=room-type-delete&id=<?= $room_type->id ?>" onclick="return confirmDelete()">Delete</a>
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
        return confirm("Are you sure you want to delete this room type?");
    }
</script>