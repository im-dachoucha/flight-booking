<?php require_once APPROOT . "/partials/adminHeader.php"?>
<body>
    <?php require_once APPROOT . "/partials/adminNav.php"?>
    <!-- <div class="container d-flex justify-content-end">
    </div> -->
        <!-- <div class="container"> -->
            <div class="table-responsive-lg">
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
                                        <!-- <input type="submit" value="delete" name="delete" class="btn btn-outline-danger btn-sm"> -->
                                        <button type="submit" value="delete" name="delete" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash-can"></i></button>
                                    </form>
                                    <form action="<?=url("flights/edit")?>" method="POST" class="d-inline">
                                        <input type="text" name="id" hidden value="<?=$flight['flightId']?>">
                                        <!-- <input type="submit" value="edit" name="edit" class="btn btn-outline-primary btn-sm"> -->
                                        <button type="submit" value="edit" name="edit" class="btn btn-outline-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></button>
                                    </form>
                                    <!-- <a class="btn btn-danger btn-sm">delete</a> -->
                                    <!-- <a class="btn btn-primary btn-sm">edit</a> -->
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        <!-- </div> -->
    </body>
</html>