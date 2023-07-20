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

    h1 {
      font-family: Satisfy;
    }

    body {
      background-image: url("<?php echo UPLOADS_BASE_URL . 'wood2.jpg'; ?>");
      opacity: 0.98;
    }

    table {
      opacity: 0.9;
    }
  </style>
</head>

<body class="">
  <!-- header -->
  <div class="flex flex-col">
    <div>
      <?php include '/application/views/dashboard.php'; ?>
    </div>
    <!-- Main content -->
    <div class="flex mx-full mt-20">
      <!-- Sidebar -->
      <?php include '/application/views/Inventory/sidebar.php'; ?>
      <!-- Content -->
      <div class="flex flex-col w-3/4 h-screen">
        <div class="container mx-auto my-2 px-4 sm:px-6 lg:px-8">
          <div class="text-center text-lg font-bold">
            <h1 class="text-4xl text-yellow-400">Inventory Reports</h1>
          </div>
        </div>
        <div class="overflow-x-auto overflow-y-auto">
          <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-green-900 text-white uppercase text-lg text-yellow-400 leading-normal">
              <tr>
                <th class="py-3 px-6 text-left">Image</th>
                <th class="py-3 px-6 text-left">Product</th>
                <th class="py-3 px-6 text-left">Quantity</th>
                <th class="py-3 px-6 text-left">Amount</th>
                <th class="py-3 px-6 text-left">Date</th>
                <th class="py-3 px-6 text-left">Status</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($purchases as $purchase) : ?>
                <tr>
                  <td class="py-4 px-6 border-b border-gray-200">
                    <div class="h-auto w-20">
                      <img src="<?php echo UPLOADS_BASE_URL . $purchase['img']; ?>" />
                    </div>
                  </td>
                  <td class="py-4 px-6 border-b border-gray-200"><?php echo $purchase['name']; ?></td>
                  <td class="py-4 px-6 border-b border-gray-200"><?php echo $purchase['total_product']; ?></td>
                  <td class="py-4 px-6 border-b border-gray-200">P<?php echo $purchase['total_amount']; ?></td>
                  <td class="py-4 px-6 border-b border-gray-200"><?php echo $purchase['date']; ?></td>
                  <?php if ($purchase['status'] === 'Paid') { ?>
                    <td class="py-4 px-6 border-b border-gray-200"><?php echo $purchase['status']; ?></td>
                  <?php } else { ?>
                    <td class="py-4 px-6 border-b text-red-500 border-gray-200"><?php echo $purchase['status']; ?></td>
                  <?php   } ?>

                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</body>

</html>