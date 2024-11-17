<div class="cr-main-content">
    <div class="container-fluid">
        <!-- Page title & breadcrumb -->
        <div class="cr-page-title cr-page-title-2">
            <div class="cr-breadcrumb">
                <h5 style="color: #5f6af5">ABA HOTEL - UPDATE THIS ROOM TYPE</h5>
                <ul>
                    <li><a href="<?= BASE_URL_ADMIN ?>">ABA Hotel</a></li>
                    <li>Rooms</li>
                    <li>Update room type</li>
                </ul>
            </div>

        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="cr-card card-default">
                    <div class="cr-card-content">
                        <div class="row cr-product-uploads">
                            <div class="col-lg-4 mb-991">

                            </div>

                            <div class="col-lg-8">
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
                                            <label for="name" class="form-label">Room type name</label>
                                            <input type="text" class="form-control slug-title" id="name" name="name" value="<?= $room_type->name ?>">
                                        </div>

                                        <!-- Select Room Type -->
                                        <div class="col-md-6">
                                            <label for="number_of_beds" class="form-label">Number of beds</label>
                                            <input type="number" class="form-control slug-title" id="number_of_beds" name="number_of_beds" value="<?= $room_type->number_of_beds ?>">
                                        </div>
                                        <!-- Upload room image -->
                                        <div class="col-md-6">
                                            <label for="price" class="form-label">Price ($)</label>
                                            <input type="number" class="form-control" id="" name="price" value="<?= $room_type->price ?>">
                                        </div>

                                        <!-- Select status -->
                                        <div class="col-md-6">
                                            <label for="status" class="form-label">Max occupancy</label>
                                            <input type="number" class="form-control" id="" name="max_occupancy" value="<?= $room_type->max_occupancy ?>">
                                        </div>

                                        <!-- Input Description -->
                                        <div class="col-md-12">
                                            <label class="form-label" for="description">Description</label>
                                            <textarea class="form-control" rows="10" name="description" id="description" value="<?= $room_type->description ?>"><?= $room_type->description ?></textarea>
                                        </div>

                                        <!-- Submit -->
                                        <div class="col-md-12">
                                            <button type="submit" class="btn cr-btn-primary">Submit</button>
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