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
                <div class="flex flex-row container p-5 space-x-5">
                    <div class="w-full overflow-x-auto">
                        <table class="min-w-full w-full bg-gray-200 shadow rounded-lg">
                            <thead class="bg-green-900 text-yellow-400 uppercase text-lg leading-normal">
                                <tr>
                                    <th class="py-3 px-6 text-left">ID</th>
                                    <th class="py-3 px-6 text-left">Name</th>
                                    <th class="py-3 px-6 text-left">Phone No.</th>
                                    <th class="py-3 px-6 text-left">Date Hired</th>
                                    <th class="py-3 px-6 text-left">Role</th>
                                    <th class="py-3 px-6 text-left">Total Salary Received</th>
                                    <th class="py-3 px-6 text-left">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($Emp as $user) : ?>
                                    <tr>
                                        <td class="py-4 px-6 border-b border-gray-200"><?php echo $user['emp_id']; ?></td>
                                        <td class="py-4 px-6 border-b border-gray-200"><?php echo $user['name']; ?></td>
                                        <td class="py-4 px-6 border-b border-gray-200"><?php echo $user['phone_no']; ?></td>
                                        <td class="py-4 px-6 border-b border-gray-200"><?php echo $user['date_hired']; ?></td>
                                        <td class="py-4 px-6 border-b border-gray-200"><?php echo $user['job_name']; ?></td>
                                        <td class="py-4 px-6 border-b border-gray-200 text-center"><?php echo $user['pay_salary']; ?></td>
                                        <td class="py-4 px-6 border-b border-gray-200">
                                            <a href="<?php echo site_url('Accounting/Accounting/show_payrollByEmp/' . $user['emp_id']); ?>" class="bg-red-500 hover:bg-green-900 text-white font-bold py-2 px-4 rounded shadow-md mb-2">Payroll</a>
                                        </td>
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
</body>

</html>