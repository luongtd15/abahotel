<div class="cr-main-content">
    <div class="container-fluid">
        <!-- Page title & breadcrumb -->
        <div class="cr-page-title cr-page-title-2">
            <div class="cr-breadcrumb">
                <h5 style="color: #2bbb93">ABA HOTEL - USER'S DETAILS</h5>

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
                                            <img class="v-img" src=""
                                                alt="vendor image">
                                            <span class="tag-label online"></span>
                                        </div>
                                        <h5 class="name"><?= ucfirst($user->name) ?></h5>
                                        <p><?= $user->email ?></p>
                                        <div class="cr-settings">
                                            <a href="?act=user-update&id=<?= $user->id ?>" class="cr-btn default-btn color-success">Edit User</a>

                                        </div>
                                    </div>

                                    <!-- <div class="cr-vendor-info">
                                        <ul>
                                            <li><span class="label">Room Type :</span>&nbsp;
                                                <?php foreach ($room_types as $room_type): ?>
                                                    <?= $room->id_room_type == $room_type->id ? $room_type->name : null ?>
                                                <?php endforeach; ?>
                                            </li>
                                            <li><span class="label">Number of beds:</span>&nbsp;
                                                <?php foreach ($room_types as $room_type): ?>
                                                    <?= $room->id_room_type == $room_type->id ? $room_type->number_of_beds : null ?>
                                                <?php endforeach; ?>
                                            </li>
                                            <li><span class="label">Max occupancy :</span>&nbsp;
                                                <?php foreach ($room_types as $room_type): ?>
                                                    <?= $room->id_room_type == $room_type->id ? $room_type->max_occupancy : null ?>
                                                <?php endforeach; ?>
                                            </li>
                                            <li><span class="label">Status :</span>&nbsp;<?= $room->status ?></li>
                                            <li><span class="label">Price :</span>&nbsp;
                                                <?php foreach ($room_types as $room_type): ?>
                                                    <?= $room->id_room_type == $room_type->id ? $room_type->price : null ?>
                                                <?php endforeach; ?>
                                                $
                                            </li>
                                            <li><span class="label">Description :</span>&nbsp;<?= $room->description ?></li>
                                        </ul>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-9 col-xl-8 col-md-12">

                <div class="cr-card vendor-profile">
                    <div class="cr-card-content vendor-details mb-m-30">

                        <div class="row">
                            <div class="col-sm-12">
                                <h3>User Details</h3>
                                <div class="cr-vendor-detail">
                                    <p class="color-success">You can see details of this user below.
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="cr-vendor-detail">
                                    <h6>Name
                                        <span class="text-success">
                                            <?= $user->name ?>
                                        </span>
                                    </h6>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="cr-vendor-detail">
                                    <h6>Age
                                        <span class="text-success">
                                            <?= $user->age ?>
                                        </span>
                                    </h6>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="cr-vendor-detail">
                                    <h6>Address
                                        <span class="text-success">
                                            <?= $user->address ?>
                                        </span>
                                    </h6>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="cr-vendor-detail">
                                    <h6>Phone
                                        <span class="text-success">
                                            <?= $user->phone ?>
                                        </span>
                                    </h6>

                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="cr-vendor-detail">
                                    <h6>Email
                                        <span class="text-success">
                                            <?= $user->email ?>
                                        </span>
                                    </h6>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="cr-vendor-detail">
                                    <h6>Role
                                        <span class="text-success">
                                            <?= $user->role ?>
                                        </span>
                                    </h6>

                                </div>
                            </div>
                            <!-- <div class="col-md-6 col-sm-12">
                                <div class="cr-vendor-detail">
                                    <h6>Password</h6>
                                    <span class="text-success">
                                            <?= $user->password ?>
                                        </span>
                                </div>
                            </div> -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>