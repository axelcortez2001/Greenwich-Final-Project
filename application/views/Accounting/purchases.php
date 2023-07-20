<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url("<?php echo UPLOADS_BASE_URL . 'wood2.jpg'; ?>");
        }

        table {
            opacity: 0.95;
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
        <div class="flex mt-20">
            <!-- Sidebar -->
            <?php include '/application/views/Accounting/sidebar.php'; ?>
            <!-- Content -->

            <div class="flex flex-col w-3/4 mb-20 h-screen">
                <div class="overflow-y-auto">
                    <div class="flex flex-row container p-5 space-x-5">
                        <div>
                            <select class="px-4 py-2 border bg-green-500 border-gray-300 rounded-md" id="categorySelect">
                                <option value="All">All</option>
                                <option value="Pending">Pending</option>
                                <option value="Paid">Paid</option>
                            </select>
                        </div>
                        <div>
                            <input type="date" class="px-4 py-2 border bg-green-500 border-gray-300 rounded-md" id="dateSelect">
                        </div>
                    </div>
                    <div class="px-2">
                        <table class="min-w-full w-full bg-gray-200 shadow-md rounded-lg overflow-hidden">
                            <thead class="bg-green-900 text-gray-900 uppercase text-xl leading-normal">
                                <tr>
                                    <th class="py-2 px-4 bg-gray-200">ID</th>
                                    <th class="py-2 px-4 bg-gray-200">Name</th>
                                    <th class="py-2 px-4 bg-gray-200">Quantity</th>
                                    <th class="py-2 px-4 bg-gray-200">Amount</th>
                                    <th class="py-2 px-4 bg-gray-200">Date</th>
                                    <th class="py-2 px-4 bg-gray-200">Status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-gray-400">
                                <?php foreach ($transactions as $trans) : ?>
                                    <tr class="product" data-category="<?php echo $trans->status; ?>">
                                        <td class="py-2 px-4 border"><?php echo $trans->purchase_id; ?></td>
                                        <td class="py-2 px-4 border"><?php echo $trans->name; ?></td>
                                        <td class="py-2 px-4 border"><?php echo $trans->total_product; ?></td>
                                        <td class="py-2 px-4 border"><?php echo $trans->total_amount; ?></td>
                                        <td class="py-2 px-4 border product-date"><?php echo $trans->date; ?></td>
                                        <?php if ($trans->status === 'Paid') { ?>
                                            <td class="py-2 px-4 border text-center"><?php echo $trans->status; ?></td>
                                        <?php } else { ?>
                                            <td class="py-2 px-4 border text-center">
                                                <a type="button" class="bg-red-500 hover:bg-green-900 text-white font-bold py-2 px-4 rounded shadow-md mb-2" href='http://192.168.10.128/RBBI/index.php/access/index/58/<?php echo $trans->total_amount ?>?url=http://192.168.10.99/greenwich/index.php/Accounting/Accounting/&data=<?php echo $trans->purchase_id ?>'>Pay</a>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php include '/application/views/Accounting/botbar.php'; ?>
        </div>
    </div>
    <script src="<?php echo JS_BASE_URL . 'filterpurchases.js'; ?>"></script>
    <script>
        $(document).ready(function() {
            var result = <?php echo json_encode($_GET); ?>;
            if (result.success === 'true') {
                window.location.href = "<?php echo site_url('Accounting/Accounting/pay_purchaseCard/') ?>" + result.data;
            } else if (result.success === 'false') {
                window.location.href = "<?php echo site_url('Accounting/Accounting') ?>";
            } else {
                // Handle other cases or perform necessary actions
                console.log('Invalid success value');
            }
        });
    </script>
</body>

</html>