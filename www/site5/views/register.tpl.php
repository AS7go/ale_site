<?php require_once VIEWS . '/incs/header.tpl.php'; ?>


<div class="container mt-3">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1><?= $title; ?></h1>
            <!-- <form action="register.php"> -->
            <form method="post">
                <div class="form-floating mb-3">
                    <input name="name" type="text" class="form-control" id="name" 
                    placeholder="Name" value="<?= old('name');?>">
                    <label for="name">Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="email" type="text" class="form-control" id="email" 
                    placeholder="Email" value="<?= old('email');?>">
                    <label for="email">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="password" type="password" class="form-control" id="password" placeholder="secret">
                    <label for="password">Password</label>
                </div>

                <button type="submit" class="btn btn-primary">Register</button>
            </form>

        </div>
    </div>
</div>

<?php require_once VIEWS . '/incs/footer.tpl.php'; ?>