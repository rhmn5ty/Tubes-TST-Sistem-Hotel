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
            // Function to update total payment and number of nights
            function updateTotalPaymentAndNights() {
                // Get values from inputs
                var roomAmount = parseInt(document.getElementById("roomAmount").value) || 0;
                var pricePerNight = <?= $location['price_per_night'] ?>;
                var startDateInput = document.getElementById("startDate");
                var startDate = new Date(startDateInput.value);
                var endDateInput = document.getElementById("endDate");
                var endDate = new Date(endDateInput.value);

                // Calculate number of nights
                var duration = Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24));
                duration = isNaN(duration) ? 0 : duration;

                // Calculate total payment
                var totalPayment = roomAmount * pricePerNight * duration;

                // Display number of nights and total payment
                document.getElementById("numberOfNights").innerText = "Number of Nights: " + duration;
                document.getElementById("totalPayment").innerText = totalPayment.toLocaleString();
            }

            // Attach event listeners to input fields
            document.getElementById("roomAmount").addEventListener("input", updateTotalPaymentAndNights);
            document.getElementById("startDate").addEventListener("input", function () {
                enforceDateRule("startDate", "endDate");
                updateTotalPaymentAndNights();
            });
            document.getElementById("endDate").addEventListener("input", function () {
                enforceDateRule("startDate", "endDate");
                updateTotalPaymentAndNights();
            });

            function enforceDateRule(startId, endId) {
                var startDate = new Date(document.getElementById(startId).value);
                var endDate = new Date(document.getElementById(endId).value);
                var maxStartDate = new Date(endDate);
                maxStartDate.setDate(endDate.getDate() - 1);

                // Check if the end date is before the start date
                document.getElementById("startDate").setAttribute("max", formatDate(maxStartDate));
                document.getElementById("endDate").setAttribute("min", formatDate(startDate));
            }

            function formatDate(date) {
                var year = date.getFullYear();
                var month = ("0" + (date.getMonth() + 1)).slice(-2);
                var day = ("0" + date.getDate()).slice(-2);
                return year + "-" + month + "-" + day;
            }

            updateTotalPaymentAndNights();
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
                    <form class="reservation-form" id="reservation-form" action="/reserve/<?= $location['city']; ?>"
                        method="post">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <label for="roomAmount">Amount of Room:</label>
                            <input type="number" id="roomAmount" name="roomAmount" required min="1" value="1">
                        </div>

                        <div class="form-group">
                            <label for="startDate">Start Date:</label>
                            <input type="date" id="startDate" name="startDate" required
                                min="<?php echo date('Y-m-d'); ?>">
                        </div>

                        <div class="form-group">
                            <label for="endDate">End Date:</label>
                            <input type="date" id="endDate" name="endDate" required
                                min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="payment-container">
            <div class="total-payment-container">
                <!-- Number of nights content -->
                <p id="numberOfNights">
                    <!-- Display number of nights here -->
                </p>
                <!-- Total payment content -->
                <h2>Total Payment</h2>
                <p id="totalPayment">
                    <!-- Display total payment here -->
                </p>
                <button class="submit-button" type="button" onclick="submitForm()">Reserve</button>

                <script>
                    function submitForm() {
                        document.getElementById("reservation-form").submit();
                    }
                </script>
            </div>
        </div>
    </div>

</body>