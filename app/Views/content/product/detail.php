<?= view("component/header") ?>
<?= view("component/navbar") ?>

<div class="container">
    <div class="row">
        <div class="col py-5">
            <div class="card">
                <div class="card-body row">
                    <div class="col">
                        <img src="<?= base_url($product["banner"]) ?>" width="100%">
                    </div>
                    <div class="col">
                        <?php if (is_admin()) : ?>
                            <div class="float-right">
                                <a href="<?= base_url("product/edit/$product[id]") ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="<?= base_url("api/product/destroy/$product[id]") ?>" class="btn btn-sm btn-danger">Destroy</a>
                            </div>
                        <?php endif ?>
                        <div>
                            <h3><?= $product["name"] ?></h3>
                        </div>
                        <div class="mb-3">
                            <span class="h6">Rp. <?= $product["price"] ?></span>
                            <span class="float-right"><?= $product["stock"] ?> stocks are available</span>
                        </div>
                        <?php if (!is_admin()) : ?>
                            <div class="mb-3">
                                <a href="<?= base_url("api/cart/add/$product[id]") ?>" class="btn btn-primary form-control <?= $product["stock"] <= 0 ? "disabled" : "" ?>">Add to Cart</a>
                            </div>
                        <?php endif ?>
                        <div>
                            <?= $product["description"] ?>
                        </div>
                    </div>
                </div>
                <?php if (!is_admin()) : ?>
                    <form action="<?= base_url("api/review/create/$product[id]") ?>" class="card-body border-top" method="post">
                        <div class="form-group">
                            <h4>Add Review</h4>
                            <textarea name="review" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                <?php endif ?>
                <div class="card-body border-top">
                    <h4>Reviews</h4>
                    <?php foreach ($reviews as $review) : ?>
                        <div class="card my-3">
                            <div class="card-body"><?= $review["review"] ?></div>
                            <div class="card-footer">
                                <?php if ($review["user_id"] == session()->get("user")["id"]) : ?>
                                    <a href="<?= base_url("api/review/destroy/$review[id]") ?>" class="btn btn-sm btn-danger">delete</a>
                                <?php endif ?>
                                <div class="float-right">
                                    - <?= $review["name"] ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= view("component/contact") ?>
<?= view("component/footer") ?>