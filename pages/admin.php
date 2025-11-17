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

// Function to auto-generate next transaction ID
function generateNextId($transactions) {
    if (empty($transactions)) {
        return 'TRX001';
    }

    $maxNum = 0;
    foreach ($transactions as $tx) {
        if (preg_match('/TRX(\d+)/', $tx['id'], $matches)) {
            $num = (int)$matches[1];
            if ($num > $maxNum) {
                $maxNum = $num;
            }
        }
    }

    return 'TRX' . str_pad($maxNum + 1, 3, '0', STR_PAD_LEFT);
}

// Handle form submissions
$message = '';
$messageType = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'add') {
        $newTransaction = [
            'id' => generateNextId($transactions),
            'type' => $_POST['type'],
            'coin' => $_POST['coin'],
            'amount' => $_POST['amount'],
            'address' => $_POST['address'],
            'txid' => $_POST['txid'],
            'status' => $_POST['status'],
            'timestamp' => $_POST['timestamp'] ?: date('Y-m-d H:i:s'),
            'confirmations' => (int)$_POST['confirmations'],
            'fee' => $_POST['fee'],
            'network' => $_POST['network']
        ];

        $transactions[] = $newTransaction;
        file_put_contents($transactionsFile, json_encode($transactions, JSON_PRETTY_PRINT));
        $message = 'Transaction added successfully with ID: ' . $newTransaction['id'];
        $messageType = 'success';
    }

    if ($action === 'edit') {
        $index = array_search($_POST['id'], array_column($transactions, 'id'));
        if ($index !== false) {
            $transactions[$index] = [
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

            file_put_contents($transactionsFile, json_encode($transactions, JSON_PRETTY_PRINT));
            $message = 'Transaction updated successfully!';
            $messageType = 'success';
        }
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
?>

<style>
.admin-page {
    background: #f9fafb;
    min-height: 100vh;
    padding: 40px 0;
}

.admin-header {
    background: #fff;
    padding: 30px 0;
    border-bottom: 1px solid #e5e7eb;
    margin-bottom: 30px;
}

.admin-header h1 {
    font-size: 32px;
    font-weight: 700;
    color: #111827;
    margin-bottom: 8px;
}

.admin-header p {
    color: #6b7280;
    font-size: 16px;
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

.add-form-card {
    background: #fff;
    padding: 24px;
    border-radius: 12px;
    margin-bottom: 24px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

.add-form-title {
    font-size: 18px;
    font-weight: 700;
    color: #111827;
    margin-bottom: 20px;
}

.form-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px;
    margin-bottom: 16px;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 6px;
}

.form-label {
    font-size: 13px;
    font-weight: 600;
    color: #374151;
}

.form-input,
.form-select {
    padding: 8px 10px;
    border: 1px solid #e5e7eb;
    border-radius: 6px;
    font-size: 14px;
    font-family: inherit;
}

.form-input:focus,
.form-select:focus {
    outline: none;
    border-color: #6366f1;
}

.btn-add {
    padding: 10px 24px;
    background: #6366f1;
    color: #fff;
    border: none;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.3s;
}

.btn-add:hover {
    background: #4f46e5;
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
    padding: 16px 12px;
    text-align: left;
    font-size: 13px;
    font-weight: 600;
    color: #6b7280;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.transactions-table td {
    padding: 12px;
    border-bottom: 1px solid #f3f4f6;
    font-size: 14px;
}

.transactions-table tbody tr:hover {
    background: #f9fafb;
}

.transactions-table tbody tr.editing {
    background: #eff6ff;
}

.coin-cell {
    display: flex;
    align-items: center;
    gap: 8px;
}

.coin-icon-small {
    width: 28px;
    height: 28px;
    border-radius: 50%;
}

.tx-status {
    display: inline-block;
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 11px;
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

.tx-type {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    padding: 4px 10px;
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

.action-buttons {
    display: flex;
    gap: 6px;
}

.btn-edit,
.btn-delete,
.btn-save,
.btn-cancel-edit {
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

.btn-save {
    background: #6366f1;
    color: #fff;
}

.btn-save:hover {
    background: #4f46e5;
}

.btn-cancel-edit {
    background: #f3f4f6;
    color: #374151;
}

.btn-cancel-edit:hover {
    background: #e5e7eb;
}

.edit-input {
    width: 100%;
    padding: 4px 8px;
    border: 1px solid #6366f1;
    border-radius: 4px;
    font-size: 13px;
}

.edit-select {
    width: 100%;
    padding: 4px 8px;
    border: 1px solid #6366f1;
    border-radius: 4px;
    font-size: 13px;
}

.monospace {
    font-family: monospace;
    font-size: 12px;
    color: #6b7280;
}

@media (max-width: 1200px) {
    .form-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .form-grid {
        grid-template-columns: 1fr;
    }

    .transactions-table {
        font-size: 12px;
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

        <!-- Add New Transaction Form -->
        <div class="add-form-card">
            <h2 class="add-form-title">Add New Transaction</h2>
            <form method="POST" action="">
                <input type="hidden" name="action" value="add">

                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">Type *</label>
                        <select name="type" class="form-select" required>
                            <option value="deposit">Deposit</option>
                            <option value="withdrawal">Withdrawal</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Coin *</label>
                        <select name="coin" class="form-select" required>
                            <option value="BTC">BTC</option>
                            <option value="ETH">ETH</option>
                            <option value="USDT">USDT</option>
                            <option value="USDC">USDC</option>
                            <option value="LTC">LTC</option>
                            <option value="XMR">XMR</option>
                            <option value="DASH">DASH</option>
                            <option value="TRX">TRX</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Amount *</label>
                        <input type="text" name="amount" class="form-input" placeholder="e.g., 0.0523" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Fee *</label>
                        <input type="text" name="fee" class="form-input" placeholder="e.g., 0.00001" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Network *</label>
                        <input type="text" name="network" class="form-input" placeholder="e.g., Bitcoin, ERC-20" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Status *</label>
                        <select name="status" class="form-select" required>
                            <option value="completed">Completed</option>
                            <option value="pending">Pending</option>
                            <option value="processing">Processing</option>
                            <option value="failed">Failed</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Confirmations *</label>
                        <input type="number" name="confirmations" class="form-input" value="0" min="0" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Timestamp</label>
                        <input type="text" name="timestamp" class="form-input" value="<?php echo date('Y-m-d H:i:s'); ?>" placeholder="YYYY-MM-DD HH:MM:SS">
                    </div>
                </div>

                <div class="form-grid" style="grid-template-columns: 1fr 1fr;">
                    <div class="form-group">
                        <label class="form-label">Wallet Address *</label>
                        <input type="text" name="address" class="form-input" placeholder="Full wallet address" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Transaction Hash (TXID) *</label>
                        <input type="text" name="txid" class="form-input" placeholder="Blockchain transaction hash" required>
                    </div>
                </div>

                <button type="submit" class="btn-add">Add Transaction (ID will be auto-generated)</button>
            </form>
        </div>

        <!-- Transactions Table -->
        <div class="transactions-table-container">
            <table class="transactions-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Type</th>
                        <th>Coin</th>
                        <th>Amount</th>
                        <th>Network</th>
                        <th>Address</th>
                        <th>TXID</th>
                        <th>Status</th>
                        <th>Confirmations</th>
                        <th>Fee</th>
                        <th>Timestamp</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($transactions)): ?>
                        <tr>
                            <td colspan="12" style="text-align: center; padding: 40px; color: #6b7280;">
                                No transactions yet. Add your first transaction above.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($transactions as $tx): ?>
                            <tr id="row-<?php echo htmlspecialchars($tx['id']); ?>">
                                <td><strong><?php echo htmlspecialchars($tx['id']); ?></strong></td>
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
                                        <strong><?php echo $tx['coin']; ?></strong>
                                    </div>
                                </td>
                                <td><strong><?php echo htmlspecialchars($tx['amount']); ?></strong></td>
                                <td><?php echo htmlspecialchars($tx['network']); ?></td>
                                <td><span class="monospace" title="<?php echo htmlspecialchars($tx['address']); ?>"><?php echo substr(htmlspecialchars($tx['address']), 0, 20) . '...'; ?></span></td>
                                <td><span class="monospace" title="<?php echo htmlspecialchars($tx['txid']); ?>"><?php echo substr(htmlspecialchars($tx['txid']), 0, 16) . '...'; ?></span></td>
                                <td><span class="tx-status <?php echo $tx['status']; ?>"><?php echo ucfirst($tx['status']); ?></span></td>
                                <td><?php echo $tx['confirmations']; ?></td>
                                <td><?php echo htmlspecialchars($tx['fee']); ?></td>
                                <td style="white-space: nowrap;"><?php echo htmlspecialchars($tx['timestamp']); ?></td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn-edit" onclick="editRow('<?php echo htmlspecialchars($tx['id']); ?>')">Edit</button>
                                        <form method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this transaction?');">
                                            <input type="hidden" name="action" value="delete">
                                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($tx['id']); ?>">
                                            <button type="submit" class="btn-delete">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            <!-- Hidden edit row -->
                            <tr id="edit-<?php echo htmlspecialchars($tx['id']); ?>" style="display: none;" class="editing">
                                <td><strong><?php echo htmlspecialchars($tx['id']); ?></strong></td>
                                <td>
                                    <select class="edit-select" id="type-<?php echo htmlspecialchars($tx['id']); ?>">
                                        <option value="deposit" <?php echo $tx['type'] === 'deposit' ? 'selected' : ''; ?>>Deposit</option>
                                        <option value="withdrawal" <?php echo $tx['type'] === 'withdrawal' ? 'selected' : ''; ?>>Withdrawal</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="edit-select" id="coin-<?php echo htmlspecialchars($tx['id']); ?>">
                                        <option value="BTC" <?php echo $tx['coin'] === 'BTC' ? 'selected' : ''; ?>>BTC</option>
                                        <option value="ETH" <?php echo $tx['coin'] === 'ETH' ? 'selected' : ''; ?>>ETH</option>
                                        <option value="USDT" <?php echo $tx['coin'] === 'USDT' ? 'selected' : ''; ?>>USDT</option>
                                        <option value="USDC" <?php echo $tx['coin'] === 'USDC' ? 'selected' : ''; ?>>USDC</option>
                                        <option value="LTC" <?php echo $tx['coin'] === 'LTC' ? 'selected' : ''; ?>>LTC</option>
                                        <option value="XMR" <?php echo $tx['coin'] === 'XMR' ? 'selected' : ''; ?>>XMR</option>
                                        <option value="DASH" <?php echo $tx['coin'] === 'DASH' ? 'selected' : ''; ?>>DASH</option>
                                        <option value="TRX" <?php echo $tx['coin'] === 'TRX' ? 'selected' : ''; ?>>TRX</option>
                                    </select>
                                </td>
                                <td><input type="text" class="edit-input" id="amount-<?php echo htmlspecialchars($tx['id']); ?>" value="<?php echo htmlspecialchars($tx['amount']); ?>"></td>
                                <td><input type="text" class="edit-input" id="network-<?php echo htmlspecialchars($tx['id']); ?>" value="<?php echo htmlspecialchars($tx['network']); ?>"></td>
                                <td><input type="text" class="edit-input" id="address-<?php echo htmlspecialchars($tx['id']); ?>" value="<?php echo htmlspecialchars($tx['address']); ?>"></td>
                                <td><input type="text" class="edit-input" id="txid-<?php echo htmlspecialchars($tx['id']); ?>" value="<?php echo htmlspecialchars($tx['txid']); ?>"></td>
                                <td>
                                    <select class="edit-select" id="status-<?php echo htmlspecialchars($tx['id']); ?>">
                                        <option value="completed" <?php echo $tx['status'] === 'completed' ? 'selected' : ''; ?>>Completed</option>
                                        <option value="pending" <?php echo $tx['status'] === 'pending' ? 'selected' : ''; ?>>Pending</option>
                                        <option value="processing" <?php echo $tx['status'] === 'processing' ? 'selected' : ''; ?>>Processing</option>
                                        <option value="failed" <?php echo $tx['status'] === 'failed' ? 'selected' : ''; ?>>Failed</option>
                                    </select>
                                </td>
                                <td><input type="number" class="edit-input" id="confirmations-<?php echo htmlspecialchars($tx['id']); ?>" value="<?php echo $tx['confirmations']; ?>" min="0"></td>
                                <td><input type="text" class="edit-input" id="fee-<?php echo htmlspecialchars($tx['id']); ?>" value="<?php echo htmlspecialchars($tx['fee']); ?>"></td>
                                <td><input type="text" class="edit-input" id="timestamp-<?php echo htmlspecialchars($tx['id']); ?>" value="<?php echo htmlspecialchars($tx['timestamp']); ?>"></td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn-save" onclick="saveRow('<?php echo htmlspecialchars($tx['id']); ?>')">Save</button>
                                        <button class="btn-cancel-edit" onclick="cancelEdit('<?php echo htmlspecialchars($tx['id']); ?>')">Cancel</button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<script>
function editRow(id) {
    document.getElementById('row-' + id).style.display = 'none';
    document.getElementById('edit-' + id).style.display = 'table-row';
}

function cancelEdit(id) {
    document.getElementById('row-' + id).style.display = 'table-row';
    document.getElementById('edit-' + id).style.display = 'none';
}

function saveRow(id) {
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = '';

    const fields = {
        action: 'edit',
        id: id,
        type: document.getElementById('type-' + id).value,
        coin: document.getElementById('coin-' + id).value,
        amount: document.getElementById('amount-' + id).value,
        network: document.getElementById('network-' + id).value,
        address: document.getElementById('address-' + id).value,
        txid: document.getElementById('txid-' + id).value,
        status: document.getElementById('status-' + id).value,
        confirmations: document.getElementById('confirmations-' + id).value,
        fee: document.getElementById('fee-' + id).value,
        timestamp: document.getElementById('timestamp-' + id).value
    };

    for (const [key, value] of Object.entries(fields)) {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = key;
        input.value = value;
        form.appendChild(input);
    }

    document.body.appendChild(form);
    form.submit();
}
</script>

<?php include '../includes/footer.php'; ?>
