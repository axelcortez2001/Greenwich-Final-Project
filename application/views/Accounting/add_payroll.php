<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="flex flex-col min-h-screen">
        <div>
            <?php include '/application/views/dashboard.php'; ?>
        </div>
        <!-- Main content -->
        <div class="flex mt-20">
            <!-- Sidebar -->
            <?php include '/application/views/Accounting/sidebar.php'; ?>
            <!-- Content -->
            <div class="flex flex-col w-3/4 bg-green-600 mb-16 h-screen lg:px-20">
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
                <div class="p-4">
                    <form id="payForm" action="<?php echo site_url('Accounting/Accounting/addpayroll'); ?>" method="post">
                        <input id="emp_id" name="emp_id" type="hidden" value="<?php echo $PayEmp->emp_id; ?>">
                        <input id="job_id" name="job_id" type="hidden" value="<?php echo $PayEmp->job_id; ?>">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="from">From:</label>
                            <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="from" name="from" type="date" format="yyyy-mm-dd" placeholder="From date">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="to">To:</label>
                            <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="to" name="to" type="date" format="yyyy-mm-dd" placeholder="To date">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="amount">Date Today:</label>
                            <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="date" name="date" type="date" format="yyyy-mm-dd" placeholder="Date received">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="amount">Amount:</label>
                            <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="pay_salary" name="pay_salary" type="number" value="<?php echo $PayEmp->salary; ?>">
                        </div>
                        <button class="bg-red-500 hover:bg-green-900 text-white font-bold py-2 px-4 rounded shadow-md mb-2" type="submit">Pay</button>
                        <a id="payCardButton" class="bg-red-500 hover:bg-green-900 text-white font-bold py-2 px-4 rounded shadow-md mb-2" href='http://192.168.10.128/RBBI/index.php/access/index/<?php echo $PayEmp->bank_acct; ?>/<?php echo $PayEmp->salary; ?>?url=http://192.168.10.99/greenwich/index.php/Accounting/Accounting/show_addpayroll/<?php echo $PayEmp->emp_id; ?>&data='>Pay Card</a>

                    </form>
                </div>
            </div>
            <?php include '/application/views/Accounting/botbar.php'; ?>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var urlParams = new URLSearchParams(window.location.search);
            var success = urlParams.get('success');

            console.log('Script executed');

            if (success === 'true') {
                var empId = "<?php echo $PayEmp->emp_id; ?>";
                var url = "<?php echo site_url('Accounting/Accounting/addpayrollCard'); ?>";
                var form = $('#payForm');

                console.log('Sending AJAX request');

                $.post(url, form.serialize(), function(response) {
                    console.log('AJAX response received');
                    if (response === "success") {
                        window.location.href = "<?php echo site_url('Accounting/Accounting/show_payrollByEmp/') ?>" + empId + "?success=" + encodeURIComponent('Payroll Save!');
                    } else {
                        // Handle the failure case
                        console.log(response);
                    }
                });
            }
        });
    </script>



</body>

</html>