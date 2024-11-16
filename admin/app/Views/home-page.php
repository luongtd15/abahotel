<div class="cr-main-content">
    <div class="container-fluid">
        <!-- Page title & breadcrumb -->
        <div class="cr-page-title">
            <div class="cr-breadcrumb">
                <h5>ABA Hotel</h5>
                <ul>
                    <li><a href="index.html">ABA Hotel</a></li>
                    <li>Statistical data</li>
                </ul>
            </div>
            <div class="cr-tools">
                <div id="pagedate">
                    <div class="cr-date-range" title="Date">
                        <span></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="cr-card">
                            <div class="cr-card-content label-card">
                                <div class="title">
                                    <span class="icon icon-1"><i class="ri-shield-user-line"></i></span>
                                    <div class="growth-numbers">
                                        <h4>Customers</h4>
                                        <h5>857k</h5>
                                    </div>
                                </div>
                                <p class="card-groth up">
                                    <i class="ri-arrow-up-line"></i>
                                    32%
                                    <span>Last Month</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="cr-card">
                            <div class="cr-card-content label-card">
                                <div class="title">
                                    <span class="icon icon-2"><i class="ri-shopping-bag-3-line"></i></span>
                                    <div class="growth-numbers">
                                        <h4>Room Types</h4>
                                        <h5>08.65k</h5>
                                    </div>
                                </div>
                                <p class="card-groth down">
                                    <i class="ri-arrow-down-line"></i>
                                    1.7%
                                    <span>Last Month</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="cr-card">
                            <div class="cr-card-content label-card">
                                <div class="title">
                                    <span class="icon icon-3"><i class="ri-money-dollar-circle-line"></i></span>
                                    <div class="growth-numbers">
                                        <h4>Revenue</h4>
                                        <h5>$85746</h5>
                                    </div>
                                </div>
                                <p class="card-groth down">
                                    <i class="ri-arrow-down-line"></i>
                                    3.8%
                                    <span>Last Month</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="cr-card">
                            <div class="cr-card-content label-card">
                                <div class="title">
                                    <span class="icon icon-4"><i class="ri-exchange-dollar-line"></i></span>
                                    <div class="growth-numbers">
                                        <h4>Expenses</h4>
                                        <h5>$75462</h5>
                                    </div>
                                </div>
                                <p class="card-groth up">
                                    <i class="ri-arrow-up-line"></i>
                                    8%
                                    <span>Last Month</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- best seller -->
        <div class="row">
            <div class="col-xxl-6 col-xl-12">
                <div class="cr-card" id="best_seller_tbl">
                    <div class="cr-card-header">
                        <h4 class="cr-card-title">Available Room</h4>
                        <div class="header-tools">
                            <a href="javascript:void(0)" class="m-r-10 cr-full-card" title="Full Screen"><i
                                    class="ri-fullscreen-line"></i></a>
                            <div class="cr-date-range dots">
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <div class="cr-card-content card-default">
                        <div class="best-seller-table">
                            <div class="table-responsive">
                                <table id="best_seller_data_table" class="table">
                                    <thead>
                                        <tr>
                                            <th>Room</th>
                                            <th>Name</th>
                                            <th>Room Type</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($availableRoom as $room): ?>
                                            <tr>
                                                <td><img class="cat-thumb" src="<?= BASE_URL . $room->r_image ?>"
                                                        alt="clients Image">
                                                </td>
                                                <td>
                                                    <span class="cat">
                                                        <?= $room->r_name ?>
                                                    </span>
                                                </td>
                                                <td><?= $room->t_name ?></td>
                                                <td>
                                                    <?= $room->r_status == 'available' ?
                                                        '<span class="color-secondary">available</span>' :
                                                        '<span class="color-primary">occupied</span>' ?>
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

            <div class="col-xxl-6 col-xl-12">
                <div class="cr-card" id="top_product_tbl">
                    <div class="cr-card-header">
                        <h4 class="cr-card-title">Occupied Room</h4>
                        <div class="header-tools">
                            <a href="javascript:void(0)" class="m-r-10 cr-full-card" title="Full Screen"><i
                                    class="ri-fullscreen-line"></i></a>
                            <div class="cr-date-range dots">
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <div class="cr-card-content card-default">
                        <div class="top-product-table">
                            <div class="table-responsive">
                                <table id="top_product_data_table" class="table">
                                    <thead>
                                        <tr>
                                            <th>Room</th>
                                            <th>Name</th>
                                            <th>Room Type</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($occupiedRoom as $room): ?>
                                            <tr>
                                                <td><img class="cat-thumb" src="<?= BASE_URL . $room->r_image ?>"
                                                        alt="clients Image">
                                                </td>
                                                <td>
                                                    <span class="cat">
                                                        <?= $room->r_name ?>
                                                    </span>
                                                </td>
                                                <td><?= $room->t_name ?></td>
                                                <td>
                                                    <?= $room->r_status == 'available' ?
                                                        '<span class="color-secondary">available</span>' :
                                                        '<span class="color-primary">occupied</span>' ?>
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

        <!-- Recent Reservations -->
        <div class="row">
            <div class="col-xxl-12 col-xl-12">
                <div class="cr-card" id="ordertbl">
                    <div class="cr-card-header">
                        <h4 class="cr-card-title">Recent Reservations</h4>
                        <div class="header-tools">
                            <a href="javascript:void(0)" class="m-r-10 cr-full-card" title="Full Screen"><i
                                    class="ri-fullscreen-line"></i></a>
                            <div class="cr-date-range dots">
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <div class="cr-card-content card-default">
                        <div class="order-table">
                            <div class="table-responsive">
                                <table id="recent_order_data_table" class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Product</th>
                                            <th>Customer</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>vendor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="token">#fx2650</td>
                                            <td><img class="cat-thumb" src="<?= BASE_URL ?>assets/admin/assets/img/product/1.jpg"
                                                    alt="clients Image"><span class="name">Mens t-shirt</span>
                                            </td>
                                            <td>Avira Venusio</td>
                                            <td>$15</td>
                                            <td class="cod">COD</td>
                                            <td>Melborn Fashion</td>
                                        </tr>
                                        <tr>
                                            <td class="token">#fx2650</td>
                                            <td><img class="cat-thumb" src="<?= BASE_URL ?>assets/admin/assets/img/product/2.jpg"
                                                    alt="clients Image"><span class="name">Sofa chair</span>
                                            </td>
                                            <td>Zara nails</td>
                                            <td>$52</td>
                                            <td class="pending">Pending</td>
                                            <td>Capital Mines</td>
                                        </tr>
                                        <tr>
                                            <td class="token">#fx2365</td>
                                            <td><img class="cat-thumb" src="<?= BASE_URL ?>assets/admin/assets/img/product/3.jpg"
                                                    alt="clients Image"><span class="name">Night Lamp</span>
                                            </td>
                                            <td>Olive Yew</td>
                                            <td>$69</td>
                                            <td class="wallet">wallet</td>
                                            <td>Bara Electrics</td>
                                        </tr>
                                        <tr>
                                            <td class="token">#fx2205</td>
                                            <td><img class="cat-thumb" src="<?= BASE_URL ?>assets/admin/assets/img/product/4.jpg"
                                                    alt="clients Image"><span class="name">Mens hoodie</span>
                                            </td>
                                            <td>Allie Grater</td>
                                            <td>$49</td>
                                            <td class="paid">Paid</td>
                                            <td>Forest clothes</td>
                                        </tr>
                                        <tr>
                                            <td class="token">#fx2187</td>
                                            <td><img class="cat-thumb" src="<?= BASE_URL ?>assets/admin/assets/img/product/5.jpg"
                                                    alt="clients Image"><span class="name">Digital Watch</span>
                                            </td>
                                            <td>Stanley Knife</td>
                                            <td>$559</td>
                                            <td class="cod">COD</td>
                                            <td>Samsung Digi</td>
                                        </tr>
                                        <tr>
                                            <td class="token">#fx2050</td>
                                            <td><img class="cat-thumb" src="<?= BASE_URL ?>assets/admin/assets/img/product/6.jpg"
                                                    alt="clients Image"><span class="name">DSLR Camera.</span>
                                            </td>
                                            <td>Nick Carlet</td>
                                            <td>$1546</td>
                                            <td class="wallet">Wallet</td>
                                            <td>Canion tech</td>
                                        </tr>
                                        <tr>
                                            <td class="token">#fx1995</td>
                                            <td><img class="cat-thumb" src="<?= BASE_URL ?>assets/admin/assets/img/product/7.jpg"
                                                    alt="clients Image"><span class="name">Head phone</span>
                                            </td>
                                            <td>Moris Nency</td>
                                            <td>$525</td>
                                            <td class="paid">Paid</td>
                                            <td>Beater Digital</td>
                                        </tr>
                                        <tr>
                                            <td class="token">#fx1985</td>
                                            <td><img class="cat-thumb" src="<?= BASE_URL ?>assets/admin/assets/img/product/8.jpg"
                                                    alt="clients Image"><span class="name">Camera Dron</span>
                                            </td>
                                            <td>Wiley Waites</td>
                                            <td>$1255</td>
                                            <td class="paid">Paid</td>
                                            <td>Four wing</td>
                                        </tr>
                                        <tr>
                                            <td class="token">#fx1945</td>
                                            <td><img class="cat-thumb" src="<?= BASE_URL ?>assets/admin/assets/img/product/9.jpg"
                                                    alt="clients Image"><span class="name">Drill machine</span>
                                            </td>
                                            <td>Sarah Moanees</td>
                                            <td>$684</td>
                                            <td class="pending">pending</td>
                                            <td>Hitachu</td>
                                        </tr>
                                        <tr>
                                            <td class="token">#fx1865</td>
                                            <td><img class="cat-thumb" src="<?= BASE_URL ?>assets/admin/assets/img/product/10.jpg"
                                                    alt="clients Image"><span class="name">Camera Dron</span>
                                            </td>
                                            <td>Anne Ortha</td>
                                            <td>$854</td>
                                            <td class="cod">COD</td>
                                            <td>Skyrider tech</td>
                                        </tr>
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