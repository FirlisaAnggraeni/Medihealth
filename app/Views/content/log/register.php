<?= view("component/log/header") ?>

<form action="<?= base_url("api/user/register") ?>" method="post">
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
    <div class="form-group row">
        <label class="col-3 col-form-label">Name</label>
        <div class="col-9">
            <input type="text" name="name" class="form-control" required>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-3 col-form-label">Email</label>
        <div class="col-9">
            <input type="email" name="email" class="form-control" required>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-3 col-form-label">Phone</label>
        <div class="col-9">
            <input type="text" pattern="\+62\d+" title="the phone must start with +62 " name="phone" class="form-control" required placeholder="+62">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-3 col-form-label">Address</label>
        <div class="col-9">
            <textarea name="address" class="form-control" required></textarea>
        </div>
    </div>
    <button type="submit" class="btn btn-primary w-50 float-right">Submit</button>
</form>

<?= view("component/log/footer") ?>