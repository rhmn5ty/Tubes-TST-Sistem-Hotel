<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Management System</title>

    <style>
        /* Add any additional styles specific to the home page */
        body {
            margin: 0;
            /* Remove default margin */
            padding: 0;
            /* Remove default padding */
            box-sizing: border-box;
            display: flex;
            /* Use flexbox for layout */
            flex-direction: column;
            /* Arrange children in a column */
            min-height: 100vh;
            /* Minimum height to cover the viewport */
        }

        .hotel-card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
            /* Add padding for spacing */
            overflow-y: auto;
            /* Allow vertical scrolling for the container */
            height: 100%;
            /* Allow the container to take the remaining height */
        }

        .hotel-card {
            flex-basis: calc(30% - 20px);
            /* 25% minus padding */
            margin: 5px;
            /* Set a shorter margin */
            padding: 15px 15px 40px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
            position: relative;
            flex-direction: column;
            justify-content: space-between;
        }

        .hotel-card img {
            max-width: 100%;
            height: auto;
            border-radius: 6px;
            margin-bottom: 10px;
        }

        .content-container {
            width: 80%;
            margin: 0 auto;
            /* Center the container horizontally */
            flex: 1;
            /* Allow the container to grow and take remaining space */
        }

        .reservation-button {
            position: absolute;
            bottom: 10px;
            /* Adjust the distance from the bottom */
            left: 50%;
            /* Center horizontally */
            transform: translateX(-50%);
            /* Center horizontally */
            padding: 10px 20px;
            /* Adjust padding as needed */
            background-color: #0ad3ff;
            /* Button background color */
            color: #fff;
            /* Button text color */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: auto;
            text-decoration: none;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 5px;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }
    </style>
</head>

<body>

    <div class="content-container">
        <h2>Hotel Hilton</h2>
        <?php if (session()->getFlashdata('pesan')): ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>

        <div class="hotel-card-container">
            <?php if (!empty($location) && is_array($location)): ?>

                <?php foreach ($location as $location_item): ?>
                    <div class="hotel-card">
                        <div class="card-content">
                            <img src="<?php echo base_url('/hilton.png'); ?>" alt="Hotel">
                            <h3>Hilton
                                <?= esc($location_item['city']) ?>
                            </h3>
                            <p>
                                <?= esc($location_item['description']) ?>
                            </p>
                            <p>
                                Price per night: Rp
                                <?= number_format($location_item['price_per_night'], 0, ',', '.') ?>/room
                            </p>
                        </div>
                        <a href="/home_customer/<?= $location_item['city']; ?>" class="reservation-button">Reservation</a>
                    </div>
                <?php endforeach ?>
            <?php else: ?>
                <h3>No Data</h3>
                <p>Unable to find any data for you.</p>
            <?php endif ?>
        </div>
    </div>

</body>