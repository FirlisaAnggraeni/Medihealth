<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?= base_url("") ?>">MEDI-HEALTH</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <!-- --------------------------------------------------------------------------------------------------- -->
    <ul class="navbar-nav mr-auto">
      <?php if (is_admin()) : ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url("product/create") ?>">Create Product</a>
        </li>
      <?php endif ?>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url("about") ?>">About</a>
      </li>
    </ul>

    <!-- --------------------------------------------------------------------------------------------------- -->
    <form class="form-inline my-2 my-lg-0" action="<?= base_url("/") ?>" method="get">
      <input class="form-control form-control-sm mr-sm-2" placeholder="search product" name="name" value="<?= $_GET["name"] ?? "" ?>">
      <button class="btn btn-outline-primary btn-sm my-2 my-sm-0" type="submit">Search</button>
    </form>

    <!-- --------------------------------------------------------------------------------------------------- -->
    <ul class="navbar-nav ml-auto">
      <?php if (!is_admin()) : ?>
        <?php
          $CartTransaction = new App\Models\CartTransaction();
          $cart_transaction = $CartTransaction->findByUserId(session()->get("user")["id"]);
          if ($cart_transaction) : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url("transaction") ?>">Transaction</a>
          </li>
        <?php endif ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url("cart") ?>">Cart</a>
        </li>
      <?php endif ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?= session()->get("user")["name"] ?>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item" href="<?= base_url("profile") ?>">Profile</a>
          <a class="dropdown-item" href="<?= base_url("logout") ?>">Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>