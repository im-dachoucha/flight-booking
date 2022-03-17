<?php
session_start();
if(!isset($_SESSION["userId"])){
    header("Location: " . url("users"));
    die();
}
?>
<?php require APPROOT . "/partials/userheader.php"?>
    <main style="min-height: 90vh;" class=" d-flex justify-content-center align-items-center">
        <?php if(isset($error)):?>
            <div class="alert alert-warning"><?=$error?></div>
            <?php elseif($trip == "one"):?>
                <div class="container d-flex flex-column gap-3">
                    
                    <?php foreach($res1 as $flight):?>
                        <form action="<?=url("flights/reserve_seats")?>" method="POST" class="container d-flex flex-md-row justify-md-content-between flex-column justify-content-around align-items-center border border-warning py-2">
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-around mb-2">

                                    <input type="text" name="f1" value="<?=$flight["flightId"]?>" hidden>
                                    <input type="text" name="trip" value="<?=$trip?>" hidden>
                                    <input type="number" name="seats" value="<?=$seats?>" hidden>

                                    <?=$flight["departureAirport"]?> <i class="fa-solid fa-arrow-right"></i> <?=$flight["arrivalAirport"]?>
                                </div>
                                <div class="d-flex flex-md-row justify-content-around flex-column gap-1 mb-3">
                                    <span>Take-off : <?=$flight["departureDate"]?></span>
                                    <span>Landing : <?=$flight["arrivalDate"]?></span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success" style="width: max-content">book | £<?=$flight["price"]?> per seat</button>
                        </form>
                    <?php endforeach?>
                </div>
                <?php else:?>
                    <div class="container d-flex flex-column gap-3">
                    
                        <?php foreach($res1 as $go):
                            foreach($res2 as $back):?>
                            <form action="<?=url("flights/reserve_seats")?>" method="POST" class="container d-flex flex-md-row justify-md-content-between flex-column justify-content-around align-items-center border border-warning py-2">

                                <input type="text" name="f1" value="<?=$go["flightId"]?>" hidden>
                                <input type="text" name="f2" value="<?=$back["flightId"]?>" hidden>
                                <input type="text" name="trip" value="<?=$trip?>" hidden>
                                <input type="number" name="seats" value="<?=$seats?>" hidden>

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
                                <button type="submit" class="btn btn-success" style="width: max-content">book | £<?=$go["price"] + $back["price"]?> per seat</button>
                            </form>
                        <?php endforeach;endforeach?>
                    </div>
            <?php endif?>
    </main>
</body>
</html>