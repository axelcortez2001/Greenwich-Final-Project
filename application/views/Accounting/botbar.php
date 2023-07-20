<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Summary</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .bottom-bar {
            background-color: #2f4858;
            color: #fff;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 0 10px;
            box-sizing: border-box;
            height: 80px;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.2);
        }

        .bottom-bar h1 {
            margin: 0;
            font-size: 18px;
        }

        .bottom-bar .highlight {
            color: #5fc25f;
        }

        .bottom-bar a {
            text-decoration: none;
            color: #fff;
            background-color: #ec4d4d;
            padding: 6px 12px;
            border-radius: 5px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="bottom-bar">
        <div>
            <h1>Accounts Payable:</h1>
            <h1 class="highlight">P<?php echo $Pending['total_amount']; ?></h1>
        </div>
        <div>
            <h1>Total Sales:</h1>
            <h1 class="highlight">P<?php echo $sales['total_amount']; ?></h1>
        </div>
        <div>
            <h1>Total Expenses:</h1>
            <h1 class="highlight">P<?php echo $expenses['expenses']; ?></h1>
        </div>
        <div>
            <h1>Total Income:</h1>
            <?php if ($income['income'] > 0) { ?>
                <h1 class="highlight">P<?php echo $income['income']; ?></h1>
            <?php } else { ?>
                <h1 class="text-red-500">P<?php echo $income['income']; ?></h1>
            <?php } ?>
        </div>
        <div>
            <h1>Cash in Hand:</h1>
            <h1 class="highlight">P<?php echo $total_cash['total_cash']; ?></h1>
        </div>
        <div>
            <h1>Bank Account:</h1>
            <a href="http://192.168.10.128/RBBI/index.php/login/bank?url=<?php echo site_url('Accounting/Accounting'); ?>">Check Account</a>
        </div>
    </div>
</body>

</html>