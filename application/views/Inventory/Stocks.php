<html>

<head>
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Satisfy" />
  <style>
    h3 {
      background: linear-gradient(to bottom, #facc15, #f59e0b);
      box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.2);
    }
    h1{
      font-family: Satisfy;
    }
    body {
      background-image: url("<?php echo UPLOADS_BASE_URL . 'wood2.jpg'; ?>");
      opacity: 0.98;
    }
  </style>
  <script src="<?php echo JS_BASE_URL . 'filterstocks.js'; ?>"></script>
</head>

<body class="">
  <!-- header -->
  <div class="flex flex-col">
    <div>
      <?php include '/application/views/dashboard.php'; ?>
    </div>
    <!-- Main content -->
    <div class="flex mt-20">
      <!-- Sidebar -->
      <?php include '/application/views/Inventory/sidebar.php'; ?>
      <!-- Content -->
      <div class="flex flex-col w-3/4 h-screen">
        <div class="overflow-y-auto">
          <div class="container mx-auto mt-2 px-4 sm:px-6 lg:px-8">
            <div class="text-center">
              <h1 class="text-5xl text-yellow-400 font-bold mb-6">Stocks</h1>
              <div class="relative inline-block mb-6">
                <select id="categorySelect" class="block appearance-none w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300">
                  <option value="All">All</option>
                  <option value="Special Offers">Special Offers</option>
                  <option value="Pizza">Pizza</option>
                  <option value="Pasta">Pasta</option>
                  <option value="Group Meals">Group Meals</option>
                  <option value="Solo Meals">Solo Meals</option>
                  <option value="Drinks">Drinks</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M8 7l4-4m0 0l4 4m-4-4v18"></path>
                  </svg>
                </div>
              </div>
              <?php foreach ($stocks as $category => $categoryStocks) : ?>
                <div id="<?php echo $category; ?>">
                  <input type="hidden" id="stocksData" value="<?php echo htmlspecialchars(json_encode(array_keys($stocks))); ?>">
                  <h3 class="text-2xl font-bold p-4 mt-6"><?php echo $category; ?></h3>
                  <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
                    <?php foreach ($categoryStocks as $stock) : ?>
                      <div class="bg-white shadow-lg rounded-lg px-6 mt-5 py-4">
                        <img src="<?php echo UPLOADS_BASE_URL . $stock->img; ?>" alt="Product Image" class="w-full h-40 object-contain rounded-lg border-lg mb-4" style="filter: drop-shadow(0 4px 4px rgba(0, 128, 0, 0.4));">
                        <div class="text-xl font-bold mb-2"><?php echo $stock->name; ?></div>
                        <div style="color: <?php echo $stock->stockColor; ?>" class="text-lg mb-2"><?php echo $stock->stock; ?></div>
                        <div class="text-lg mb-2"><?php echo $stock->price; ?></div>
                      </div>
                    <?php endforeach; ?>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>

        </div>

      </div>

    </div>
</body>

</html>