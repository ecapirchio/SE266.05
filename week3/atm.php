<?php
require_once "checking.php"; // Include the CheckingAccount class
require_once "savings.php"; // Include the SavingsAccount class

$checking = new CheckingAccount('C123', 0, '12-20-2019'); // Set the initial balance to $0
$savings = new SavingsAccount('S123', 0, '03-20-2020'); // Set the initial balance to $0

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['withdrawChecking'])) {
        $withdrawAmount = (float)$_POST['checkingWithdrawAmount'];
        if ($checking->withdrawal($withdrawAmount)) {
            echo "Withdrawal successful. Updated checking balance: " . $checking->getBalance();
        } else {
            echo "Withdrawal failed. Insufficient funds.";
        }
    } elseif (isset($_POST['depositChecking'])) {
        $depositAmount = (float)$_POST['checkingDepositAmount'];
        $checking->deposit($depositAmount);
        echo "Deposit successful. Updated checking balance: " . $checking->getBalance();
    } elseif (isset($_POST['withdrawSavings'])) {
        $withdrawAmount = (float)$_POST['savingsWithdrawAmount'];
        if ($savings->withdrawal($withdrawAmount)) {
            echo "Withdrawal successful. Updated savings balance: " . $savings->getBalance();
        } else {
            echo "Withdrawal failed. Insufficient funds.";
        }
    } elseif (isset($_POST['depositSavings'])) {
        $depositAmount = (float)$_POST['savingsDepositAmount'];
        $savings->deposit($depositAmount);
        echo "Deposit successful. Updated savings balance: " . $savings->getBalance();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATM</title>
    <style type="text/css">
        body {
            margin-left: 120px;
            margin-top: 50px;
        }
        .wrapper {
            display: grid;
            grid-template-columns: 300px 300px;
        }
        .account {
            border: 1px solid black;
            padding: 10px;
        }
        .label {
            text-align: right;
            padding-right: 10px;
            margin-bottom: 5px;
        }
        label {
           font-weight: bold;
        }
        input[type="text"] { width: 80px; }
        .error { color: red; }
        .accountInner {
            margin-left: 10px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <form method="post">
        <h1>ATM</h1>
        <div class="wrapper">
            <div class="account">
                <!-- Display Checking Account Information -->
                <?php echo $checking->getAccountDetails(); ?>
                <div class="accountInner">
                    <input type="text" name="checkingWithdrawAmount" value="" />
                    <input type="submit" name="withdrawChecking" value="Withdraw" />
                </div>
                <div class="accountInner">
                    <input type="text" name="checkingDepositAmount" value="" />
                    <input type="submit" name="depositChecking" value="Deposit" /><br />
                </div>
            </div>
            <div class="account">
                <!-- Display Savings Account Information -->
                <?php echo $savings->getAccountDetails(); ?>
                <div class="accountInner">
                    <input type="text" name="savingsWithdrawAmount" value="" />
                    <input type="submit" name="withdrawSavings" value="Withdraw" />
                </div>
                <div class="accountInner">
                    <input type="text" name="savingsDepositAmount" value="" />
                    <input type="submit" name="depositSavings" value="Deposit" /><br />
                </div>
            </div>
        </div>
    </form>
</body>
</html>