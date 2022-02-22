<?php
session_start();
if(isset($_SESSION["adminId"])) {header("Location: " . url("flights"));die();}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous" defer></script>
    <title>admin login</title>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <form class="col-md-4 p-3" action="<?=url("adminLogin/login")?>" method="POST">
            <div class="mb-3">
                <label class="form-label" for="username">username</label>
                <input class="form-control" type="text" name="username" id="username" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="password">password</label>
                <input class="form-control" type="password" name="password" id="password" required>
            </div>
            <button class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>