<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
<?php include '/application/views/dashboard.php'; ?>
    <div class="flex flex-col min-h-screen mt-28">
        <div>
         <h1>ERP URL's</h1>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 p-4">
            <?php foreach ($url as $linkurl) { ?>
                <div class="bg-white shadow rounded p-4">
                    <img src="<?php echo ERP_URL . $linkurl->image; ?>" alt="linkurl Image" class="w-full h-40 object-contain">
                    <div class="text-gray-800 font-bold mt-2 mb-1 linkurl-name"><?php echo $linkurl->Student_Name; ?></div>
                    <div class="text-gray-600 mb-2"><?php echo $linkurl->link; ?></div>
                    <a href="http://<?php echo $linkurl->link; ?>"
                    class="bg-red-500 hover:bg-green-900 text-white font-bold py-2 px-4 rounded shadow-md mb-2">Visit</a>
                </div>
            <?php } ?>
        </div>

    </div>
</body>

</html>
