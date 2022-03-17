<?php
session_start();
if(!isset($_SESSION["userId"])){
    header("Location: " . url("users"));
    die();
}
?>
<?php require APPROOT . "/partials/userheader.php"?>
    <main style="min-height: 90vh;" class=" d-flex justify-content-center align-items-center">
        <form class="col-md-4 col-8" action="<?=url("bookings/book")?>" method="POST">
            <input type="text" name="f1" value="<?=$flight1?>" hidden>
            <input type="number" name="seats" value="<?=$seats?>" hidden>
            <input type="text" name="trip" value="<?=$trip?>" hidden>
            <?php if($trip == "round"):?>
                <input type="text" name="f2" hidden value="<?=$flight2?>">
            <?php endif?>
            
            <?php for($seat = 0; $seat < $seats; $seat++):?>
                <div class="mb-3">
                    <input class="form-control" type="text" name="firstname[]" placeholder="first name">
                </div>
                <div class="mb-3">
                    <input class="form-control" type="text" name="lastname[]" placeholder="last name">
                </div>
                <div class="mb-5">
                    <input class="form-control" type="date" name="birthdate[]">
                </div>
            <?php endfor?>
            <button type="submit" class="btn btn-success">book</button>
        </form>
    </main>
</body>

</html>