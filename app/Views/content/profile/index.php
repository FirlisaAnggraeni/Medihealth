<?= view("component/header") ?>
<?= view("component/navbar") ?>

<div class="container">
    <div class="row py-5">
        <div class="col">
            <div class="card">
                <div class="card-header">Profile</div>
                <form class="card-body" action="<?= base_url("api/user/edit") ?>" method="post">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" value="<?= session()->get("user")["username"] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="<?= session()->get("user")["name"] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="<?= session()->get("user")["email"] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" pattern="\+62\d+" title="the phone must start with +62 " name="phone" class="form-control" value="<?= session()->get("user")["phone"] ?>" required placeholder="+62">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea name="address" class="form-control" required><?= session()->get("user")["address"] ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary form-control">edit profile</button>

                    <?php if (!is_admin()) : ?>
                        <a href="<?= base_url("api/user/destroy") ?>" onclick="return confirm('are you sure?') ? true : false" class="mt-2 btn btn-danger form-control">delete account</a>
                    <?php endif ?>
                </form>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header">Change Password</div>
                <form class="card-body" action="<?= base_url("api/user/change-password") ?>" method="post">
                    <div class="form-group">
                        <label>Old Password</label>
                        <input type="password" name="old_password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" name="new_password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary form-control">change</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= view("component/contact") ?>
<?= view("component/footer") ?>