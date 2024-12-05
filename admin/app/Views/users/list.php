<div class="cr-main-content">
    <div class="container-fluid">
        <!-- Page title & breadcrumb -->
        <div class="cr-page-title cr-page-title-2">
            <div class="cr-breadcrumb">
                <h5 style="color: #2bbb93">ABA HOTEL - USER LIST</h5>
                <ul>
                    <li><a href="index.html"></a>ABA Hotel</li>
                    <li>User List</li>
                </ul>
            </div>
        </div>

        <div class="cr-page-title cr-page-title-2">
            <div class="cr-breadcrumb">
                <a href="?act=user-create" class="cr-btn radius-0 outline-btn color-success">Create a new user</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="cr-card" id="dealtbl">
                    <div class="cr-card-header">
                        <h4 class="cr-card-title">Users</h4>
                        <div class="header-tools">
                            <a href="javascript:void(0)" class="m-r-10 cr-full-card"><i
                                    class="ri-fullscreen-line"></i></a>
                            <div class="cr-date-range dots">
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <div class="cr-card-content card-default">
                        <div class="deal-table">

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
                                <table id="vendor-list" class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Age</th>
                                            <th>Since</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($users as $user): ?>
                                            <tr>
                                                <td class="token"><?= $user->id ?></td>
                                                <td>
                                                    <a href="?act=user-detail&id=<?= $user->id ?>">
                                                        <span class="name color-warning"><?= $user->name ?></span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <span style="text-transform:none"><?= $user->email ?>
                                                </td>
                                                <td><?= $user->age ?></td>
                                                <td><?= $user->created_at ?></td>
                                                <td><?= $user->address ?></td>
                                                <td><?= $user->phone ?></td>
                                                <td class="active">
                                                    <?= $user->role == 'Admin' ?
                                                        '<span class="color-success">admin</span>' :
                                                        '<span class="color-info">customer</span>' ?>
                                                </td>
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
                                                            <a class="dropdown-item text-warning" href="?act=user-update&id=<?= $user->id ?>">Edit</a>
                                                            <a class="dropdown-item" href="?act=user-delete&id=<?= $user->id ?>" onclick="return confirmDelete()">Delete</a>
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
</div>
<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this room?");
    }
</script>