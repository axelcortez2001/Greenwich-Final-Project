<style>
    .active-link {
        color: #03Ac13;
        font-weight: bold;
    }

    .side-bar {
        background: linear-gradient(to bottom, #37A35A, #177736);
        /* Approximate Greenwich Pizza colors */
        box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.2);
    }

    body {
        font-family: Arial, sans-serif;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<div class="side-bar w-1/4 overflow-y-auto">
    <div class="bg-red-600 w-full py-2">
        <li class="block py-2 px-4 text-lg font-bold text-white">Inventory Management</li>
    </div>
    <div class="side-bar-menu flex-1 px-4 py-8">

        <a href="<?php echo site_url('Inventory/Inventory'); ?>" class="block py-2 px-4 rounded font-bold lg:text-lg text-gray-900 hover:bg-green-800 <?php echo ($this->uri->segment(1) == 'Stocks' ? 'active-link' : ''); ?>"><i class="fas fa-box mr-2"></i> Stocks</a>
        <a href="<?php echo site_url('Inventory/Inventory/all_products'); ?>" class="block py-2 px-4 rounded font-bold lg:text-lg text-gray-900 hover:bg-green-800 <?php echo ($this->uri->segment(1) == 'Stocks' ? 'active-link' : ''); ?>"><i class="fas fa-shopping-basket mr-2"></i> Buy Products</a>
        <a href="<?php echo site_url('Inventory/Inventory/purchases'); ?>" class="block py-2 px-4 rounded font-bold lg:text-lg text-gray-900 hover:bg-green-800 <?php echo ($this->uri->segment(1) == 'Stocks' ? 'active-link' : ''); ?>"><i class="fas fa-file-alt mr-2"></i> Reports</a>
    </div>
</div>