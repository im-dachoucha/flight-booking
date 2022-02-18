<?php require_once APPROOT . "/partials/header.php"?>
<body>
    <nav class="navbar bg-dark p-5 mb-5"></nav>
    <!-- <div class="container d-flex justify-content-end">
    </div> -->
        <div class="container">
            <!-- <a href="<?=BURL?>/flights/add" class="link-light"><button class="btn btn-success btn-sm"><i class="fa-solid fa-plus"></i></button></a> -->
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">from</th>
                        <th scope="col">to</th>
                        <th scope="col">takeoff at</th>
                        <th scope="col">landing at</th>
                        <th scope="col">available seats</th>
                        <th scope="col">price</th>
                        <th scope="col">actions</th>
                        <th scope="col">
                            <a href="<?=url("flights/new")?>" class="text-center btn btn-outline-success btn-sm"><i class="fa-solid fa-plus"></i></a>
                        </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($flights as $flight):?>
                    <tr>
                        <th scope="row"><?=$flight["flightId"]?></th>
                        <td><?=$flight["departureAirport"]?></td>
                        <td><?=$flight["arrivalAirport"]?></td>
                        <td><?=$flight["departureDate"]?></td>
                        <td><?=$flight["arrivalDate"]?></td>
                        <td><?=$flight["nbrSeats"] - $flight["nbrSeatsReserved"]?> / <?=$flight["nbrSeats"]?></td>
                        <td>£ <?=$flight["price"]?></td>
                        <td>
                            <form action="<?=url("flights/delete")?>" method="POST" class="d-inline">
                                <input type="text" name="id" hidden value="<?=$flight['flightId']?>">
                                <input type="submit" value="delete" name="delete" class="btn btn-outline-danger btn-sm">
                            </form>
                            <form action="<?=url("flights/edit")?>" method="POST" class="d-inline">
                                <input type="text" name="id" hidden value="<?=$flight['flightId']?>">
                                <input type="submit" value="edit" name="edit" class="btn btn-outline-primary btn-sm">
                            </form>
                            <!-- <a class="btn btn-danger btn-sm">delete</a> -->
                            <!-- <a class="btn btn-primary btn-sm">edit</a> -->
                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</body>
</html>