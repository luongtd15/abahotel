<div class="cr-main-content">
    <div class="container-fluid">
        <!-- Page title & breadcrumb -->
        <div class="cr-page-title cr-page-title-2">
            <div class="cr-breadcrumb">
                <h5 style="color: #ffa04f">ABA HOTEL - FEEDBACKS</h5>
                <ul>
                    <li><a href="<?= BASE_URL_ADMIN ?>">ABA Hotel</a></li>
                </ul>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="cr-card" id="ordertbl">
                    <div class="cr-card-header">
                        <h4 class="cr-card-title">Feedbacks</h4>
                        <div class="header-tools">
                            <a href="javascript:void(0)" class="m-r-10 cr-full-card"><i
                                    class="ri-fullscreen-line"></i></a>
                            <div class="cr-date-range dots">
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <div class="cr-card-content card-default">
                        <div class="table-responsive">
                            <div class="table-responsive">
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
                                        <ul>
                                            <li><?= $_SESSION['success'] ?></li>
                                        </ul>
                                    </div>
                                    <?php unset($_SESSION['success']) ?>
                                <?php endif; ?>
                                <table id="recent_order" class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Customer</th>
                                            <th>Room</th>
                                            <th>Rating</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($feedbacks as $feedback): ?>
                                            <tr>
                                                <td class="token"><?= $feedback->id ?></td>
                                                <td>
                                                    <span style="color:darkcyan"><?= $feedback->user_name ?></span>
                                                </td>
                                                <td>
                                                    <span class="" style="color:darkblue"><?= $feedback->room_name ?></span>
                                                </td>
                                                <td>
                                                    <div class="cr-t-review-rating">
                                                        <?php
                                                        $feedbackController = new FeedbackController();
                                                        echo $feedbackController->displayStarsForAdmin($feedback->rating);
                                                        ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="?act=feedback-detail&id=<?= $feedback->id ?>" class="btn btn-info"><i class="ri-eye-2-line"></i></a>
                                                    <a href="?act=feedback-delete&id=<?= $feedback->id ?>" class="btn btn-danger" onclick="return confirmDelete()"><i class="ri-delete-bin-line"></i></a>
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

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this room?");
    }
</script>