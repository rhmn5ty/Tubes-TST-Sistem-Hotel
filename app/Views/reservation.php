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

        .content-container {
            width: 80%;
            margin: 0 auto;
            /* Center the container horizontally */
            flex: 1;
            /* Allow the container to grow and take remaining space */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <div class="content-container">
        <h2>
            <?php echo session()->get('user_name'); ?>'s Reservations
        </h2>

        <?php if (!empty($reservation)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Hotel</th>
                        <th>Total rooms</th>
                        <th>Check In Date</th>
                        <th>Check Out Date</th>
                        <th>Total nights</th>
                        <th>Total cost</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reservation as $reservation_item): ?>
                        <tr>
                            <td>Hilton
                                <?= esc($reservation_item->city) ?>
                            </td>
                            <td>
                                <?= esc($reservation_item->total_rooms) ?>
                            </td>
                            <td>
                                <?= esc($reservation_item->check_in_date) ?>
                            </td>
                            <td>
                                <?= esc($reservation_item->check_out_date) ?>
                            </td>
                            <td>
                                <?= esc($reservation_item->total_nights) ?>
                            </td>
                            <td>
                                Rp
                                <?= number_format($reservation_item->total_cost, 0, ',', '.') ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Kamu belum melakukan reservasi hotel apapun. Silakan melakukan reservasi</p>
        <?php endif ?>
    </div>

</body>