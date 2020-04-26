<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>MEDI-HEALTH</title>

    <style>
        .title {
            font-size: 50px;
            font-family: Arial, Helvetica, sans-serif
        }

        .subtitle {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif
        }

        * {
            transition: 0.6s ease-in-out !important;
        }
    </style>
</head>

<body style='background:#eee'>
    <div class="container my-5">
        <div class="row pt-5">
            <div class="col title text-center">MEDI-HEALTH</div>
        </div>
        <div class="row my-5 justify-content-center">
            <?php if ($products) : ?>
                <div class="col">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="bd-example">
                                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner text-center">
                                        <?php foreach ($products as $index => $product) : ?>
                                            <div class="carousel-item <?= $index == 0 ? 'active' : '' ?>">
                                                <img src="<?= base_url($product["banner"]) ?>" class="d-block w-100">
                                                <?= $product["name"] ?>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif ?>
            <div class="col pb-5">
                <div class="card shadow">
                    <div class="card-body px-4">
                        <div>
                            <a href="<?= base_url("login") ?>" class="float-left btn p-0 <?= strpos(uri_string(), "login") !== false ? "border-bottom" : "" ?>">Login</a>
                            <a href="<?= base_url("register") ?>" class="float-right btn p-0 <?= strpos(uri_string(), "register") !== false ? "border-bottom" : "" ?>">Register</a>
                        </div>
                    </div>
                    <div class="card-body px-4 border-top">