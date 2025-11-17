<?php
$pageTitle = 'Transaction Management - Heleket Admin';
$pageDescription = 'Manage cryptocurrency transactions';
include '../includes/header.php';

// Load transactions
$transactionsFile = '../data/transactions.json';
$transactions = [];
if (file_exists($transactionsFile)) {
    $jsonData = file_get_contents($transactionsFile);
    $transactions = json_decode($jsonData, true);
}

// Handle form submissions
$message = '';
$messageType = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'add' || $action === 'edit') {
        $newTransaction = [
            'id' => $_POST['id'],
            'type' => $_POST['type'],
            'coin' => $_POST['coin'],
            'amount' => $_POST['amount'],
            'address' => $_POST['address'],
            'txid' => $_POST['txid'],
            'status' => $_POST['status'],
            'timestamp' => $_POST['timestamp'],
            'confirmations' => (int)$_POST['confirmations'],
            'fee' => $_POST['fee'],
            'network' => $_POST['network']
        ];

        if ($action === 'add') {
            $transactions[] = $newTransaction;
            $message = 'Transaction added successfully!';
            $messageType = 'success';
        } elseif ($action === 'edit') {
            $index = array_search($_POST['original_id'], array_column($transactions, 'id'));
            if ($index !== false) {
                $transactions[$index] = $newTransaction;
                $message = 'Transaction updated successfully!';
                $messageType = 'success';
            }
        }

        file_put_contents($transactionsFile, json_encode($transactions, JSON_PRETTY_PRINT));
    }

    if ($action === 'delete') {
        $idToDelete = $_POST['id'];
        $transactions = array_filter($transactions, fn($tx) => $tx['id'] !== $idToDelete);
        $transactions = array_values($transactions);
        file_put_contents($transactionsFile, json_encode($transactions, JSON_PRETTY_PRINT));
        $message = 'Transaction deleted successfully!';
        $messageType = 'success';
    }
}

// Get transaction for editing
$editTransaction = null;
if (isset($_GET['edit'])) {
    $editId = $_GET['edit'];
    $index = array_search($editId, array_column($transactions, 'id'));
    if ($index !== false) {
        $editTransaction = $transactions[$index];
    }
}
?>

<style>
.admin-page {
    background: #f9fafb;
    min-height: 100vh;
    padding: 40px 0;
}

.admin-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: #fff;
    padding: 40px 0;
    margin-bottom: 40px;
}

.admin-header h1 {
    font-size: 36px;
    font-weight: 700;
    margin-bottom: 8px;
}

.admin-header p {
    font-size: 16px;
    opacity: 0.9;
}

.admin-grid {
    display: grid;
    grid-template-columns: 1fr 2fr;
    gap: 30px;
}

.form-card {
    background: #fff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    height: fit-content;
    position: sticky;
    top: 20px;
}

.form-title {
    font-size: 20px;
    font-weight: 700;
    color: #111827;
    margin-bottom: 24px;
}

.form-group {
    margin-bottom: 20px;
}

.form-label {
    display: block;
    font-size: 14px;
    font-weight: 600;
    color: #374151;
    margin-bottom: 8px;
}

.form-input,
.form-select {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    font-size: 14px;
    font-family: inherit;
}

.form-input:focus,
.form-select:focus {
    outline: none;
    border-color: #6366f1;
    box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
}

.btn-submit {
    width: 100%;
    padding: 12px 24px;
    background: #6366f1;
    color: #fff;
    border: none;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.3s;
}

.btn-submit:hover {
    background: #4f46e5;
}

.btn-cancel {
    width: 100%;
    padding: 12px 24px;
    background: #f3f4f6;
    color: #374151;
    border: none;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    margin-top: 12px;
    text-decoration: none;
    display: block;
    text-align: center;
}

.btn-cancel:hover {
    background: #e5e7eb;
}

.transactions-list {
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

.list-header {
    padding: 20px 24px;
    border-bottom: 1px solid #e5e7eb;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.list-title {
    font-size: 18px;
    font-weight: 700;
    color: #111827;
}

.transaction-item {
    padding: 20px 24px;
    border-bottom: 1px solid #f3f4f6;
    transition: background 0.3s;
}

.transaction-item:hover {
    background: #f9fafb;
}

.transaction-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 12px;
}

