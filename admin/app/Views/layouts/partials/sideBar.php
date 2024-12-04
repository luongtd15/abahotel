<div class="cr-sidebar-overlay"></div>
<div class="cr-sidebar" data-mode="light">
    <div class="cr-sb-logo">
        <a href="<?= BASE_URL_ADMIN ?>" class="sb-full"><img src="<?= BASE_URL ?>assets/admin/assets/img/logo/full-logo.png" alt="logo"></a>
        <a href="<?= BASE_URL_ADMIN ?>" class="sb-collapse"><img src="<?= BASE_URL ?>assets/admin/assets/img/logo/collapse-logo.png" alt="logo"></a>
    </div>
    <div class="cr-sb-wrapper">
        <div class="cr-sb-content">

            <ul class="cr-sb-list">
                <li class="cr-sb-item sb-drop-item">
                    <a href="javascript:void(0)" class="cr-drop-toggle">
                        <i class="ri-dashboard-3-line"></i><span class="condense">Dashboard<i
                                class="drop-arrow ri-arrow-down-s-line"></i></span></a>
                    <ul class="cr-sb-drop condense">
                        <li><a href="<?= BASE_URL_ADMIN . "?act=room" ?>" class="cr-page-link drop"><i
                                    class="ri-checkbox-blank-circle-line"></i>Rooms</a></li>
                        <li><a href="<?= BASE_URL_ADMIN . "?act=room-type" ?>" class="cr-page-link drop"><i
                                    class="ri-checkbox-blank-circle-line"></i>Room Types</a></li>
                        <li><a href="<?= BASE_URL_ADMIN . "?act=user" ?>" class="cr-page-link drop"><i
                                    class="ri-checkbox-blank-circle-line"></i>Users</a></li>
                        <li><a href="<?= BASE_URL_ADMIN . "?act=invoice" ?>" class="cr-page-link drop"><i
                                    class="ri-checkbox-blank-circle-line"></i>Reservations</a></li>
                        <li><a href="<?= BASE_URL_ADMIN . "?act=feedback" ?>" class="cr-page-link drop"><i
                                    class="ri-checkbox-blank-circle-line"></i>Feedbacks</a></li>

                    </ul>
                </li>

                <li class="cr-sb-item-separator"></li>


            </ul>
        </div>
    </div>
</div>