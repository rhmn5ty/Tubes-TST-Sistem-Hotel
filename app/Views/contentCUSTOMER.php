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
        }

        .hotel-card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin: 0;
            /* Remove margin */
            padding: 20px;
            /* Add padding for spacing */
            overflow-y: auto;
            /* Allow vertical scrolling for the container */
            height: calc(80vh - 60px);
            /* Set the height of the container (viewport height - header height) */
        }

        .hotel-card {
            flex-basis: calc(30% - 20px);
            /* 25% minus padding */
            margin: 5px;
            /* Set a shorter margin */
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
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
        }
    </style>
</head>

<body>

    <div class="content-container">
        <h2>Hotel Hilton</h2>

        <div class="hotel-card-container">
            <?php for ($i = 0; $i < 12; $i++): ?>
                <div class="hotel-card">
                    <img src="<?php echo base_url('assets/images/hilton_bandung.jpg'); ?>" alt="Hilton Bandung">
                    <h3>Hilton Bandung</h3>
                    <p>
                        Hotel Hilton Bandung is a luxurious 5-star hotel located in the heart of Bandung.
                        With modern amenities, spacious rooms, and top-notch services, Hilton Bandung
                        offers a comfortable and unforgettable stay for both business and leisure travelers.
                    </p>
                </div>
            <?php endfor; ?>
        </div>
    </div>

</body>