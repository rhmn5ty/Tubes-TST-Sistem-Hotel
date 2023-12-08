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
            background-color: #3498db;
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
        }
    </style>
</head>

<body>

    <header>
        <div class="container">
            <h1>Hotel Management System</h1>
            <nav>
                <ul>
                    <li><a href="<?php echo base_url('home'); ?>">Home</a></li>
                    <li><a href="<?php echo base_url('rooms'); ?>">Rooms</a></li>
                    <li><a href="<?php echo base_url('reservations'); ?>">Reservations</a></li>
                    <li><a href="<?php echo base_url('about'); ?>">About Us</a></li>
                    <li><a href="<?php echo base_url('contact'); ?>">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

</body>