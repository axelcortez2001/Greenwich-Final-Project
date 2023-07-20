<!DOCTYPE html>
<html>

<head>
    <title>Order Counter</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .title-text {
            background-color: #C61616;
            height: 3rem;
            width: 100%;
        }

        .second-screen {
            background-color: #18181b;
        }
    </style>
    <script src="<?php echo JS_BASE_URL . 'filterproducts.js'; ?>"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body class="bg-gray-200">
    <div class="mx-auto flex flex-col min-h-screen">

        <div class="flex flex-row w-full flex-grow">
            <div class="w-3/5 second-screen h-screen overflow-y-auto">
                <div class="flex mx-auto mt-4 flex-col">
                    <div class="flex items-left mb-4 h-10 px-4 space-x-4">
                        <div>
                            <input type="text" placeholder="Search..." class="px-4 py-2 border border-gray-300 w-80 rounded-md" id="searchInput">
                        </div>
                        <div>
                            <select class="px-4 py-2 border border-gray-300 rounded-md" id="categorySelect">
                                <option value="All">All</option>
                                <option value="Special Offers">Special Offers</option>
                                <option value="Pizza">Pizza</option>
                                <option value="Pasta">Pasta</option>
                                <option value="Group Meals">Group Meals</option>
                                <option value="Solo Meals">Solo Meals</option>
                                <option value="Drinks">Drinks</option>
                            </select>
                        </div>
                    </div>
                    <hr class="mb-2 px-4">

                    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 px-4">

                        <?php foreach ($products as $product) { ?>
                            <div class="bg-white rounded-lg shadow-md p-4 product" data-category="<?php echo $product->category; ?>">
                                <img src="<?php echo UPLOADS_BASE_URL . $product->img; ?>" alt="Product Image" class="w-full h-40 object-contain">
                                <div class="text-gray-800 font-bold mb-2 product-name"><?php echo $product->name; ?></div>
                                <div class="text-gray-600 mb-2">P<?php echo $product->price; ?></div>
                                <div class="flex justify-between">
                                    <?php if ($product->stock > 1) { ?>
                                        <span class="text-green-500 font-bold mb-2">Available</span>
                                    <?php } else { ?>
                                        <span class="text-red-500 font-bold mb-2">Not Available</span>
                                    <?php } ?>
                                </div>
                                <div class="flex justify-between">
                                    <?php if ($product->stock > 1) { ?>
                                        <form action="<?php echo site_url('Order/Counter/add_cart'); ?>" method="post">
                                            <input type="hidden" name="product_id" value="<?php echo $product->product_id; ?>">
                                            <input type="hidden" name="stock" value="<?php echo $product->stock; ?>">
                                            <input type="hidden" name="price" value="<?php echo $product->price; ?>">
                                            <input type="hidden" name="name" value="<?php echo $product->name; ?>">
                                            <button class="bg-red-500 hover:bg-green-900 text-white font-bold py-2 px-4 rounded shadow-md mb-2" type="submit">Add</button>
                                        </form>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="w-2/5 flex-col justify-between">
                <div class="flex title-text justify-between">
                    <div class="h-10 w-10">
                        <img src="http://i2.wp.com/www.boholtourismph.com/wp-content/uploads/2014/11/greenwich-logo.png?resize=917%2C1024" alt="logo">
                    </div>
                    <div class="flex justify-end">
                        <h1 class="text-xl p-2"><?php echo $user['job_name']; ?></h1>
                        <a href="<?php echo site_url('dashboard/logout'); ?>" class="text-xl p-2">Logout</a>
                    </div>
                </div>
                <div class="h-80 w-full overflow-y-auto bg-gray-400">
                    <?php if (!empty($cartItems)) {
                        foreach ($cartItems as $item) { ?>
                            <form action="<?php echo site_url('Order/Counter/removeCartItem/' . $item['rowid']); ?>">
                                <div class="flex items-center justify-between px-4 py-2 border-b">
                                    <div class="flex items-center">
                                        <div class="ml-2">
                                            <div class="text-gray-800 font-bold"><?php echo $item['name']; ?></div>
                                            <div class="text-gray-600">Price: P<?php echo $item['price']; ?></div>
                                            <div class="text-gray-600">Quantity: <?php echo $item['qty']; ?></div>
                                        </div>
                                    </div>
                                    <button type="submit" class="text-red-500 font-bold">Remove</a>
                                </div>
                            </form>
                        <?php }
                    } else { ?>
                        <div class="flex justify-center items-center h-full">
                            <span class="text-gray-600">No items added to the cart</span>
                        </div>
                    <?php } ?>
                </div>
                <form action="<?php echo site_url('Order/Counter/save_transaction'); ?>" method="post">
                    <div class="flex flex-row w-full py-3 pr-2 justify-between">
                        <div class="w-36 px-5">
                            <h1 class="text-xl mt-2">Total:</h1>
                        </div>
                        <div class="w-full flex">
                            <input type="text" id="total_amount" name="total_amount" value="<?php echo $totalPrice; ?>" class="w-full border border-gray-300 rounded-md px-4 py-2" readonly>
                        </div>
                    </div>
                    <div class="flex flex-row w-full py-3 pr-2 justify-between">
                        <div class="w-36 px-5">
                            <h1 class="text-xl mt-2">Payment:</h1>
                        </div>
                        <div class="w-full flex">
                            <input type="number" id="payment" name="payment" placeholder="0.00" class="w-full border border-gray-300 rounded-md px-4 py-2">
                        </div>
                    </div>
                    <div class="flex flex-row w-full py-3 pr-2 justify-between">
                        <div class="w-36 px-5">
                            <h1 class="text-xl mt-2">Change:</h1>
                        </div>
                        <div class="w-full flex">
                            <input type="text" id="change" name="change" placeholder="0.00" class="w-full border border-gray-300 rounded-md px-4 py-2" readonly>
                        </div>

                    </div>
                    <?php if ($this->session->flashdata('fail')) : ?>
                        <div class="text-red-600 ml-5 text-bold">
                            <?php echo '<p class="alert alert-success">' . $this->session->flashdata('fail') . '</p>'; ?>
                        </div>
                    <?php endif; ?>
                    <script src="<?php echo JS_BASE_URL . 'change.js'; ?>"></script>
                    <div class="flex flex-row w-full pr-10 py-3 pl-36 justify-between">
                        <div>
                            <button class="bg-red-500 hover:bg-green-900 text-white font-bold py-2 px-4 rounded shadow-md mb-2" type="submit">Save</button>
                        </div>
                        <div>
                            <a class="bg-red-500 hover:bg-green-900 text-white font-bold py-2 px-4 rounded shadow-md mb-2" href='http://192.168.10.128/RBBI/index.php/access/index/57/<?php echo $totalPrice; ?>?url=http://192.168.10.99/greenwich/index.php/Order/Counter/&data='>Pay Card</a>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            var result = <?php echo json_encode($_GET); ?>;
                            if (result.success === 'true') {
                                // Redirect to the success URL
                                window.location.href = "<?php echo site_url('Order/Counter/save_transactionCard'); ?>" + result.data;
                            } else if (result.success === 'false') {
                                // Redirect to the error URL
                                window.location.href = "<?php echo site_url('Order/Counter'); ?>";
                            } else {
                                // Handle other cases or perform necessary actions
                                console.log('Invalid success value');
                            }
                        });
                    </script>
                    <form>

            </div>
        </div>
    </div>


</body>

</html>