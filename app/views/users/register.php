<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title><?= $title ?></title>
</head>

<body style="height:100vh;">
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">flight booking site</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="nav">
                <ul class="navbar-nav justify-content-end flex-grow-1">
                    <div class="d-flex align-items-center">
                        <button type="button" class="btn btn-danger px-3 me-2"><a class="link-light" href="#">login</a></button>
                        <button type="button" class="btn btn-outline-danger me-3"><a class="link-light" href="#">register</a></button>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
    <section class="d-flex justify-content-start align-items-center" style="background: url('<?= BURL . "/public/img/main-bg-1.avif" ?>') no-repeat;background-size: 100%;height:90vh;">
        <div class="container">
            <form action="<?=url("users/register")?>" method="POST" class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5">register</h3>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="first">first name</label>
                                <input type="first" id="first" name="first" class="form-control form-control-lg" />
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="last">last name</label>
                                <input type="last" id="last" name="last" class="form-control form-control-lg" />
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="birthdate">birthdate</label>
                                <input type="date" id="birthdate" name="birthdate" class="form-control form-control-lg" />
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control form-control-lg" />
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" id="password" name="pass" class="form-control form-control-lg" />
                            </div>

                            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

                            <p>have an account already? <a href="users">login</a></p>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>

</html>