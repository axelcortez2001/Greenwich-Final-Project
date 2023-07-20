<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .side-bar {
            background: linear-gradient(to bottom, #37A35A, #177736);
            /* Approximate Greenwich Pizza colors */
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.2);
        }

        body {
            font-family: Arial, sans-serif;
        }
    </style>
</head>


<div class="side-bar w-1/4 overflow-y-auto">
    <div class="side-bar-header bg-red-600 px-4 py-2 flex items-center">
        <h1 class="text-white text-xl font-bold ml-2">Accounting Management</h1>
    </div>
    <div class="side-bar-menu flex-1 px-4 py-8">
        <a href="<?php echo site_url('Accounting/Accounting'); ?>" class="block py-2 px-4 rounded font-bold lg:text-lg  text-gray-900 hover:bg-green-800 <?php echo ($this->uri->segment(1) == 'Stocks' ? 'active-link' : ''); ?>">
            <i class="fas fa-shopping-cart mr-2"></i>
            Purchase Transactions
        </a>
        <a href="<?php echo site_url('Accounting/Accounting/show_sales'); ?>" class="block py-2 px-4 rounded font-bold lg:text-lg text-gray-900 hover:bg-green-800 <?php echo ($this->uri->segment(1) == 'Buy Products' ? 'active-link' : ''); ?>">
            <i class="fas fa-money-bill-wave mr-2"></i>
            Sale Transactions
        </a>
        <a href="<?php echo site_url('Accounting/Accounting/show_payroll'); ?>" class="block py-2 px-4 rounded font-bold lg:text-lg text-gray-900 hover:bg-green-800 <?php echo ($this->uri->segment(1) == 'Purchases' ? 'active-link' : ''); ?>">
            <i class="fas fa-file-invoice-dollar mr-2"></i>
            Payrolls
        </a>
    </div>
</div>