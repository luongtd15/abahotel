<div class="cr-main-content">
    <div class="container-fluid">
        <!-- Page title & breadcrumb -->
        <div class="cr-page-title cr-page-title-2">
            <div class="cr-breadcrumb">

                <h5 style="color: #5f6af5">ABA HOTEL - CREATE A NEW ROOM TYPE</h5>
                <ul>
                    <li><a href="<?= BASE_URL_ADMIN ?>">ABA Hotel</a></li>
                    <li>Create a new room type</li>
                </ul>

            </div>
        </div>
        <div class="row cr-category">
            <div class="col-xl-5 col-lg-12">
                <div class="team-sticky-bar">
                    <div class="col-md-12">
                        <div class="cr-cat-list cr-card card-default mb-24px">
                            <div class="cr-card-content">
                                <div class="cr-cat-form">
                                    <h3>Create A New Room Type</h3>

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

                                    <form method="post">

                                        <div class="form-group">
                                            <label>Name</label>
                                            <div class="col-12">
                                                <input id="name" name="name"
                                                    class="form-control here slug-title" type="text" value="<?= $roomType->name ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Number of beds</label>
                                            <div class="col-12">
                                                <input id="number_of_beds" name="number_of_beds" class="form-control here set-slug"
                                                    type="number" value="<?= $roomType->number_of_beds ?>">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label>Price</label>
                                            <div class="col-12">
                                                <input id="price" name="price" type="number" class="form-control" value="<?= $roomType->price ?>"></input>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label>Max occupancy</label>
                                            <div class="col-12">
                                                <input id="max_occupancy" name="max_occupancy" type="number" class="form-control" value="<?= $roomType->max_occupancy ?>"></input>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label>Description</label>
                                            <div class="col-12">
                                                <textarea id="description" name="description" cols="40"
                                                    rows="4" class="form-control" value="<?= $roomType->description ?>"><?= $roomType->description ?></textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 d-flex">
                                                <button type="submit" class="cr-btn-primary">Submit</button>
                                            </div>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-lg-12">
                <div class="cr-cat-list cr-card card-default">
                    <div class="cr-card-content ">
                        <div class="table-responsive tbl-800">
                            <table id="cat_data_table" class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Number of beds</th>
                                        <th>Price</th>
                                        <th>Max occupancy</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($room_types as $room_type): ?>
                                        <tr>
                                            <td><?= $room_type->id ?></td>
                                            <td>
                                                <span class="cr-sub-cat-list">
                                                    <?= $room_type->name ?>
                                                </span>
                                            </td>
                                            <td><?= $room_type->number_of_beds ?></td>
                                            <td class="active"><?= $room_type->price ?> $</td>
                                            <td>
                                                <span class="badge badge-success">
                                                    <?= $room_type->max_occupancy ?>

                                                </span>
                                            </td>
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