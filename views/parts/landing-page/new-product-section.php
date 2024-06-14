<!-- Start Section New Product -->
<div class="new-product mb-4">
    <div class="container">
        <h2 class="section-title">New Shoes</h2>
        <div class="row">
            <?php foreach ($datas as $data): ?>

                <div class="col-md-6 col-12 col-sm-12">
                    <div class="card mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h6 class="card-title fw-bold"><?=$data[1]?></h6>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text">
                                        <a href="#" class="link text-body-secondary">Detail -></a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <img src="<?=BASE_URL . $data[3]?>" class="card-img-top img-fluid"
                                     alt="new-product-1"/>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach;?>
        </div>
    </div>
</div>
<!-- End Section New Product -->