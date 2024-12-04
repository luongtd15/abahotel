<section class="section-hero padding-b-100 next">
    <div class="cr-slider swiper-container">
        <div class="swiper-wrapper">

            <div class="swiper-slide">
                <div class="cr-banner-image-two">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cr-left-side-contain slider-animation">
                                    <h5>Welcome to Aba Hotel</h5>
                                    <h1>The Best Way to Stuff Your Wallet</h1>
                                    <p>At Aba Hotel, we offer exclusive deals that let you enjoy luxury without the high
                                        price tag.
                                        With special discounts and packages, you can maximize your stay and keep your
                                        wallet happy.</p>
                                    <!-- <div class="cr-last-buttons">
                                        <a href="shop-left-sidebar.html" class="cr-button">
                                        Book now
                                        </a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="cr-hero-banner cr-banner-image-one">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cr-left-side-contain slider-animation">
                                    <h5><span>New Room</span> Arrived</h5>
                                    <h1>Your Gateway to Luxury and Comfort</h1>
                                    <p>Experience unparalleled elegance and comfort at Aba Hotel, where every detail is
                                        crafted to provide an unforgettable stay.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>

<!-- Categories -->
<section class="section-categories padding-b-100">
    <div class="container">
        <div class="row mb-minus-24">

            <div class="col-lg-12 col-12 mb-24">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="cake_milk" role="tabpanel"
                        aria-labelledby="cake_milk-tab">
                        <div class="row mb-minus-24">

                            <div class="col-4 cr-categories-box mb-24">
                                <div class="cr-side-categories">
                                    <div class="categories-contain">
                                        <div class="categories-text">
                                            <h5>Standard</h5>
                                        </div>
                                        <div class="categories-button">
                                            <a href="?act=room-type-detail&id=3" class="cr-button">Show more</a>
                                        </div>
                                    </div>
                                    <img src="<?= BASE_URL ?>assets/client/assets/img/categories/33.jpg"
                                        alt="categories-3">
                                </div>
                            </div>

                            <div class="col-4 cr-categories-box mb-24">
                                <div class="cr-side-categories">
                                    <!-- <div class="categories-inner">
                                        <h4>40
                                            <span>
                                                <small>%</small>
                                                <small>Off</small>
                                            </span>
                                        </h4>
                                    </div> -->
                                    <div class="categories-contain">
                                        <div class="categories-text">
                                            <h5>Deluxe</h5>
                                        </div>
                                        <div class="categories-button">
                                            <a href="?act=room-type-detail&id=2" class="cr-button">Show more</a>
                                        </div>
                                    </div>
                                    <img src="<?= BASE_URL ?>assets/client/assets/img/categories/77.jpg"
                                        alt="categories-4">
                                </div>
                            </div>

                            <div class="col-4 cr-categories-box mb-24">
                                <div class="cr-side-categories">

                                    <div class="categories-contain">
                                        <div class="categories-text">
                                            <h5>Suite</h5>
                                        </div>
                                        <div class="categories-button">
                                            <a href="?act=room-type-detail&id=1" class="cr-button">Show more</a>
                                        </div>
                                    </div>
                                    <img src="<?= BASE_URL ?>assets/client/assets/img/categories/55.jpg"
                                        alt="categories-4">
                                </div>
                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>

<!-- Popular product -->
<section class="section-popular-product-shape padding-b-100">
    <div class="container" data-aos="fade-up" data-aos-duration="2000">
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-30">
                    <div class="cr-banner">
                        <h2>Popular Room</h2>
                    </div>
                    <div class="cr-banner-sub-title">
                        <p>Experience unparalleled elegance and comfort at Aba Hotel, where every detail is crafted to
                            provide an unforgettable stay. Situated in a prime location, our hotel offers guests easy
                            access to the city’s finest attractions, making it the perfect choice for both leisure and
                            business travelers.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-content row mb-minus-24" id="MixItUpDA2FB7">
           

            <div class="col-xl-1 col-lg-2 col-12 mb-24"></div>

            <div class="col-xl-10 col-lg-8 col-12 mb-24">
                <div class="row mb-minus-24">
                    <?php foreach ($rooms as $room): ?>

                        <div class="mix vegetable col-xxl-3 col-xl-4 col-6 cr-product-box mb-24">
                            <div class="cr-product-card">
                                <div class="cr-product-image">
                                    <div class="cr-image-inner zoom-image-hover">
                                        <img src="<?= BASE_URL . $room->r_image ?>" alt="product-1">
                                    </div>
                                </div>
                                <div class="cr-product-details">
                                    <div class="cr-brand">
                                        <a href="shop-left-sidebar.html">Room</a>
                                        <div class="cr-star">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-line"></i>
                                            <p>(4.5)</p>
                                        </div>
                                    </div>
                                    <a href="?act=room-detail&id=<?= $room->r_id ?> " class="title"><?= $room->r_name ?></a>
                                    <p class="cr-price"><span class="new-price"><?= $room->t_price ?>$</span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>

            <div class="col-xl-1 col-lg-2 col-12 mb-24"></div>
        </div>
    </div>
</section>