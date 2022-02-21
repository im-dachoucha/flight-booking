<?php require_once APPROOT . "/partials/adminHeader.php"?>
<body>
    <nav class="navbar bg-dark p-5 mb-5"></nav>
    <div class="container">
        <form action="<?=url("flights/add")?>" method="POST">
            <div class="mb-3">
                <label for="departureAirport" class="form-label">departure airport</label>
                <input required type="text" class="form-control" id="departureAirport" name="departureAirport">
            </div>
            <div class="mb-3">
                <label for="arrivalAirport" class="form-label">arrival airport</label>
                <input required type="text" class="form-control" id="arrivalAirport" name="arrivalAirport">
            </div>
            <div class="mb-3">
                <label for="departureDate" class="form-label">departure date</label>
                <input required type="datetime-local" class="form-control" id="departureDate" name="departureDate">
            </div>
            <div class="mb-3">
                <label for="arrivalDate" class="form-label">arrival date</label>
                <input required type="datetime-local" class="form-control" id="arrivalDate" name="arrivalDate">
            </div>
            <div class="mb-3">
                <label for="nbrSeats" class="form-label">number of seats</label>
                <input required type="number" class="form-control" id="nbrSeats" name="nbrSeats">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">price</label>
                <input required type="number" step="0.1" class="form-control" id="price" name="price">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>