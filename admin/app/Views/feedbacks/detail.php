<div class="cr-main-content">
    <div class="container-fluid">
        <!-- Page title & breadcrumb -->
        <div class="cr-page-title cr-page-title-2">
            <div class="cr-breadcrumb">
                <h5 style="color: #ffa04f">ABA HOTEL - FEEDBACK DETAIL</h5>
                <ul>
                    <li><a href="<?= BASE_URL_ADMIN ?>">ABA Hotel</a></li>
                </ul>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="cr-card card-default">
                    <div class="cr-card-content">
                        <div class="row cr-product-uploads">
                            <!-- Hình ảnh phòng -->
                            <div class="col-lg-4 mb-991">
                                <div class="cr-vendor-img-upload">
                                    <div class="cr-vendor-main-img">
                                        <div class="avatar-upload">
                                            <div class="avatar-preview cr-preview">
                                                <div class="imagePreview cr-div-preview">
                                                    <img class="cr-image-preview" src="<?= BASE_URL . $feedback->image ?>" alt="Room image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Thông tin phòng (thay thế bằng đoạn mã mới) -->
                            <div class="col-lg-8">
                                <div class="cr-vendor-info card border-0 shadow-sm p-3 mb-4 bg-white rounded">
                                    <span class="mb-3 text-primary p-3 rounded shadow-sm" style="background-color: #f8f9fa; font-weight: bold; display: inline-block; font-size:18.5px">
                                        <i class="ri-information-line"></i> Feedback Details
                                    </span>


                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between align-items-center mb-2">
                                            <span class="label text-secondary"><i class="ri-hotel-bed-line"></i> Room:</span>
                                            <strong><?= $feedback->name ?></strong>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center mb-2">
                                            <span class="label text-secondary"><i class="ri-door-line"></i> Room Type:</span>
                                            <strong><?= $feedback->room_type_name ?></strong>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center mb-2">
                                            <span class="label text-secondary"><i class="ri-team-line"></i> Customer:</span>
                                            <strong><?= $feedback->user_name ?></strong>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center mb-2">
                                            <span class="label text-secondary"><i class="ri-check-line"></i> Rating:</span>
                                            <div class="cr-t-review-rating">
                                                <?php
                                                $feedbackController = new FeedbackController();
                                                echo $feedbackController->displayStarsForAdmin($feedback->rating);
                                                ?>
                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex flex-column mb-2">
                                            <div class="label text-secondary"><i class="ri-money-dollar-circle-line"></i> Comment:</div>
                                            <strong class="text-success"><?= $feedback->comment ?></strong>
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