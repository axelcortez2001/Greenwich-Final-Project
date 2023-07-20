<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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
    <?php if (isset($error)) : ?>
        <script>
            alert('<?php echo $error; ?>');
        </script>
    <?php endif; ?>
    <?php if (isset($success)) : ?>
        <script>
            alert('<?php echo $success; ?>');
        </script>
    <?php endif; ?>
    <div class="flex flex-col min-h-screen">
        <div>
            <?php include '/application/views/dashboard.php'; ?>
        </div>
        <!-- Main content -->
        <div class="flex mt-20">
            <!-- Sidebar -->
            <?php include '/application/views/Accounting/sidebar.php'; ?>
            <!-- Content -->
            <div class="flex flex-col w-3/4 mb-16 h-screen">
                <div class="p-4 flex justify-between">
                    <div class="flex space-x-5">
                        <div>
                            <span class="font-bold text-2xl text-yellow-400"><i class="fas fa-user"></i></span> <!-- Font Awesome icon for "Name" -->
                            <span class="font-bold text-2xl text-white pl-5"><?php echo $PayEmp->name; ?></span>
                        </div>
                        <div>
                            <span class="font-bold text-2xl text-yellow-400"><i class="fas fa-user-tag"></i></span> <!-- Font Awesome icon for "Role" -->
                            <span class="font-bold text-2xl text-white pl-5"><?php echo $PayEmp->job_name; ?></span>
                        </div>
                    </div>
                    <div>
                        <a href="<?php echo site_url('Accounting/Accounting/show_addpayroll/' . $PayEmp->emp_id); ?>" class="bg-red-500 hover:bg-green-900 text-white font-bold py-2 px-4 rounded shadow-md mb-2">Add Payroll</a>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full w-full bg-gray-200 shadow-md rounded-lg overflow-hidden">
                        <thead class="bg-green-900 text-yellow-400 uppercase text-xl leading-normal">
                            <tr>
                                <th class="py-3 px-6 text-left">ID</th>
                                <th class="py-3 px-6 text-left">From</th>
                                <th class="py-3 px-6 text-left">To</th>
                                <th class="py-3 px-6 text-left">Date Received</th>
                                <th class="py-3 px-6 text-left">Type</th>
                                <th class="py-3 px-6 text-left">Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($GetPay as $payroll) : ?>
                                <tr>
                                    <td class="py-4 px-6 border-b border-gray-200"><?php echo $payroll['payroll_id']; ?></td>
                                    <td class="py-4 px-6 border-b border-gray-200"><?php echo $payroll['from']; ?></td>
                                    <td class="py-4 px-6 border-b border-gray-200"><?php echo $payroll['to']; ?></td>
                                    <td class="py-4 px-6 border-b border-gray-200"><?php echo $payroll['date']; ?></td>
                                    <td class="py-4 px-6 border-b border-gray-200"><?php echo $payroll['type']; ?></td>
                                    <td class="py-4 px-6 border-b border-gray-200"><?php echo $payroll['pay_salary']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php include '/application/views/Accounting/botbar.php'; ?>
        </div>
    </div>
</body>

</html>