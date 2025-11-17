<?php
$pageTitle = 'Transaction History - Heleket';
$pageDescription = 'View your cryptocurrency transaction history';
include '../includes/header.php';

// Load transactions from JSON file
$transactionsFile = '../data/transactions.json';
$transactions = [];
if (file_exists($transactionsFile)) {
    $jsonData = file_get_contents($transactionsFile);
    $transactions = json_decode($jsonData, true);
}

// Filter transactions
$filterType = $_GET['type'] ?? 'all';
$filterCoin = $_GET['coin'] ?? 'all';
$filterStatus = $_GET['status'] ?? 'all';

$filteredTransactions = array_filter($transactions, function($tx) use ($filterType, $filterCoin, $filterStatus) {
    $typeMatch = ($filterType === 'all') || ($tx['type'] === $filterType);
    $coinMatch = ($filterCoin === 'all') || ($tx['coin'] === $filterCoin);
    $statusMatch = ($filterStatus === 'all') || ($tx['status'] === $filterStatus);
    return $typeMatch && $coinMatch && $statusMatch;
});

// Get unique coins for filter
$uniqueCoins = array_unique(array_column($transactions, 'coin'));
sort($uniqueCoins);
?>

<style>
.transactions-page {
    background: #f9fafb;
    min-height: 100vh;
    padding: 40px 0;
}

.transactions-header {
    background: #fff;
    padding: 30px 0;
    border-bottom: 1px solid #e5e7eb;
    margin-bottom: 30px;
}

.filters-section {
    background: #fff;
    padding: 24px;
    border-radius: 12px;
    margin-bottom: 24px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

.filters-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 16px;
}

.filter-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.filter-label {
    font-size: 14px;
    font-weight: 600;
    color: #374151;
}

.filter-select {
    padding: 10px 12px;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    font-size: 14px;
    background: #fff;
    cursor: pointer;
    transition: border-color 0.3s;
}

.filter-select:focus {
    outline: none;
    border-color: #6366f1;
}

