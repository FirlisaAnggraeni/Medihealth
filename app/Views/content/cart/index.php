<?= view("component/header") ?>
<?= view("component/navbar") ?>

<div class="container">
    <div class="row py-5">
        <div class="col">
            <div class="card">
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price/pcs</th>
                                <th>Qty</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0;
                            foreach ($carts as $cart) : ?>
                                <tr>
                                    <td><a href="<?= base_url("product/$cart[product_id]") ?>"><?= $cart["name"] ?></a></td>
                                    <td>Rp. <?= $cart["price"] ?></td>
                                    <td>
                                        <form action="<?= base_url("api/cart/edit/$cart[id]") ?>" method="post">
                                            <div class="input-group mb-3">
                                                <input type="number" name="qty" max="<?= $cart["stock"] + $cart["qty"] ?>" min="1" class="form-control form-control-sm" value="<?= $cart["qty"] ?>">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-warning btn-sm">edit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                    <td>Rp.
                                        <?php
                                        $temp = $cart["price"] * $cart["qty"];
                                        $total += $temp;
                                        echo $temp;
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url("cart/destroy/$cart[id]") ?>" class="btn btn-danger btn-sm">delete</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <div class="my-2 text-center font-weight-bolder">
                        Total: RP. <?= $total ?>
                    </div>
                    <?php if ($carts) : ?>
                        <a href="<?= base_url("api/transaction/buy") ?>" class="form-control btn btn-primary">Buy</a>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= view("component/contact") ?>
<?= view("component/footer") ?>