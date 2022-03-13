<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.css" integrity="sha512-E+53kXnJyuZFSz75xSmTfCpUNj3gp9Bd80TeQQMTPJTVWDRHPOpEYczGwWtsZXvaiz27cqvhdH8U+g/NMYua3A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title><?= $title ?></title>
</head>

<body style="min-height: 100vh;object-fit: cover;background: url('<?= BURL . '/public/img/home-bg.webp' ?>') no-repeat bottom;">
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">flight booking site</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="nav">
                <ul class="navbar-nav justify-content-end flex-grow-1">
                    <div class="d-flex align-items-center">
                        <?php session_start();
                        if (!isset($_SESSION["userId"])) : ?>
                            <button type="button" class="btn btn-danger px-3 me-2"><a class="link-light" href="#">login</a></button>
                            <button type="button" class="btn btn-outline-danger me-3"><a class="link-light" href="#">register</a></button>
                        <?php else : ?>
                            <button type="button" class="btn btn-success rounded-pill me-2"><a style="text-decoration: none;color: white" href="">profile</a></button>
                            <button type="button" class="btn btn-danger rounded-pill me-2"><a style="text-decoration: none;color: white" href="<?= url("users/logout") ?>"><i class="fa-solid fa-arrow-right-from-bracket"></i></a></button>
                        <?php endif; ?>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
    <main style="min-height: 90vh;" class=" d-flex justify-content-center align-items-center">
        <div class="container">
            <form action="<?=url("flights/search_flights")?>" method="GET" class="row d-flex justify-content-start align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong bg-light bg-opacity-75" style="border-radius: 1rem;">
                        <div class="card-body p-5">

                            <h3 class="mb-5 text-center">search flight</h3>

                            <div class="d-flex justify-content-around align-items-center flex-wrap">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="trip" value="one" id="one" checked>
                                    <label class="form-check-label" for="one">one way</label>
        
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="trip" value="round" id="round" required>
                                    <label class="form-check-label" for="round">round trip</label>
                                </div>
                            </div>

                            <div class="form-outline mb-2">
                                <label class="form-label" for="from">from</label>
                                <input type="text" id="from" name="from" class="form-control form-control-md"  required/>
                            </div>

                            <div class="form-outline mb-2">
                                <label class="form-label" for="to">to</label>
                                <input type="text" id="to" name="to" class="form-control form-control-md"  required/>
                            </div>

                            <div class="form-outline mb-2">
                                <label class="form-label" for="departure">departure</label>
                                <input type="date" id="departure" name="departure" class="form-control form-control-md"  required/>
                            </div>

                            <div class="form-outline mb-2 returnDiv" hidden>
                                <label class="form-label" for="return">return</label>
                                <input type="date" id="return" name="return" class="form-control form-control-md"/>
                            </div>

                            <div class="form-outline mb-2 returnDiv">
                                <label class="form-label" for="seats">number of seats</label>
                                <input type="number" min="1" id="seats" name="seats" class="form-control form-control-md" required/>
                            </div>

                            <button class="btn btn-primary btn-lg btn-block" type="submit">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>

<script src="<?=BURL . "/public/js/form.js"?>"></script>

</html>