.transactions-table-container {
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

.transactions-table {
    width: 100%;
    border-collapse: collapse;
}

.transactions-table thead {
    background: #f9fafb;
    border-bottom: 2px solid #e5e7eb;
}

.transactions-table th {
    padding: 16px;
    text-align: left;
    font-size: 13px;
    font-weight: 600;
    color: #6b7280;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.transactions-table td {
    padding: 16px;
    border-bottom: 1px solid #f3f4f6;
    font-size: 14px;
}

.transactions-table tbody tr:hover {
    background: #f9fafb;
}

.tx-type {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 6px 12px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 600;
}

.tx-type.deposit {
    background: #d1fae5;
    color: #065f46;
}

.tx-type.withdrawal {
    background: #fee2e2;
    color: #991b1b;
}

.tx-status {
    display: inline-block;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
}

.tx-status.completed {
    background: #d1fae5;
    color: #065f46;
}

.tx-status.pending {
    background: #fef3c7;
    color: #92400e;
}

.tx-status.processing {
    background: #dbeafe;
    color: #1e40af;
}

.tx-status.failed {
    background: #fee2e2;
    color: #991b1b;
}

.coin-cell {
    display: flex;
    align-items: center;
    gap: 12px;
}

.coin-icon-small {
    width: 32px;
    height: 32px;
    border-radius: 50%;
}

.coin-info {
    display: flex;
    flex-direction: column;
}

.coin-code {
    font-weight: 600;
    color: #111827;
}

.coin-network {
    font-size: 12px;
    color: #6b7280;
}

.amount-cell {
    font-weight: 600;
    color: #111827;
}

.address-cell {
    max-width: 200px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    color: #6b7280;
    font-family: monospace;
    font-size: 12px;
}

.txid-cell {
    display: flex;
    align-items: center;
    gap: 8px;
}

.txid-text {
    max-width: 150px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    font-family: monospace;
    font-size: 12px;
    color: #6b7280;
}

.copy-btn {
    padding: 4px 8px;
    background: #f3f4f6;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 11px;
    color: #6366f1;
    font-weight: 600;
    transition: background 0.3s;
}

.copy-btn:hover {
    background: #e5e7eb;
}

.confirmations {
    font-size: 12px;
    color: #6b7280;
}

.no-results {
    padding: 60px 20px;
    text-align: center;
    color: #6b7280;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

.stat-card {
    background: #fff;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

.stat-label {
    font-size: 13px;
    color: #6b7280;
    margin-bottom: 8px;
}

.stat-value {
    font-size: 24px;
    font-weight: 700;
    color: #111827;
}

@media (max-width: 768px) {
    .transactions-table {
        font-size: 12px;
    }

    .transactions-table th,
    .transactions-table td {
        padding: 12px 8px;
    }

    .address-cell,
    .txid-text {
        max-width: 100px;
    }
}
</style>

<main class="transactions-page">
    <div class="transactions-header">
        <div class="container">
            <h1 style="font-size: 32px; font-weight: 700; color: #111827; margin-bottom: 8px;">Transaction History</h1>
            <p style="color: #6b7280; font-size: 16px;">View and track all your cryptocurrency transactions</p>
        </div>
    </div>

    <div class="container">
        <!-- Statistics -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-label">Total Transactions</div>
                <div class="stat-value"><?php echo count($transactions); ?></div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Deposits</div>
                <div class="stat-value"><?php echo count(array_filter($transactions, fn($tx) => $tx['type'] === 'deposit')); ?></div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Withdrawals</div>
                <div class="stat-value"><?php echo count(array_filter($transactions, fn($tx) => $tx['type'] === 'withdrawal')); ?></div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Pending</div>
                <div class="stat-value"><?php echo count(array_filter($transactions, fn($tx) => $tx['status'] === 'pending' || $tx['status'] === 'processing')); ?></div>
            </div>
        </div>

        <!-- Filters -->
        <div class="filters-section">
            <form method="GET" action="">
                <div class="filters-grid">
                    <div class="filter-group">
                        <label class="filter-label">Transaction Type</label>
                        <select name="type" class="filter-select" onchange="this.form.submit()">
                            <option value="all" <?php echo $filterType === 'all' ? 'selected' : ''; ?>>All Types</option>
                            <option value="deposit" <?php echo $filterType === 'deposit' ? 'selected' : ''; ?>>Deposits</option>
                            <option value="withdrawal" <?php echo $filterType === 'withdrawal' ? 'selected' : ''; ?>>Withdrawals</option>
                        </select>
                    </div>

                    <div class="filter-group">
                        <label class="filter-label">Cryptocurrency</label>
                        <select name="coin" class="filter-select" onchange="this.form.submit()">
                            <option value="all" <?php echo $filterCoin === 'all' ? 'selected' : ''; ?>>All Coins</option>
                            <?php foreach ($uniqueCoins as $coin): ?>
                                <option value="<?php echo $coin; ?>" <?php echo $filterCoin === $coin ? 'selected' : ''; ?>><?php echo $coin; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="filter-group">
                        <label class="filter-label">Status</label>
                        <select name="status" class="filter-select" onchange="this.form.submit()">
                            <option value="all" <?php echo $filterStatus === 'all' ? 'selected' : ''; ?>>All Status</option>
                            <option value="completed" <?php echo $filterStatus === 'completed' ? 'selected' : ''; ?>>Completed</option>
                            <option value="pending" <?php echo $filterStatus === 'pending' ? 'selected' : ''; ?>>Pending</option>
                            <option value="processing" <?php echo $filterStatus === 'processing' ? 'selected' : ''; ?>>Processing</option>
                            <option value="failed" <?php echo $filterStatus === 'failed' ? 'selected' : ''; ?>>Failed</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>

        <!-- Transactions Table -->
        <div class="transactions-table-container">
            <?php if (empty($filteredTransactions)): ?>
                <div class="no-results">
                    <p style="font-size: 18px; font-weight: 600; margin-bottom: 8px;">No transactions found</p>
                    <p style="font-size: 14px; color: #6b7280;">Try adjusting your filters to see more results</p>
                </div>
            <?php else: ?>
                <table class="transactions-table">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Coin</th>
                            <th>Amount</th>
                            <th>Address</th>
                            <th>Transaction ID</th>
                            <th>Status</th>
                            <th>Date/Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($filteredTransactions as $tx): ?>
                            <tr>
                                <td>
                                    <span class="tx-type <?php echo $tx['type']; ?>">
                                        <?php echo $tx['type'] === 'deposit' ? '↓' : '↑'; ?>
                                        <?php echo ucfirst($tx['type']); ?>
                                    </span>
                                </td>
                                <td>
                                    <div class="coin-cell">
                                        <img src="https://cdn.jsdelivr.net/gh/spothq/cryptocurrency-icons@master/128/color/<?php echo strtolower($tx['coin']); ?>.png"
                                             alt="<?php echo $tx['coin']; ?>"
                                             class="coin-icon-small">
                                        <div class="coin-info">
                                            <span class="coin-code"><?php echo $tx['coin']; ?></span>
                                            <span class="coin-network"><?php echo $tx['network']; ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="amount-cell"><?php echo $tx['amount']; ?></td>
                                <td>
                                    <div class="address-cell" title="<?php echo htmlspecialchars($tx['address']); ?>">
                                        <?php echo htmlspecialchars($tx['address']); ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="txid-cell">
                                        <span class="txid-text" title="<?php echo htmlspecialchars($tx['txid']); ?>">
                                            <?php echo htmlspecialchars($tx['txid']); ?>
                                        </span>
                                        <button class="copy-btn" onclick="copyToClipboard('<?php echo htmlspecialchars($tx['txid']); ?>')">Copy</button>
                                    </div>
                                </td>
                                <td>
                                    <span class="tx-status <?php echo $tx['status']; ?>">
                                        <?php echo ucfirst($tx['status']); ?>
                                    </span>
                                    <div class="confirmations"><?php echo $tx['confirmations']; ?> confirmations</div>
                                </td>
                                <td style="white-space: nowrap;"><?php echo $tx['timestamp']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</main>

<script>
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
        alert('Transaction ID copied to clipboard!');
    }, function(err) {
        console.error('Could not copy text: ', err);
    });
}
</script>

<?php include '../includes/footer.php'; ?>
