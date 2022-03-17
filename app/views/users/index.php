<?php require APPROOT . "/partials/userheader.php"?>
    <section class="d-flex justify-content-start align-items-center" style="background: url('<?= BURL . "/public/img/main-bg-1.avif" ?>') no-repeat;background-size: 100%;height:90vh;">
        <div class="container">
            <form action="<?=url("users/login")?>" method="POST" class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5">login</h3>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control form-control-lg" />
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" id="password" name="pass" class="form-control form-control-lg" />
                            </div>

                            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

                            <p class="mt-3">don't have an account yet? <a href="<?=BURL . "/users/register"?>">register</a></p>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>

</html>