.transaction-id {
    font-size: 16px;
    font-weight: 700;
    color: #111827;
}

.transaction-actions {
    display: flex;
    gap: 8px;
}

.btn-edit,
.btn-delete {
    padding: 6px 12px;
    border: none;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
}

.btn-edit {
    background: #dbeafe;
    color: #1e40af;
}

.btn-edit:hover {
    background: #bfdbfe;
}

.btn-delete {
    background: #fee2e2;
    color: #991b1b;
}

.btn-delete:hover {
    background: #fecaca;
}

.transaction-details {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 12px;
    font-size: 13px;
}

.detail-item {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.detail-label {
    color: #6b7280;
    font-size: 12px;
}

.detail-value {
    color: #111827;
    font-weight: 600;
}

.alert {
    padding: 16px 20px;
    border-radius: 8px;
    margin-bottom: 24px;
    font-size: 14px;
    font-weight: 600;
}

.alert-success {
    background: #d1fae5;
    color: #065f46;
    border: 1px solid #10b981;
}

@media (max-width: 1024px) {
    .admin-grid {
        grid-template-columns: 1fr;
    }

    .form-card {
        position: static;
    }
}
</style>

<main class="admin-page">
    <div class="admin-header">
        <div class="container">
            <h1>Transaction Management</h1>
            <p>Add, edit, or delete cryptocurrency transactions</p>
        </div>
    </div>

    <div class="container">
        <?php if ($message): ?>
            <div class="alert alert-<?php echo $messageType; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <div class="admin-grid">
            <!-- Form Section -->
            <div class="form-card">
                <h2 class="form-title"><?php echo $editTransaction ? 'Edit Transaction' : 'Add New Transaction'; ?></h2>
                <form method="POST" action="">
                    <input type="hidden" name="action" value="<?php echo $editTransaction ? 'edit' : 'add'; ?>">
                    <?php if ($editTransaction): ?>
                        <input type="hidden" name="original_id" value="<?php echo htmlspecialchars($editTransaction['id']); ?>">
                    <?php endif; ?>

                    <div class="form-group">
                        <label class="form-label">Transaction ID *</label>
                        <input type="text" name="id" class="form-input"
                               value="<?php echo $editTransaction ? htmlspecialchars($editTransaction['id']) : ''; ?>"
                               placeholder="e.g., TRX011" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Type *</label>
                            <select name="type" class="form-select" required>
                                <option value="deposit" <?php echo ($editTransaction && $editTransaction['type'] === 'deposit') ? 'selected' : ''; ?>>Deposit</option>
                                <option value="withdrawal" <?php echo ($editTransaction && $editTransaction['type'] === 'withdrawal') ? 'selected' : ''; ?>>Withdrawal</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Coin *</label>
                            <select name="coin" class="form-select" required>
                                <option value="BTC" <?php echo ($editTransaction && $editTransaction['coin'] === 'BTC') ? 'selected' : ''; ?>>BTC</option>
                                <option value="ETH" <?php echo ($editTransaction && $editTransaction['coin'] === 'ETH') ? 'selected' : ''; ?>>ETH</option>
                                <option value="USDT" <?php echo ($editTransaction && $editTransaction['coin'] === 'USDT') ? 'selected' : ''; ?>>USDT</option>
                                <option value="USDC" <?php echo ($editTransaction && $editTransaction['coin'] === 'USDC') ? 'selected' : ''; ?>>USDC</option>
                                <option value="LTC" <?php echo ($editTransaction && $editTransaction['coin'] === 'LTC') ? 'selected' : ''; ?>>LTC</option>
                                <option value="XMR" <?php echo ($editTransaction && $editTransaction['coin'] === 'XMR') ? 'selected' : ''; ?>>XMR</option>
                                <option value="DASH" <?php echo ($editTransaction && $editTransaction['coin'] === 'DASH') ? 'selected' : ''; ?>>DASH</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Amount *</label>
                            <input type="text" name="amount" class="form-input"
                                   value="<?php echo $editTransaction ? htmlspecialchars($editTransaction['amount']) : ''; ?>"
                                   placeholder="e.g., 0.0523" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Fee *</label>
                            <input type="text" name="fee" class="form-input"
                                   value="<?php echo $editTransaction ? htmlspecialchars($editTransaction['fee']) : ''; ?>"
                                   placeholder="e.g., 0.00001" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Address *</label>
                        <input type="text" name="address" class="form-input"
                               value="<?php echo $editTransaction ? htmlspecialchars($editTransaction['address']) : ''; ?>"
                               placeholder="Wallet address" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Transaction ID (Hash) *</label>
                        <input type="text" name="txid" class="form-input"
                               value="<?php echo $editTransaction ? htmlspecialchars($editTransaction['txid']) : ''; ?>"
                               placeholder="Transaction hash" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Status *</label>
                            <select name="status" class="form-select" required>
                                <option value="completed" <?php echo ($editTransaction && $editTransaction['status'] === 'completed') ? 'selected' : ''; ?>>Completed</option>
                                <option value="pending" <?php echo ($editTransaction && $editTransaction['status'] === 'pending') ? 'selected' : ''; ?>>Pending</option>
                                <option value="processing" <?php echo ($editTransaction && $editTransaction['status'] === 'processing') ? 'selected' : ''; ?>>Processing</option>
                                <option value="failed" <?php echo ($editTransaction && $editTransaction['status'] === 'failed') ? 'selected' : ''; ?>>Failed</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Confirmations *</label>
                            <input type="number" name="confirmations" class="form-input"
                                   value="<?php echo $editTransaction ? htmlspecialchars($editTransaction['confirmations']) : '0'; ?>"
                                   min="0" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Network *</label>
                        <input type="text" name="network" class="form-input"
                               value="<?php echo $editTransaction ? htmlspecialchars($editTransaction['network']) : ''; ?>"
                               placeholder="e.g., Bitcoin, Ethereum, TRC-20" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Timestamp *</label>
                        <input type="text" name="timestamp" class="form-input"
                               value="<?php echo $editTransaction ? htmlspecialchars($editTransaction['timestamp']) : date('Y-m-d H:i:s'); ?>"
                               placeholder="YYYY-MM-DD HH:MM:SS" required>
                    </div>

                    <button type="submit" class="btn-submit">
                        <?php echo $editTransaction ? 'Update Transaction' : 'Add Transaction'; ?>
                    </button>

                    <?php if ($editTransaction): ?>
                        <a href="admin.php" class="btn-cancel">Cancel Edit</a>
                    <?php endif; ?>
                </form>
            </div>

            <!-- Transactions List -->
            <div class="transactions-list">
                <div class="list-header">
                    <h3 class="list-title">All Transactions (<?php echo count($transactions); ?>)</h3>
                </div>

                <?php if (empty($transactions)): ?>
                    <div style="padding: 40px 24px; text-align: center; color: #6b7280;">
                        <p>No transactions yet. Add your first transaction above.</p>
                    </div>
                <?php else: ?>
                    <?php foreach ($transactions as $tx): ?>
                        <div class="transaction-item">
                            <div class="transaction-header">
                                <div>
                                    <div class="transaction-id"><?php echo htmlspecialchars($tx['id']); ?></div>
                                    <span style="font-size: 12px; color: #6b7280; text-transform: uppercase; font-weight: 600;">
                                        <?php echo htmlspecialchars($tx['type']); ?>
                                    </span>
                                </div>
                                <div class="transaction-actions">
                                    <a href="?edit=<?php echo urlencode($tx['id']); ?>" class="btn-edit">Edit</a>
                                    <form method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this transaction?');">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($tx['id']); ?>">
                                        <button type="submit" class="btn-delete">Delete</button>
                                    </form>
                                </div>
                            </div>

                            <div class="transaction-details">
                                <div class="detail-item">
                                    <span class="detail-label">Coin</span>
                                    <span class="detail-value"><?php echo $tx['coin']; ?> (<?php echo $tx['network']; ?>)</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">Amount</span>
                                    <span class="detail-value"><?php echo $tx['amount']; ?></span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">Status</span>
                                    <span class="detail-value" style="text-transform: capitalize;"><?php echo $tx['status']; ?> (<?php echo $tx['confirmations']; ?> conf.)</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">Timestamp</span>
                                    <span class="detail-value"><?php echo $tx['timestamp']; ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<?php include '../includes/footer.php'; ?>
