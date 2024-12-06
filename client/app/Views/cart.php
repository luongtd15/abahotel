<div class="cr-sidebar-overlay"></div>
<div id="cr_mobile_menu" class="cr-side-cart cr-mobile-menu">
    <div class="cr-menu-title">
        <span class="menu-title">My Menu</span>
        <button type="button" class="cr-close">×</button>
    </div>
    <div class="cr-menu-inner">
        <div class="cr-menu-content">
            <ul>
                <li class="dropdown drop-list">
                    <a href="index.html">Home</a>
                </li>
                <li class="dropdown drop-list">
                    <span class="menu-toggle"></span>
                    <a href="javascript:void(0)" class="dropdown-list">Category</a>
                    <ul class="sub-menu">
                        <li><a href="shop-left-sidebar.html">Shop Left sidebar</a></li>
                        <li><a href="shop-right-sidebar.html">Shop Right sidebar</a></li>
                        <li><a href="shop-full-width.html">Full Width</a></li>
                    </ul>
                </li>
                <li class="dropdown drop-list">
                    <span class="menu-toggle"></span>
                    <a href="javascript:void(0)" class="dropdown-list">product</a>
                    <ul class="sub-menu">
                        <li><a href="product-left-sidebar.html">product Left sidebar</a></li>
                        <li><a href="product-right-sidebar.html">product Right sidebar</a></li>
                        <li><a href="product-full-width.html">Product Full Width </a></li>
                    </ul>
                </li>
                <li class="dropdown drop-list">
                    <span class="menu-toggle"></span>
                    <a href="javascript:void(0)" class="dropdown-list">Pages</a>
                    <ul class="sub-menu">
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="contact-us.html">Contact Us</a></li>
                        <li><a href="cart.html">Cart</a></li>
                        <li><a href="checkout.html">Checkout</a></li>
                        <li><a href="track-order.html">Track Order</a></li>
                        <li><a href="wishlist.html">Wishlist</a></li>
                        <li><a href="faq.html">Faq</a></li>
                        <li><a href="login.html">Login</a></li>
                        <li><a href="register.html">Register</a></li>
                        <li><a href="policy.html">Policy</a></li>
                    </ul>
                </li>
                <li class="dropdown drop-list">
                    <span class="menu-toggle"></span>
                    <a href="javascript:void(0)" class="dropdown-list">Blog</a>
                    <ul class="sub-menu">
                        <li><a href="blog-left-sidebar.html">Left Sidebar</a></li>
                        <li><a href="blog-right-sidebar.html">Right Sidebar</a></li>
                        <li><a href="blog-full-width.html">Full Width</a></li>
                        <li><a href="blog-detail-left-sidebar.html">Detail Left Sidebar</a></li>
                        <li><a href="blog-detail-right-sidebar.html">Detail Right Sidebar</a></li>
                        <li><a href="blog-detail-full-width.html">Detail Full Width</a></li>
                    </ul>
                </li>
                <li class="dropdown drop-list">
                    <span class="menu-toggle"></span>
                    <a href="javascript:void(0)">Element</a>
                    <ul class="sub-menu">
                        <li><a href="elements-products.html">Products</a></li>
                        <li><a href="elements-typography.html">Typography</a></li>
                        <li><a href="elements-buttons.html">Buttons</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- Breadcrumb -->
<section class="section-breadcrumb">
    <div class="cr-breadcrumb-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cr-breadcrumb-title">
                        <h2>Cart</h2>
                        <span> <a href="index.html">Home</a> / Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Cart -->
<section class="section-cart padding-t-100" style="margin-bottom: 120px">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cr-cart-content" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="400">
                    <?php if (isset($_SESSION['success'])) : ?>
                        <div class="alert alert-success">
                            <?= $_SESSION['success'] ?>
                        </div>
                        <?php unset($_SESSION['success']) ?>
                    <?php endif; ?>
                    <div class="row">
                        <form action="#">
                            <div class="cr-table-content">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Room</th>
                                            <th class="">Reservation Status</th>
                                            <th class="">Payment Method</th>
                                            <th>Total</th>
                                            <th class="">Check-in Date</th>
                                            <th class="">Check-out Date</th>
                                            <th class="">Created At</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($orderHistory as $item): ?>
                                            <tr>
                                                <td>
                                                    <a href="javascript:void(0)">
                                                        <img src="<?php echo $item['room_image'] ?>" alt="room"
                                                            class="cr-cart-img">
                                                    </a>
                                                </td>
                                                <td><?php echo $item['reservation_status'] ?></td>
                                                <td><?php echo $item['payment_method'] ?></td>
                                                <td>$<?php echo $item['total_price'] ?></td>
                                                <td><?php echo $item['checkin_date'] ?></td>
                                                <td><?php echo $item['checkout_date'] ?></td>
                                                <td><?php echo $item['created_at'] ?></td>
                                                <td class="text-right">
                                                    <div class="button-container">
                                                        <!-- Nút Cancel -->
                                                        <a href="?act=cancel&id=<?= $item['reservation_id'] ?>"
                                                            class="btn-custom btn-cancel"
                                                            onclick="return confirmDelete()"
                                                            title="Cancel this reservation">
                                                            <i class="ri-close-circle-line"></i> Cancel
                                                        </a>

                                                        <!-- Nút Pay (chỉ hiển thị khi Bank Transfer được chọn) -->
                                                        <?php if (
                                                            $item['payment_method'] === 'Bank Transfer'
                                                            && $item['reservation_status'] == PENDING
                                                        ): ?>
                                                            <a href="?act=pay&id=<?= $item['reservation_id'] ?>"
                                                                class="btn-custom btn-success"
                                                                title="Pay now">
                                                                <i class="ri-bank-line"></i> Pay
                                                            </a>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>

                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Container căn chỉnh */
    .button-container {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        /* Khoảng cách giữa các nút */
    }

    /* Định dạng nút */
    .btn-custom {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 8px 16px;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-custom i {
        margin-right: 6px;
        font-size: 16px;
    }

    /* Nút Cancel */
    .btn-cancel {
        background-color: #f8d7da;
        /* Màu nền đỏ nhạt */
        color: #721c24;
        /* Màu chữ đỏ đậm */
        border: 1px solid #f5c6cb;
        /* Viền đỏ nhạt */
    }

    .btn-cancel:hover {
        background-color: #f5c6cb;
        color: #721c24;
        transform: scale(1.05);
        /* Hiệu ứng phóng to */
    }

    /* Nút Pay */
    .btn-success {
        background-color: #d4edda;
        /* Màu nền xanh nhạt */
        color: #155724;
        /* Màu chữ xanh đậm */
        border: 1px solid #c3e6cb;
        /* Viền xanh nhạt */
    }

    .btn-success:hover {
        background-color: #c3e6cb;
        color: #155724;
        transform: scale(1.05);
        /* Hiệu ứng phóng to */
    }

    /* Hiệu ứng hover cho toàn bộ nút */
    .btn-custom:hover {
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15);
        /* Đổ bóng nhẹ */
    }

    /* Hiển thị nút với icon đẹp */
    .btn-custom i {
        font-size: 18px;
        /* Icon to hơn một chút */
    }
</style>

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this room?");
    }
</script>