<div class="cr-main-content">
    <div class="container-fluid">
        <!-- Page title & breadcrumb -->
        <div class="cr-page-title cr-page-title-2">
            <div class="cr-breadcrumb">
                <h5 style="color: #2bbb93">ABA HOTEL - CREATE A NEW USER</h5>
                <ul>
                    <li><a href="<?= BASE_URL_ADMIN ?>">ABA Hotel</a></li>
                    <li>Users</li>
                    <li>Create a new user</li>
                </ul>
            </div>

        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="cr-card card-default">
                    <div class="cr-card-content">
                        <div class="row cr-product-uploads">
                            <!-- <div class="col-lg-4 mb-991">
                                <div class="cr-vendor-img-upload">

                                </div>
                            </div> -->

                            <div class="col-lg-12">
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
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control slug-title" id="name" name="name" value="<?= $user->name ?>">
                                        </div>

                                        <!-- Select Room Type -->
                                        <div class="col-md-6">
                                            <label class="form-label" for="address">Address</label>
                                            <input class="form-control" name="address" id="address" type="text" value="<?= $user->address ?>">
                                        </div>

                                        <!-- Upload room image -->
                                        <div class="col-md-6">
                                            <label for="age" class="form-label">Age</label>
                                            <input type="number" class="form-control" id="age" name="age" value="<?= $user->age ?>">
                                        </div>

                                        <!-- Select status -->
                                        <div class="col-md-6">
                                            <label for="role" class="form-label">Role</label>
                                            <select name="role" id="role" class="form-control form-select">
                                                <option <?= $user->role == ROLE_ADMIN ? 'selected' : null ?> value="<?= ROLE_ADMIN ?>"><?= ucfirst(ROLE_ADMIN) ?></option>
                                                <option <?= $user->role == ROLE_CUSTOMER ? 'selected' : null ?> value="<?= ROLE_CUSTOMER ?>"><?= ucfirst(ROLE_CUSTOMER) ?></option>
                                            </select>
                                        </div>

                                        <!-- Input Description -->
                                        <div class="col-md-6">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="text" class="form-control" id="email" name="email" value="<?= $user->email ?>">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="text" class="form-control" id="phone" name="phone" value="<?= $user->phone ?>">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="password" name="password">
                                        </div>

                                        <!-- Submit -->
                                        <div class="col-md-12">
                                            <button type="submit" class="cr-btn default-btn color-success">Submit</button>
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