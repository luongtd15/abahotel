<div class="cr-main-content">
    <div class="container-fluid">
        <!-- Page title & breadcrumb -->
        <div class="cr-page-title cr-page-title-2">
            <div class="cr-breadcrumb">
                <h5 class="text-danger">ABA HOTEL - CREATE A NEW ROOM</h5>
                <ul>
                    <li><a href="<?= BASE_URL_ADMIN ?>">ABA Hotel</a></li>
                    <li>Rooms</li>
                    <li>Create a new room</li>
                </ul>
            </div>

        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="cr-card card-default">
                    <div class="cr-card-content">
                        <div class="row cr-product-uploads">
                            <div class="col-lg-4 mb-991">
                                <div class="cr-vendor-img-upload">

                                </div>
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
                                    <form class="row g-3" method="post" enctype="multipart/form-data">
                                        <!-- Input Room Name -->
                                        <div class="col-md-6">
                                            <label for="name" class="form-label">Room Name</label>
                                            <input type="text" class="form-control slug-title" id="name" name="name">
                                        </div>

                                        <!-- Select Room Type -->
                                        <div class="col-md-6">
                                            <label class="form-label" for="id_room_type">Select Room Types</label>
                                            <select class="form-control form-select" name="id_room_type" id="id_room_type">
                                                <?php foreach ($room_types as $room_type) : ?>
                                                    <option value="<?= $room_type->id ?>"><?= $room_type->name ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <!-- Upload room image -->
                                        <div class="col-md-6">
                                            <label for="image" class="form-label">Image</label>
                                            <input type="file" class="form-control" id="" name="fileUpload">
                                        </div>

                                        <!-- Select status -->
                                        <div class="col-md-6">
                                            <label for="status" class="form-label">Status</label>
                                            <select name="status" id="status" class="form-control form-select">
                                                <option value="<?= STATUS_AVAILABLE ?>"><?= ucfirst(STATUS_AVAILABLE) ?></option>
                                                <option value="<?= STATUS_OCCUPIED ?>"><?= ucfirst(STATUS_OCCUPIED) ?></option>
                                            </select>
                                        </div>

                                        <!-- Input Description -->
                                        <div class="col-md-12">
                                            <label class="form-label" for="description">Description</label>
                                            <textarea class="form-control" rows="10" name="description" id="description"></textarea>
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