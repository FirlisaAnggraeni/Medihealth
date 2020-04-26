<?= view("component/header") ?>
<?= view("component/navbar") ?>

<div class="container">
    <div class="row my-5">
        <div class="col">
            <div class="card">
                <form class="card-body" action="<?= base_url(isset($product) ? "api/product/edit/$product[id]" : "api/product/create") ?>" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label>name</label>
                        <input type="text" name="name" class="form-control" required value="<?= $product["name"] ?? "" ?>">
                    </div>
                    <div class="form-group">
                        <label>description</label>
                        <textarea name="description" class="form-control" required><?= $product["description"] ?? "" ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>banner</label>
                        <br>
                        <?php if (isset($product["banner"])) : ?>
                            <img src="<?= base_url($product["banner"]) ?>" width="50%">
                        <?php endif ?>
                        <input type="file" name="banner" accept="image/*" <?= !isset($product) ? "required" : "" ?>>
                    </div>
                    <div class="form-group">
                        <label>price</label>
                        <input type="number" name="price" class="form-control" required value="<?= $product["price"] ?? "" ?>">
                    </div>
                    <div class="form-group">
                        <label>stock</label>
                        <input type="number" name="stock" class="form-control" required value="<?= $product["stock"] ?? "" ?>">
                    </div>
                    <button type="submit" class="btn btn-primary form-control">submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= view("component/contact") ?>
<?= view("component/footer") ?>