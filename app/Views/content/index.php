<?= view("component/header") ?>
<?= view("component/navbar") ?>

<div class="container">
    <div class="my-5">
        <div class="card-columns">
            <?php foreach ($products as $product) : ?>
                <div class="card">
                    <img src="<?= base_url($product["banner"]) ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $product["name"] ?></h5>
                        <!-- <p class="card-text"><?= $product["description"] ?></p> -->
                        <div>
                            <span class="card-text float-left">Stock: <?= $product["stock"] ?></span>
                            <span class="card-text float-right">Price: Rp. <?= $product["price"] ?></span>
                        </div>
                        <br>
                        <br>
                        <a href="<?= base_url("product/$product[id]") ?>" class="btn btn-primary form-control">Detail</a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>

<?= view("component/contact") ?>
<?= view("component/footer") ?>