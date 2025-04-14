<?php
define('TRANSACTIONS_FILE', __DIR__ . '/../data/transactions.json');

function initTransactionsFile() {
    if (!file_exists(TRANSACTIONS_FILE)) {
        $dir = dirname(TRANSACTIONS_FILE);
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
        
       
        file_put_contents(TRANSACTIONS_FILE, json_encode([]));
    }
}

function getTransactions() {
    initTransactionsFile();
    $content = file_get_contents(TRANSACTIONS_FILE);
    return json_decode($content, true) ?: [];
}


function addTransaction($description, $amount) {
    $transactions = getTransactions();
    
    $id = uniqid();
    
    $transaction = [
        'id' => $id,
        'description' => $description,
        'amount' => (float) $amount,
        'date' => date('Y-m-d H:i:s')
    ];
    
    $transactions[] = $transaction;
    
    file_put_contents(TRANSACTIONS_FILE, json_encode($transactions, JSON_PRETTY_PRINT));
    
    return $transaction;
}


function deleteTransaction($id) {
    $transactions = getTransactions();
    

    $transactions = array_filter($transactions, function($transaction) use ($id) {
        return $transaction['id'] !== $id;
    });
    

    $transactions = array_values($transactions);
    
    file_put_contents(TRANSACTIONS_FILE, json_encode($transactions, JSON_PRETTY_PRINT));
    
    return true;
}


function getBalance() {
    $transactions = getTransactions();
    $balance = 0;
    
    foreach ($transactions as $transaction) {
        $balance += $transaction['amount'];
    }
    
    return $balance;
}


function getTotalIncome() {
    $transactions = getTransactions();
    $income = 0;
    
    foreach ($transactions as $transaction) {
        if ($transaction['amount'] > 0) {
            $income += $transaction['amount'];
        }
    }
    
    return $income;
}


function getTotalExpense() {
    $transactions = getTransactions();
    $expense = 0;
    
    foreach ($transactions as $transaction) {
        if ($transaction['amount'] < 0) {
            $expense += abs($transaction['amount']);
        }
    }
    
    return $expense;
}


function formatCurrency($amount) {
    $sign = ($amount < 0) ? '-' : '';
    return $sign . '$' . number_format(abs($amount), 2);
}