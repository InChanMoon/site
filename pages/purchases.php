<?php
$pageTitle = 'My Purchases - YouTube Accounts';
$pageDescription = 'View your YouTube account purchases and balance';
include '../includes/header.php';

// Load transactions to calculate balance
$transactionsFile = '../data/transactions.json';
$transactions = [];
if (file_exists($transactionsFile)) {
    $jsonData = file_get_contents($transactionsFile);
    $transactions = json_decode($jsonData, true);
}

// Calculate total funds
$totalDeposits = 0;
$totalWithdrawals = 0;
foreach ($transactions as $tx) {
    if ($tx['status'] === 'completed') {
        if ($tx['type'] === 'deposit') {
            $totalDeposits += floatval($tx['amount']);
        } elseif ($tx['type'] === 'withdrawal') {
            $totalWithdrawals += floatval($tx['amount']);
        }
    }
}

// Load purchases
$purchasesFile = '../data/purchases.json';
$purchases = [];
if (file_exists($purchasesFile)) {
    $jsonData = file_get_contents($purchasesFile);
    $purchases = json_decode($jsonData, true);
}

// Calculate total spent on purchases
$totalSpent = 0;
foreach ($purchases as $purchase) {
    if ($purchase['status'] === 'delivered') {
        $totalSpent += floatval($purchase['price']);
    }
}

$currentBalance = $totalDeposits - $totalWithdrawals - $totalSpent;
?>

<style>
.purchases-page {
    background: #f9fafb;
    min-height: 100vh;
    padding: 40px 0;
}

.purchases-header {
    background: #fff;
    padding: 30px 0;
    border-bottom: 1px solid #e5e7eb;
    margin-bottom: 30px;
}

.purchases-header h1 {
    font-size: 32px;
    font-weight: 700;
    color: #111827;
    margin-bottom: 8px;
}

.purchases-header p {
    color: #6b7280;
    font-size: 16px;
}

.balance-card {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 40px;
    border-radius: 16px;
    margin-bottom: 30px;
    color: #fff;
    box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
}

.balance-label {
    font-size: 14px;
    opacity: 0.9;
    margin-bottom: 8px;
    font-weight: 500;
}

.balance-amount {
    font-size: 48px;
    font-weight: 700;
    margin-bottom: 20px;
}

.balance-details {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    padding-top: 20px;
    border-top: 1px solid rgba(255, 255, 255, 0.2);
}

