<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="top-header">
                    <a href="/aba-hotel" class="cr-logo">
                        <img src="<?= BASE_URL ?>assets/client/assets/img/logo/logo.png" alt="logo" class="logo">
                        <img src="<?= BASE_URL ?>assets/client/assets/img/logo/dark-logo.png" alt="logo" class="dark-logo">
                    </a>
                    <form class="cr-search" action="?act=search" method="GET">
                        <input type="hidden" name="act" value="search">
                        <input
                            class="search-input"
                            type="text"
                            name="query"
                            placeholder="Search room name..."
                            required>

                        <select
                            class="form-select"
                            name="category"
                            aria-label="Default select example">
                            <option value="all" selected>All Rooms</option>
                            <?php foreach ($roomType as $room): ?>
                                <option value="<?= htmlspecialchars($room['id'], ENT_QUOTES, 'UTF-8') ?>">
                                    <?= htmlspecialchars($room['name'], ENT_QUOTES, 'UTF-8') ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <button type="submit" class="search-btn">
                            <i class="ri-search-line"></i>
                        </button>
                    </form>

                    <div class="cr-right-bar">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <?php if (isset($_SESSION['user-client'])): ?>
                                    <a class="nav-link dropdown-toggle cr-right-bar-item" href="javascript:void(0)">
                                        <i class="ri-user-3-line"></i>
                                        <span><?= $_SESSION['user-client']->name ?></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <!-- <li>
                                            <a class="dropdown-item" href="?act=register">Register</a>
                                        </li> -->
                                        <?php if (($_SESSION['user-client'])->role == ROLE_ADMIN): ?>
                                            <li>
                                                <a class="dropdown-item" href="<?= BASE_URL_ADMIN ?>">Go to admin</a>
                                            </li>
                                        <?php endif; ?>
                                        <li>
                                            <a class="dropdown-item" href="?act=logout">Logout</a>
                                        </li>
                                    </ul>
                                <?php endif; ?>

                                <?php if (!isset($_SESSION['user-client'])): ?>
                                    <a class="nav-link dropdown-toggle cr-right-bar-item" href="javascript:void(0)">
                                        <i class="ri-user-3-line"></i>
                                        <span>Account</span>
                                    </a>


                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="?act=register">Register</a>
                                        </li>
                                        <!-- <li>
                                        <a class="dropdown-item" href="checkout.html">Checkout</a>
                                    </li> -->
                                        <li>
                                            <a class="dropdown-item" href="?act=login">Login</a>
                                        </li>
                                    </ul>

                                <?php endif; ?>

                            </li>
                        </ul>
                        <!-- <a href="wishlist.html" class="cr-right-bar-item">
                            <i class="ri-heart-3-line"></i>
                            <span>Wishlist</span>
                        </a> -->
                        <a href="?act=history_order" class="cr-right-bar-item 123123">
                            <i class="ri-shopping-cart-line"></i>
                            <span>Booked</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cr-fix" id="cr-main-menu-desk">
        <div class="container">
            <div class="cr-menu-list">
                <div class="cr-category-icon-block">

                </div>
                <nav class="navbar navbar-expand-lg">
                    <a href="javascript:void(0)" class="navbar-toggler shadow-none">
                        <i class="ri-menu-3-line"></i>
                    </a>
                    <div class="cr-header-buttons">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="javascript:void(0)">
                                    <i class="ri-user-3-line"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="?act=register">Register</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="<?= BASE_URL_ADMIN ?>">Go to admin</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="?act=login">Login</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <a href="wishlist.html" class="cr-right-bar-item">
                            <i class="ri-heart-line"></i>
                        </a>
                        <a href="?act=history-order" class="cr-right-bar-item Shopping-toggle">
                            <i class="ri-shopping-cart-line"></i>
                        </a>
                    </div>


                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/aba-hotel">
                                    Home
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="javascript:void(0)">
                                    Rooms
                                </a>

                                <ul class="dropdown-menu">
                                    <?php foreach ($roomType as $room): ?>
                                        <li>
                                            <a class="dropdown-item" href="?act=room-type-detail&id=<?php echo $room['id'] ?> ">
                                                <?= htmlspecialchars($room['name'], ENT_QUOTES, 'UTF-8') ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="?act=about">
                                    About us
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="?act=contact">
                                    Contact us
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="cr-calling">
                    <i class="ri-phone-line"></i>
                    <a href="javascript:void(0)">+123 ( 456 ) ( 7890 )</a>
                </div>
            </div>
        </div>
    </div>
</header>