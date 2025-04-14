<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance Tracker</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="container">
        <h1>Finance Tracker</h1>
        
        <div class="balance-container">
            <div class="balance-box">
                <h3>Your Balance</h3>
                <div class="money total" id="balance">
                    <?php
                    require_once 'includes/functions.php';
                    echo formatCurrency(getBalance());
                    ?>
                </div>
            </div>
            
            <div class="balance-box">
                <h3><i class="fas fa-arrow-up"></i> Income</h3>
                <div class="money plus" id="income">
                    <?php echo formatCurrency(getTotalIncome()); ?>
                </div>
            </div>
            
            <div class="balance-box">
                <h3><i class="fas fa-arrow-down"></i> Expense</h3>
                <div class="money minus" id="expense">
                    <?php echo formatCurrency(getTotalExpense()); ?>
                </div>
            </div>
        </div>
        
        <div class="container">
            <h3><i class="fas fa-plus-circle"></i> Add New Transaction</h3>
            <form id="transaction-form" action="includes/add_transaction.php" method="post">
                <div class="form-control">
                    <label for="description">Description</label>
                    <input type="text" id="description" name="description" placeholder="Enter description..." required>
                </div>
                <div class="form-control">
                    <label for="amount">Amount</label>
                    <input type="number" id="amount" name="amount" placeholder="Enter amount..." step="0.01" required>
                    <small>* Negative for expense, positive for income</small>
                </div>
                <button type="submit"><i class="fas fa-check"></i> Add Transaction</button>
            </form>
        </div>
        
        <div class="container">
            <h3><i class="fas fa-history"></i> Transaction History</h3>
            <ul id="transaction-list" class="transaction-list">
                <?php
                $transactions = getTransactions();
                if (empty($transactions)) {
                    echo '<li class="empty-list">No transactions yet. Add your first transaction above!</li>';
                } else {
                    foreach ($transactions as $transaction) {
                        $class = $transaction['amount'] < 0 ? 'minus' : 'plus';
                        $icon = $transaction['amount'] < 0 ? '<i class="fas fa-arrow-down"></i>' : '<i class="fas fa-arrow-up"></i>';
                        echo '<li class="' . $class . '">';
                        echo '<div>' . $icon . ' ' . $transaction['description'] . '</div>';
                        echo '<span>' . formatCurrency($transaction['amount']) . '</span>';
                        echo '<button class="delete-btn" onclick="window.location.href=\'includes/delete_transaction.php?id=' . $transaction['id'] . '\'"><i class="fas fa-trash"></i></button>';
                        echo '</li>';
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</body>
</html>