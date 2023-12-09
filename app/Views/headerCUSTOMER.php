<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Management System</title>

    <!-- Add your CSS stylesheets and other head elements here -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #272727;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        header h1 {
            margin: 0;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        nav ul li {
            display: inline-block;
            margin-right: 20px;
        }

        nav a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            font-size: 16px;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .user-info {
            display: flex;
            align-items: center;
        }

        .user-info img {
            width: 30px;
            /* Adjust as needed */
            height: 30px;
            /* Adjust as needed */
            border-radius: 50%;
            margin-right: 10px;
        }

        .center-content {
            text-align: center;
            margin: 0 auto;
        }

        .logout-link {
            text-decoration: none;
            color: #fff;
            /* Set the color for the "Logout" link */
            font-weight: bold;
            font-size: 16px;
            margin-right: 20px;
            /* Adjust as needed */
        }

        .user-info span {
            margin-right: 10px;
            /* Adjust the margin between text and image */
        }
    </style>
</head>

<body>

    <header>
        <div class="container">
            <a href="/logout" class="logout-link">Logout</a>
            <div class="center-content">
                <h1>Hotel Reservation</h1>
                <nav>
                    <ul>
                        <li><a href="<?php echo base_url('home_customer'); ?>">Rooms</a></li>
                        <li><a href="<?php echo base_url('reservations'); ?>">Reservations</a></li>
                        <li><a href="<?php echo base_url('about'); ?>">Travel</a></li>
                    </ul>
                </nav>
            </div>
            <div class="user-info">
                <span>
                    <?php echo session()->get('user_name'); ?>
                </span>
                <img src="<?php echo base_url('/user_icon.png'); ?>" alt="User Icon">
            </div>
        </div>
    </header>

</body>