<div class="cr-main-content">
    <div class="container-fluid">
        <!-- Page title & breadcrumb -->
        <div class="cr-page-title cr-page-title-2">
            <div class="cr-breadcrumb">
                <h5 class="text-danger">ABA HOTEL - ROOM'S DETAILS</h5>
                <ul>
                    <li><a href="<?= BASE_URL_ADMIN ?>">ABA Hotel</a></li>
                    <li>Rooms</li>
                    <li>See room details</li>
                </ul>
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
                                            <img class="v-img" src="<?= BASE_URL . $room->image ?>"
                                                alt="vendor image">
                                            <span class="tag-label online"></span>
                                        </div>
                                        <h5 class="name"><?= $room->name ?></h5>
                                        <p>( example@support.com )</p>
                                        <div class="cr-settings">
                                            <a href="#" class="cr-btn-primary m-r-10">Edit Room</a>

                                        </div>
                                    </div>
                                    <div class="cr-vendor-info">
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
                                    </div>
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
                                <h3>Room Details</h3>
                                <div class="cr-vendor-detail">
                                    <p class="color-success">You can see details of this room below.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="cr-vendor-detail">
                                    <h6>Room name:
                                        <span class="color-primary">
                                            <?= $room->name ?>
                                        </span>
                                    </h6>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="cr-vendor-detail">
                                    <h6>Room type:
                                        <span class="color-primary">
                                            <?php foreach ($room_types as $room_type): ?>
                                                <?= $room->id_room_type == $room_type->id ? $room_type->name : null ?>
                                            <?php endforeach; ?>
                                        </span>
                                    </h6>

                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="cr-vendor-detail">
                                    <h6>Number of beds
                                        <span class="color-primary">
                                            <?php foreach ($room_types as $room_type): ?>
                                                <?= $room->id_room_type == $room_type->id ? $room_type->number_of_beds : null ?>
                                            <?php endforeach; ?>
                                        </span>
                                    </h6>

                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="cr-vendor-detail">
                                    <h6>Max occupancy
                                        <span class="color-primary">
                                            <?php foreach ($room_types as $room_type): ?>
                                                <?= $room->id_room_type == $room_type->id ? $room_type->max_occupancy : null ?>
                                            <?php endforeach; ?>
                                        </span>
                                    </h6>

                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="cr-vendor-detail">
                                    <h6>Status
                                        <span class="color-primary">
                                            <?= ucfirst($room->status) ?>
                                        </span>
                                    </h6>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="cr-vendor-detail">
                                    <h6>Price
                                        <span class="color-primary">
                                            <?php foreach ($room_types as $room_type): ?>
                                                <?= $room->id_room_type == $room_type->id ? $room_type->price : null ?>
                                            <?php endforeach; ?>
                                            $
                                        </span>
                                    </h6>

                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="cr-vendor-detail">
                                    <h6>Description</h6>
                                    <ul>
                                        <li>
                                            <?= $room->description ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>