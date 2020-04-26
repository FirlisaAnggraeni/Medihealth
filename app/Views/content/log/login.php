<?= view("component/log/header") ?>

<form action="<?= base_url("api/user/login") ?>" method="post">
    <div class="form-group row">
        <label class="col-3 col-form-label">Username</label>
        <div class="col-9">
            <input type="text" name="username" class="form-control" required>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-3 col-form-label">Password</label>
        <div class="col-9">
            <input type="password" name="password" class="form-control" required>
        </div>
    </div>
    <button type="submit" class="btn btn-primary w-50 float-right">Login</button>
</form>

<?= view("component/log/footer") ?>