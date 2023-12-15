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

        .chart-container {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            height: 40vh;
            width: 80vw;
        }
    </style>
</head>

<body>
    <div class="content-container">
        <?php if (!empty($reservation)): ?>
            <div class="chart-container">
                <canvas id="dataReport"></canvas>
            </div>
            <script src="<?= base_url('chartjs/Chart.bundle.min.js') ?>"></script>
            <script>
                var dataReport = document.getElementById('dataReport');
                var data_reservation_report = [];
                var data_label = [];

                <?php foreach ($reservation as $reservation_item): ?>
                    var total_room_night = <?= esc($reservation_item->total_room_night) ?>;
                    var city = '<?= esc($reservation_item->city) ?>';
                    data_reservation_report.push(total_room_night);
                    data_label.push(city);
                <?php endforeach ?>

                var data_chart_reservation = {
                    labels: data_label,
                    datasets: [{
                        label: 'Reservation (Total Room and Nights)',
                        data: data_reservation_report,
                        fill: false
                    }]
                };

                var chart_reservation = new Chart(dataReport, {
                    type: 'bar',
                    data: data_chart_reservation
                });
            </script>
        <?php else: ?>
            <h3>No Data</h3>
            <p>Unable to find any data for you.</p>
        <?php endif ?>
        <?php if (!empty($reservation)): ?>
            <table>
                <thead>
                    <tr>
                        <th>City</th>
                        <th>Total reservation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reservation as $reservation_item): ?>
                        <tr>
                            <td>Hilton
                                <?= esc($reservation_item->city) ?>
                            </td>
                            <td>
                                <?= esc($reservation_item->total_room_night) ?>
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