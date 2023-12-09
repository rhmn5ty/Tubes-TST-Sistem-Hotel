<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Details</title>

    <!-- Add your CSS stylesheets and other head elements here -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

    <style>
        /* Add additional styles specific to this view */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .detail-container {
            display: flex;
            align-items: center;
            /* Align items to the top */
            justify-content: space-between;
            /* Add space between hotel-details and payment-container */
            height: 80vh;
            /* Adjust as needed */
            width: 80%;
            /* Adjust the width as needed */
            margin: 0 auto;
            /* Center the container */
        }

        .hotel-details-container {
            width: 75%;
        }

        .hotel-details {
            display: flex;
            align-items: center;
            justify-content: space-around;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .hotel-details img {
            max-width: 30%;
            border-radius: 6px;
            margin-right: 20px;
        }

        .hotel-info {
            flex: 1;
        }

        .hotel-info h2 {
            margin-bottom: 10px;
        }

        .hotel-info p {
            margin-bottom: 20px;
        }

        .payment-container {
            width: 20%;
            /* Adjust the width as needed */
        }

        .total-payment-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-around;
            height: 100%;
            /* Take full height of payment-container */
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .total-payment-container h2 {
            margin-bottom: 10px;
        }

        .total-payment-container p {
            margin-bottom: 20px;
        }

        .submit-button {
            padding: 10px 20px;
            background-color: #0ad3ff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .reservation-form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 10px;
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Function to update total payment
            function updateTotalPayment() {
                // Get values from inputs
                var roomAmount = parseInt(document.getElementById("roomAmount").value) || 0;
                var pricePerNight = <?= $location['price_per_night'] ?>;
                var duration = parseInt(document.getElementById("duration").value) || 0;

                // Calculate total payment
                var totalPayment = roomAmount * pricePerNight * duration;

                // Display total payment
                document.getElementById("totalPayment").innerText = "Rp " + totalPayment.toLocaleString();
            }

            // Attach event listeners to input fields
            document.getElementById("roomAmount").addEventListener("input", updateTotalPayment);
            document.getElementById("duration").addEventListener("input", updateTotalPayment);

            updateTotalPayment()
        });
    </script>
</head>

<body>

    <div class="detail-container">
        <div class="hotel-details-container">
            <div class="hotel-details">
                <img src="<?php echo base_url('/hilton.png'); ?>" alt="Hotel Image">
                <div class="hotel-info">
                    <h2>
                        Hilton
                        <?php echo esc($location['city']); ?>
                    </h2>
                    <p>
                        <?php echo esc($location['description']); ?>
                    </p>
                    <p>
                        Price per night: Rp
                        <?= number_format($location['price_per_night'], 0, ',', '.') ?>/room
                    </p>
                    <form class="reservation-form" action="/reserve" method="post">
                        <div class="form-group">
                            <label for="roomAmount">Amount of Room:</label>
                            <input type="number" id="roomAmount" name="roomAmount" required min="1" value="1">
                        </div>

                        <div class="form-group">
                            <label for="duration">Duration of Stay (days):</label>
                            <input type="number" id="duration" name="duration" required min="1" value="1">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="payment-container">
            <div class="total-payment-container">
                <!-- Total payment content -->
                <h2>Total Payment</h2>
                <p id="totalPayment">
                    <!-- Display total payment here -->
                </p>
                <button class="submit-button" type="submit">Reserve</button>
            </div>
        </div>
    </div>

</body>