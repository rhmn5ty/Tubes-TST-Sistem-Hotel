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
            justify-content: center;
            /* Center the container horizontally */
            height: 35vh;
            width: 75%;
            margin: 0 auto;
            /* Center the container horizontally */
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

        .form-container {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

        .input-container {
            width: 48%;
            /* Adjust the width as needed */
            margin-right: 2%;
            /* Add margin-right to create space between input-containers */
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            margin-bottom: 5px;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        textarea {
            width: 100%;
            /* Set textarea width to 100% */
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            resize: vertical;
            /* Allow vertical resizing */
        }

        button {
            width: 100%;
            /* Adjust the width as needed */
            padding: 10px 20px;
            background-color: #0ad3ff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
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

        .buttons {
            position: absolute;
            bottom: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
            width: 95%;
            /* Add this line to ensure buttons take up the full width */
        }

        .edit-button,
        .delete-button {
            display: inline-block;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            margin-right: 10px;
        }

        .edit-button {
            background-color: #28a745;
            /* Green color for Edit button */
            color: #fff;
        }

        .delete-button {
            background-color: #dc3545;
            /* Red color for Delete button */
            color: #fff;
        }

        .buttons a:last-child {
            margin-right: 0;
        }
    </style>



</head>

<body>
    <div class="content-container">
        <h2>Add New Hotel Location</h2>

        <?php if (session()->getFlashdata('pesan')): ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
        <?php endif; ?>

        <div class="detail-container">
            <div class="hotel-details">
                <div class="hotel-info">
                    <form action="/add" method="post">
                        <div class="form-container">
                            <div class="input-container">
                                <div class="form-group">
                                    <label for="city">City:</label>
                                    <input type="text" id="city" name="city" required>
                                </div>
                            </div>
                            <div class="input-container">
                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <textarea id="description" name="description" rows="4" required></textarea>
                                </div>
                            </div>
                            <div class="input-container">
                                <div class="form-group">
                                    <label for="pricePerNight">Price per Night:</label>
                                    <input type="number" id="pricePerNight" name="price_per_night" min="0" required>
                                </div>
                            </div>
                        </div>

                        <button type="submit">Add Location</button>
                    </form>
                </div>
            </div>
        </div>

        <h2>Available Locations</h2>

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
                        <div class="buttons">
                            <a href="" class="edit-button">Edit</a>
                            <a href="" class="delete-button">Delete</a>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php else: ?>
                <h3>No Data</h3>
                <p>Unable to find any data for you.</p>
            <?php endif ?>
        </div>
    </div>

</body>