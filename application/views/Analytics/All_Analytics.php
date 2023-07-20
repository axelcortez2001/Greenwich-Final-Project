<html>

<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .bb {
            background-color: #03ac13;
        }

        /* Dark mode gradient background */
        @media (prefers-color-scheme: dark) {
            .bb {
                background: linear-gradient(to bottom right, #1a202c, #2d3748);
                /* Dark mode gradient */
            }
        }
    </style>
</head>

<body>
    <div class="flex flex-col min-h-screen">
        <div>
            <?php include '/application/views/dashboard.php'; ?>
        </div>

        <div class="mt-20 px-4">
            <div class="grid grid-cols-1 gap-8 px-20 py-2">
                <div class="rounded-lg shadow-md px-20 bb">
                    <h2 class="text-2xl text-center font-bold mb-4 text-white">Daily Analytics</h2>
                    <div class="flex items-center mb-4">
                        <label for="monthSelect" class="mr-2 text-white">Select Month:</label>
                        <select id="monthSelect" onchange="updateChart(this.value)" class="border border-gray-300 rounded px-2 py-1">
                            <option value="0">All</option>
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>
                    <canvas id="dailyExpenseChart"></canvas>
                </div>
                <div class="bg-white rounded-lg shadow-md px-20 bb">
                    <h2 class="text-2xl text-center font-bold mb-4 text-white">Monthly Analytics</h2>
                    <canvas id="monthlyExpenseChart"></canvas>
                </div>

            </div>
        </div>
    </div>
    <script>
        <?php include '/assets/all_analytics'; ?>
    </script>
</body>

</html>