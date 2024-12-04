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
                                                        <?php echo $item['room_name'] ?>
                                                    </a>
                                                </td>
                                                <td><?php echo $item['reservation_status'] ?></td>
                                                <td><?php echo $item['payment_method'] ?></td>
                                                <td>$<?php echo $item['total_price'] ?></td>
                                                <td><?php echo $item['checkin_date'] ?></td>
                                                <td><?php echo $item['checkout_date'] ?></td>
                                                <td><?php echo $item['created_at'] ?></td>
                                                <td class="text-right">
                                                    <a href="?act=cancel&id=<?= $item['reservation_id'] ?>" style="background-color: red; color: white; border: none; padding: 10px 20px; cursor: pointer;"
                                                    onclick="return confirmDelete()">
                                                        Cancel
                                                    </a>
                                                    <!-- Nút Hủy -->

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
    .btn-cancel {
        font-size: 12px;
        /* Giảm kích thước font */
        padding: 5px 10px;
        /* Giảm padding */
        border-radius: 5px;
        /* Bo tròn nút */
        float: right;
        /* Đẩy nút về phía bên phải */
        margin-top: 5px;
        /* Tạo khoảng cách phía trên */
    }

    .btn-cancel:hover {
        background-color: #c82333;
        /* Thay đổi màu khi hover */
        color: #fff;
        /* Đảm bảo chữ luôn rõ ràng */
    }
</style>

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this room?");
    }
</script>