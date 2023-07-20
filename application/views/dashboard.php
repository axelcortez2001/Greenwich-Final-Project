<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <style>
        /* Add custom CSS */
        .fixed-navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 999;
            background-color: #18181b;
            height: 5rem;
        }

        .active-link {
            color: #03Ac13;
            font-weight: bold;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <nav class="flex items-center justify-between p-4 fixed-navbar pr-10">
        <div class='h-16 w-16'>
            <a href="<?php echo site_url('dashboard/main_dashboard'); ?>">
                <img src="http://i2.wp.com/www.boholtourismph.com/wp-content/uploads/2014/11/greenwich-logo.png?resize=917%2C1024" alt="logo">
            </a>
        </div>
        <ul class="flex space-x-4">
            <?php if ($user['job_name'] === 'HR Manager' || $user['job_name'] === 'Admin' || $user['job_name'] === 'Manager') : ?>
                <li><a href="<?php echo site_url('Employee'); ?>" class="text-white hover:text-gray-400 text-lg <?php echo ($this->uri->segment(1) == 'Employee' ? 'active-link' : ''); ?>">HR Management</a></li>
            <?php endif; ?>
            <?php if ($user['job_name'] === 'Accounting Manager' || $user['job_name'] === 'Admin'  || $user['job_name'] === 'Manager') : ?>
                <li><a href="<?php echo site_url('Accounting'); ?>" class="text-white hover:text-gray-400 text-lg <?php echo ($this->uri->segment(1) == 'Accounting' ? 'active-link' : ''); ?>">Accounting</a></li>
            <?php endif; ?>
            <?php if ($user['job_name'] === 'Inventory Manager' || $user['job_name'] === 'Admin'  || $user['job_name'] === 'Manager') : ?>
                <li><a href="<?php echo site_url('Inventory'); ?>" class="text-white hover:text-gray-400 text-lg <?php echo ($this->uri->segment(1) == 'Inventory' ? 'active-link' : ''); ?>">Inventory</a></li>
            <?php endif; ?>
            <?php if ($user['job_name'] === 'Admin' || $user['job_name'] === 'Manager') : ?>
                <li class="relative">
                    <a href="#" class="text-white hover:text-gray-400 text-lg">Analytics</a>
                    <ul class="absolute hidden bg-white text-gray-700 pt-1">
                        <li><a href="<?php echo site_url('Analytics/Analytics/all'); ?>" class="block px-4 py-2 hover:bg-gray-200">Analytics</a></li>
                        <li><a href="<?php echo site_url('Analytics/Analytics'); ?>" class="block px-4 py-2 hover:bg-gray-200">Sales Analytics</a></li>
                        <li><a href="<?php echo site_url('Analytics/Analytics/Expense'); ?>" class="block px-4 py-2 hover:bg-gray-200">Expense Analytics</a></li>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if (
                $user['job_name'] === 'Admin' || $user['job_name'] === 'Manager' || $user['job_name'] === 'Inventory Manager'
                || $user['job_name'] === 'HR Manager' || $user['job_name'] === 'Accounting Manager'
            ) : ?>
                <li class="rel">
                    <a href="#" class="text-white hover:text-gray-400 text-lg"><?php echo $user['job_name']; ?></a>
                    <ul class="absolute hidden bg-white text-gray-700 pt-1">
                        <li><a href="<?php echo site_url('Settings/auditlogs/' . $user['emp_id']); ?>" class="block px-4 py-2 hover:bg-gray-200">Audit Logs</a></li>
                        <li><a href="<?php echo site_url('Settings'); ?>" class="block px-4 py-2 hover:bg-gray-200">Settings</a></li>
                        <li><a href="<?php echo site_url('dashboard/logout'); ?>" class="block px-4 py-2 hover:bg-gray-200">Logout</a></li>
                    </ul>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get the dropdown elements
            var dropdown = document.querySelector('.relative');
            // Add event listener to show/hide dropdown on click
            dropdown.addEventListener('click', function() {
                var submenu = this.querySelector('ul');
                submenu.classList.toggle('hidden');
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var dropdown1 = document.querySelector('.rel');
            dropdown1.addEventListener('click', function() {
                var submenu = this.querySelector('ul');
                submenu.classList.toggle('hidden');
            });
        });
    </script>
</body>

</html>