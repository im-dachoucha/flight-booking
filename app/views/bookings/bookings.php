<?php
// session_start();
if(!isset($_SESSION["userId"])){
    header("Location: " . url("users"));
    die();
}
?>
<?php require APPROOT . "/partials/userheader.php"?>
    <main style="min-height: 90vh;" class=" d-flex justify-content-center align-items-center">
        <?php if(count($bookings) > 0):?>
        <div class="table-responsive-md">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">first name</th>
                        <th scope="col">last name</th>
                        <th scope="col">birthdate</th>
                        <th scope="col">booking date</th>
                        <th scope="col">takeoff</th>
                        <th scope="col">landing</th>
                        <th scope="col">origin</th>
                        <th scope="col">destination</th>
                        <th scope="col">price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bookings as $booking) : ?>
                        <tr>
                            <td><?= $booking["firstName"] ?></td>
                            <td><?= $booking["lastName"] ?></td>
                            <td><?= $booking["birthDate"] ?></td>
                            <td><?= $booking["bookingDate"] ?></td>
                            <td><?= $booking["departureDate"] ?></td>
                            <td><?= $booking["arrivalDate"] ?></td>
                            <td><?= $booking["departureAirport"] ?></td>
                            <td><?= $booking["arrivalAirport"] ?></td>
                            <td><?= $booking["price"] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else:?>
            <div class="alert alert-warning">You have no booking</div>
        <?php endif?>
    </main>
</body>

</html>