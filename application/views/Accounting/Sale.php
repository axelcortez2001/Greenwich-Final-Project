<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url("<?php echo UPLOADS_BASE_URL . 'wood2.jpg'; ?>");
        }

        table {
            opacity: 0.9;
            font-family: Arial, sans-serif;
        }
    </style>
</head>

<body class="">
    <div class="flex flex-col min-h-screen">
        <div>
            <?php include '/application/views/dashboard.php'; ?>
        </div>
        <!-- Main content -->
        <div class="h-screen">
            <div class="flex flex-col mt-20 sm:flex-row overflow-y-auto">
                <!-- Sidebar -->
                <?php include '/application/views/Accounting/sidebar.php'; ?>
                <!-- Content -->
                <div class="flex flex-col w-full sm:w-3/4 mb-20 h-screen">
                    <div class="overflow-y-auto">
                        <div class="flex flex-col sm:flex-row container p-5 space-y-5 sm:space-y-0 sm:space-x-5">
                            <div>
                                <input type="date" class="px-4 py-2 border bg-green-500 border-gray-900 rounded-md" id="dateSelect" onchange="filterTable()">
                            </div>
                        </div>
                        <div class="px-2">
                            <table id="transactionsTable" class="min-w-full w-full bg-gray-200 shadow-md rounded-lg overflow-hidden">
                                <thead class="bg-green-900 text-gray-900 uppercase lg:text-xl text-lg leading-normal">
                                    <tr>
                                        <th class="py-2 px-4 bg-gray-200">ID</th>
                                        <th class="py-2 px-4 bg-gray-200">Amount</th>
                                        <th class="py-2 px-4 bg-gray-200">Payment</th>
                                        <th class="py-2 px-4 bg-gray-200">Change</th>
                                        <th class="py-2 px-4 bg-gray-200">Type</th>
                                        <th class="py-2 px-4 bg-gray-200">Date</th>
                                        <th class="py-2 px-4 bg-gray-200">Cart Items</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-gray-400">
                                    <?php foreach ($transactions as $transaction) : ?>
                                        <tr>
                                            <td class="py-2 px-4 border"><?php echo $transaction->trans_id; ?></td>
                                            <td class="py-2 px-4 border"><?php echo $transaction->total_amount; ?></td>
                                            <td class="py-2 px-4 border"><?php echo $transaction->payment; ?></td>
                                            <td class="py-2 px-4 border"><?php echo $transaction->change; ?></td>
                                            <td class="py-2 px-4 border"><?php echo $transaction->type; ?></td>
                                            <td class="py-2 px-4 border"><?php echo $transaction->date; ?></td>
                                            <td class="py-2 px-4 border">
                                                <ul class="space-y-2">
                                                    <?php foreach ($cartItems[$transaction->trans_id] as $item) : ?>
                                                        <li class="text-sm">
                                                            <span class="font-bold">Name:</span> <?php echo $item['name']; ?><br>
                                                            <span class="font-bold">Quantity:</span> <?php echo $item['qty']; ?><br>
                                                            <span class="font-bold">Subtotal:</span> <?php echo $item['subtotal']; ?>
                                                        </li>
                                                        <hr class="border-gray-400">
                                                    <?php endforeach; ?>
                                                </ul>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php if (empty($transactions)) : ?>
                                <p class="text-center text-gray-500 mt-4">No data available</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php include '/application/views/Accounting/botbar.php'; ?>
                </div>
            </div>
        </div>
        <script>
            function filterTable() {
                var dateInput = document.getElementById('dateSelect');
                var selectedDate = dateInput.value.trim();

                var table = document.getElementById('transactionsTable');
                var rows = table.getElementsByTagName('tr');

                for (var i = 0; i < rows.length; i++) {
                    var row = rows[i];
                    var dateCell = row.getElementsByTagName('td')[5]; // Assuming date is in the sixth column (index 5)

                    if (dateCell) {
                        var date = dateCell.textContent || dateCell.innerText;
                        var formattedDate = formatDate(date); // Format the date cell value
                        var formattedSelectedDate = formatDate(selectedDate); // Format the selected date

                        var shouldShowRow = selectedDate === '' || formattedDate === formattedSelectedDate;

                        row.style.display = shouldShowRow ? '' : 'none';
                    }
                }

                var noDataMessage = document.getElementById('noDataMessage');
                if (noDataMessage) {
                    noDataMessage.style.display = getVisibleRowCount(rows) <= 1 ? '' : 'none';
                }
            }

            function formatDate(dateString) {
                var parts = dateString.split('-');
                return parts.reverse().join('/'); // Convert date to the format: DD/MM/YYYY
            }

            function getVisibleRowCount(rows) {
                var count = 0;
                for (var i = 0; i < rows.length; i++) {
                    if (rows[i].style.display !== 'none') {
                        count++;
                    }
                }
                return count;
            }
        </script>
</body>

</html>