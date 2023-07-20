<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .pagination {
            display: flex;
            justify-content: center;
            list-style: none;
            padding: 0;
            margin-top: 2rem;
        }

        .pagination li {
            margin: 0 0.5rem;
        }

        .pagination li a {
            display: inline-block;
            padding: 0.5rem 1rem;
            background-color: #e2e8f0;
            color: #4a5568;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .pagination li.active a {
            background-color: #10b981;
            color: #fff;
        }

        .pagination li a:hover {
            background-color: #d1d5db;
        }
    </style>
</head>

<body>
    <div class="flex flex-col min-h-screen">
        <div class="py-4">
            <?php include '/application/views/dashboard.php'; ?>
        </div>
        <div class="text-center text-lg font-bold mt-4">All audit logs</div>
        <div class="mt-8 overflow-x-auto">
            <?php if ($user['job_name'] === 'Admin' || $user['job_name'] === 'Manager') { ?>
                <?php if (!empty($allaudits)) { ?>
                    <table class="w-full border-collapse">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">User ID</th>
                                <th class="py-2 px-4 border-b">User Name</th>
                                <th class="py-2 px-4 border-b">Role</th>
                                <th class="py-2 px-4 border-b">Date</th>
                                <th class="py-2 px-4 border-b">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($allaudits as $all) { ?>
                                <tr>
                                    <td class="py-2 px-4 border-b"><?php echo $all['user_id']; ?></td>
                                    <td class="py-2 px-4 border-b"><?php echo $all['user']; ?></td>
                                    <td class="py-2 px-4 border-b"><?php echo $all['role']; ?></td>
                                    <td class="py-2 px-4 border-b"><?php echo $all['timestamp']; ?></td>
                                    <td class="py-2 px-4 border-b"><?php echo $all['action']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="mt-4">
                        <ul class="pagination">
                            <?php echo $pagination_allaudits; ?>
                        </ul>
                    </div>
                <?php } else { ?>
                    <div>No audit logs available.</div>
                <?php } ?>
            <?php } else { ?>
                <div>You are not authorized to view all audit logs.</div>
            <?php } ?>
        </div>

        <div class="text-center text-lg font-bold mt-4">My audit logs</div>
        <div class="mt-8 overflow-x-auto">
            <?php if (!empty($myaudits)) { ?>
                <table class="w-full border-collapse">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">User ID</th>
                            <th class="py-2 px-4 border-b">User Name</th>
                            <th class="py-2 px-4 border-b">Role</th>
                            <th class="py-2 px-4 border-b">Date</th>
                            <th class="py-2 px-4 border-b">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($myaudits as $my) { ?>
                            <tr>
                                <td class="py-2 px-4 border-b"><?php echo $my['user_id']; ?></td>
                                <td class="py-2 px-4 border-b"><?php echo $my['user']; ?></td>
                                <td class="py-2 px-4 border-b"><?php echo $my['role']; ?></td>
                                <td class="py-2 px-4 border-b"><?php echo $my['timestamp']; ?></td>
                                <td class="py-2 px-4 border-b"><?php echo $my['action']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="mt-4">
                    <ul class="pagination">
                        <?php echo $pagination_myaudits; ?>
                    </ul>
                </div>
            <?php } else { ?>
                <div>No audit logs available.</div>
            <?php } ?>
        </div>
    </div>
</body>

</html>