<?php require_once APPROOT . "/partials/adminHeader.php"?>
<body>
    <?php require_once APPROOT . "/partials/adminNav.php"?>
    <div class="container">
        <?php if(!empty($flight)):
            $flight = $flight[0]?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">From</th>
                    <th scope="col">To</th>
                    <th scope="col">Takeoff at</th>
                    <th scope="col">Landing at</th>
                    <th scope="col">Available seats</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"><?=$flight["flightId"]?></th>
                    <td><?=$flight["departureAirport"]?></td>
                    <td><?=$flight["arrivalAirport"]?></td>
                    <td><?=$flight["departureDate"]?></td>
                    <td><?=$flight["arrivalDate"]?></td>
                    <td><?=$flight["nbrSeats"] - $flight["nbrSeatsReserved"]?> / <?=$flight["nbrSeats"]?></td>
                    <td>£ <?=$flight["price"]?></td>
                </tr>
            </tbody>
        </table>
        <?php else:?>
            <div class="alert alert-danger" role="alert">
                Flight with given id doesn't exist!!
            </div>
            <i class="bi-alarm" style="font-size:2rem"></i>
        <?php endif?>
    </div>
</body>
</html>