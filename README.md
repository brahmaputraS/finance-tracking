# Finance Tracker

A simple finance tracking application built with PHP, HTML, and CSS. This application allows users to track their income and expenses, view transaction history, and monitor their overall balance.

## Features

- Add income or expense transactions
- View a list of all transactions
- Display total balance
- Show total income and expenses separately
- Delete transactions
- Responsive design that works on mobile and desktop

## Project Structure

```
finance-tracker/
├── css/
│   └── style.css           # Styling for the application
├── data/
│   └── transactions.json   # JSON file to store transaction data (created automatically)
├── includes/
│   ├── functions.php       # Core functions for transaction management
│   ├── add_transaction.php # Handles adding new transactions
│   └── delete_transaction.php # Handles deleting transactions
├── index.php              # Main application interface
└── README.md             # Project documentation
```

## Setup Instructions

1. Make sure you have PHP installed on your system (PHP 7.0 or higher recommended)
2. Clone or download this repository to your web server directory
3. Ensure the `data` directory is writable by the web server
4. Access the application through your web browser (e.g., http://localhost/finance-tracking)

## Usage

### Adding Transactions
1. Enter a description for your transaction
2. Enter the amount:
   - Use positive numbers for income (e.g., 100)
   - Use negative numbers for expenses (e.g., -50)
3. Click "Add Transaction"

### Deleting Transactions
Hover over any transaction in the list and click the "×" button that appears on the left side.

## Data Storage

All transaction data is stored locally in a JSON file (`data/transactions.json`). This file is created automatically when you add your first transaction.

## Future Enhancements

- Add categories for transactions
- Implement date filtering
- Add data visualization (charts/graphs)
- Add MySQL database support as an alternative to JSON storage