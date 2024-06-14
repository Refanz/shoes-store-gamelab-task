<!-- Start Section Trending Product -->
<section class="trending-product">
    <div class="container">

        <h2 class="section-title">Trending Shoes</h2>

        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                        type="button" role="tab" aria-controls="nav-home" aria-selected="true">Sneakers
                </button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                        type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Active
                </button>
                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact"
                        type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Sandals
                </button>
            </div>
        </nav>

        <!-- Sneakers -->
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"
                 tabindex="0">
                <div class="row">
                    <?php foreach ($list_trending_shoes_sneakers as $data): ?>
                        <div class="col-md-4">
                            <div class="card mt-4">
                                <img src="<?= BASE_URL . $data[3] ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $data[1] ?></h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the
                                        bulk
                                        of the card's content.</p>
                                    <a href="#" class="btn btn-sm btn-primary">Checkout</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Active -->
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"
                 tabindex="0">
                <div class="row">
                    <?php foreach ($list_trending_shoes_active as $data): ?>
                        <div class="col-md-4">
                            <div class="card">
                                <img src="<?= BASE_URL . $data[3] ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $data[1] ?></h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the
                                        bulk of
                                        the card's content.</p>
                                    <a href="#" class="btn btn-primary">Checkout</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Sandals -->
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab"
                 tabindex="0">
                <div class="row">
                    <?php foreach ($list_trending_shoes_sandals as $data): ?>
                        <div class="col-md-4">
                            <div class="card">
                                <img src="<?= BASE_URL . $data[3] ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $data[1] ?></h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the
                                        bulk
                                        of
                                        the card's content.</p>
                                    <a href="#" class="btn btn-primary">Checkout</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
</section>

<!-- End Section Trending Product -->
