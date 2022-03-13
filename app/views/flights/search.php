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

<body style="min-height: 100vh">
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
        <?php if(isset($error)):?>
            <div class="alert alert-warning"><?=$error?></div>
            <?php elseif($trip == "one"):?>
                <div class="container d-flex flex-column gap-3">
                    
                    <?php foreach($res1 as $flight):?>
                        <div class="container d-flex flex-md-row justify-md-content-between flex-column justify-content-around align-items-center border border-warning py-2">
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-around mb-2">
                                    <?=$flight["departureAirport"]?> <i class="fa-solid fa-arrow-right"></i> <?=$flight["arrivalAirport"]?>
                                </div>
                                <div class="d-flex flex-md-row justify-content-around flex-column gap-1 mb-3">
                                    <span>Take-off : <?=$flight["departureDate"]?></span>
                                    <span>Landing : <?=$flight["arrivalDate"]?></span>
                                </div>
                            </div>
                            <button class="btn btn-success" style="width: max-content">book | £<?=$flight["price"]?> per seat</button>
                        </div>
                    <?php endforeach?>
                </div>
                <?php else:?>
                    <div class="container d-flex flex-column gap-3">
                    
                    <?php foreach($res1 as $go):
                        foreach($res2 as $back):?>
                        <div class="container d-flex flex-md-row justify-md-content-between flex-column justify-content-around align-items-center border border-warning py-2">
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-around mb-2">
                                    <?=$go["departureAirport"]?> <i class="fa-solid fa-arrow-right"></i> <?=$go["arrivalAirport"]?>
                                </div>
                                <div class="d-flex flex-md-row justify-content-around flex-column gap-1 mb-3">
                                    <span>Take-off : <?=$go["departureDate"]?></span>
                                    <span>Landing : <?=$go["arrivalDate"]?></span>
                                </div>
                                <div class="d-flex justify-content-around mb-2">
                                    <?=$back["departureAirport"]?> <i class="fa-solid fa-arrow-right"></i> <?=$back["arrivalAirport"]?>
                                </div>
                                <div class="d-flex flex-md-row justify-content-around flex-column gap-1 mb-3">
                                    <span>Take-off : <?=$back["departureDate"]?></span>
                                    <span>Landing : <?=$back["arrivalDate"]?></span>
                                </div>
                            </div>
                            <button class="btn btn-success" style="width: max-content">book | £<?=$go["price"] + $back["price"]?> per seat</button>
                        </div>
                    <?php endforeach;endforeach?>
                </div>
            <?php endif?>
    </main>
</body>
</html>