<?= view("component/header") ?>
<?= view("component/navbar") ?>

<div class="container my-4">
    <?php foreach ($transactions as $transaction) : ?>
        <div class="row my-5">
            <div class="col">
                <div class="card">
                    <div class="card-header"><?= $transaction["datetime"] ?></div>
                    <div class="card-body table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Price/pcs</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total = 0;
                                $CartTransaction = new App\Models\CartTransaction();
                                $carts = $CartTransaction->find(["transaction_id" => $transaction["id"]]);
                                foreach ($carts as $cart) : ?>
                                    <tr>
                                        <td><a href="<?= base_url("product/$cart[product_id]") ?>"><?= $cart["name"] ?></a></td>
                                        <td>Rp. <?= $cart["price"] ?></td>
                                        <td><?= $cart["qty"] ?></td>
                                        <td>Rp. <?php
                                                $temp = $cart["price"] * $cart["qty"];
                                                $total += $temp;
                                                echo $temp;
                                                ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <div class="my-2 text-center font-weight-bolder">
                            Total: RP. <?= $total ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>

<?= view("component/contact") ?>
<?= view("component/footer") ?>