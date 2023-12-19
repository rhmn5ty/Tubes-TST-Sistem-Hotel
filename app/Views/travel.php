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
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            /* Center the container */
            height: 80vh;
            /* Adjust as needed */
            width: 80%;
            /* Adjust the width as needed */
            margin: 0 auto;
            /* Center the container */
        }

        .chart-container {
            display: flex;
            align-items: center;
            justify-content: space-around;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
        }
    </style>
</head>

<body>
    <div class="content-container">
        <h2>Travel Booking Analytics</h2>
        <div class="chart-container">
            <canvas id="myChart"></canvas>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            const ctx = document.getElementById('myChart');
            const form = new FormData();
            form.append('email', 'admin@gmail.com');
            form.append('password', 'admin');

            const response = fetch('http://localhost:8080/api/bookAnalytics', {
                method: 'POST',
                body: form
            }).then(response => response.json())
                .then(data => {
                    console.log(data);
                    const myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: data.label,
                            datasets: [{
                                label: 'Number of Bookings',
                                data: data.data,
                                backgroundColor: [
                                    'rgba(199, 112, 7, 0.6)',
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            },
                            plugins: {
                                legend: {
                                    display: false
                                }
                            }
                        }
                    });
                });
        </script>
    </div>

</body>