.balance-detail-item {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.balance-detail-label {
    font-size: 12px;
    opacity: 0.8;
}

.balance-detail-value {
    font-size: 20px;
    font-weight: 600;
}

.section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.section-title {
    font-size: 24px;
    font-weight: 700;
    color: #111827;
}

.purchases-table-container {
    background: #fff;
    border-radius: 12px;
    overflow-x: auto;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

.purchases-table {
    width: 100%;
    border-collapse: collapse;
}

.purchases-table thead {
    background: #f9fafb;
    border-bottom: 2px solid #e5e7eb;
}

.purchases-table th {
    padding: 16px;
    text-align: left;
    font-size: 13px;
    font-weight: 600;
    color: #6b7280;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.purchases-table td {
    padding: 16px;
    border-bottom: 1px solid #f3f4f6;
    font-size: 14px;
}

.purchases-table tbody tr:hover {
    background: #f9fafb;
}

.purchase-id {
    font-weight: 700;
    color: #6366f1;
}

.purchase-email {
    font-family: monospace;
    color: #111827;
    font-weight: 600;
}

.purchase-status {
    display: inline-block;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
}

.purchase-status.delivered {
    background: #d1fae5;
    color: #065f46;
}

.purchase-status.processing {
    background: #fef3c7;
    color: #92400e;
}

.purchase-status.pending {
    background: #dbeafe;
    color: #1e40af;
}

.badge {
    display: inline-block;
    padding: 3px 8px;
    border-radius: 12px;
    font-size: 11px;
    font-weight: 600;
    background: #dbeafe;
    color: #1e40af;
}

.badge.monetized {
    background: #d1fae5;
    color: #065f46;
}

.price-cell {
    font-weight: 700;
    color: #111827;
    font-size: 16px;
}

.subscribers-cell {
    font-weight: 600;
    color: #6366f1;
}

.no-purchases {
    padding: 60px 20px;
    text-align: center;
    color: #6b7280;
}

@media (max-width: 768px) {
    .balance-amount {
        font-size: 36px;
    }

    .balance-details {
        grid-template-columns: 1fr;
        gap: 16px;
    }

    .purchases-table {
        font-size: 12px;
    }

    .purchases-table th,
    .purchases-table td {
        padding: 12px 8px;
    }
}
</style>

<main class="purchases-page">
    <div class="purchases-header">
        <div class="container">
            <h1>My Purchases</h1>
            <p>View your YouTube account purchases and current balance</p>
        </div>
    </div>

    <div class="container">
        <!-- Balance Card -->
        <div class="balance-card">
            <div class="balance-label">Total Available Balance</div>
            <div class="balance-amount"><?php echo number_format($currentBalance, 2); ?> TRX</div>
            <div class="balance-details">
                <div class="balance-detail-item">
                    <div class="balance-detail-label">Total Deposits</div>
                    <div class="balance-detail-value">+<?php echo number_format($totalDeposits, 2); ?> TRX</div>
                </div>
                <div class="balance-detail-item">
                    <div class="balance-detail-label">Total Withdrawals</div>
                    <div class="balance-detail-value">-<?php echo number_format($totalWithdrawals, 2); ?> TRX</div>
                </div>
                <div class="balance-detail-item">
                    <div class="balance-detail-label">Total Spent</div>
                    <div class="balance-detail-value">-<?php echo number_format($totalSpent, 2); ?> TRX</div>
                </div>
            </div>
        </div>

        <!-- Purchases List -->
        <div class="section-header">
            <div class="section-title">Purchase History</div>
            <div style="color: #6b7280; font-size: 14px;">
                <?php echo count($purchases); ?> total purchases
            </div>
        </div>

        <div class="purchases-table-container">
            <?php if (empty($purchases)): ?>
                <div class="no-purchases">
                    <p style="font-size: 18px; font-weight: 600; margin-bottom: 8px;">No purchases yet</p>
                    <p style="font-size: 14px; color: #6b7280;">Your purchased YouTube accounts will appear here</p>
                </div>
            <?php else: ?>
                <table class="purchases-table">
                    <thead>
                        <tr>
                            <th>Purchase ID</th>
                            <th>Account Email</th>
                            <th>Category</th>
                            <th>Subscribers</th>
                            <th>Price</th>
                            <th>Purchase Date</th>
                            <th>Status</th>
                            <th>Features</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($purchases as $purchase): ?>
                            <tr>
                                <td><span class="purchase-id">#<?php echo htmlspecialchars($purchase['id']); ?></span></td>
                                <td><span class="purchase-email"><?php echo htmlspecialchars($purchase['email']); ?></span></td>
                                <td><?php echo htmlspecialchars($purchase['category']); ?></td>
                                <td><span class="subscribers-cell"><?php echo htmlspecialchars($purchase['subscribers']); ?></span></td>
                                <td><span class="price-cell"><?php echo number_format(floatval($purchase['price']), 2); ?> TRX</span></td>
                                <td style="white-space: nowrap;"><?php echo htmlspecialchars($purchase['purchaseDate']); ?></td>
                                <td>
                                    <span class="purchase-status <?php echo $purchase['status']; ?>">
                                        <?php echo ucfirst($purchase['status']); ?>
                                    </span>
                                </td>
                                <td>
                                    <?php if ($purchase['monetized']): ?>
                                        <span class="badge monetized">Monetized</span>
                                    <?php else: ?>
                                        <span class="badge">Not Monetized</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php include '../includes/footer.php'; ?>
