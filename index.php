<?php 
require_once __DIR__ . "../app/controllers/FormController.php";


$controller = new FormController();
$records = $controller->getAllRecords();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lists </title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h3 class="text-center mb-4">List </h3>

        <!-- Filter Form -->
        <form method="GET" action="" id="form">
        <div class="form-row">
                <div class="form-group col-md-3">
                 <label class="form-label">Date From</label>
                 <input type="date" name="date_from" class="form-control" value="<?= $_GET['date_from'] ?? '' ?>">
                </div>
                <div class="form-group col-md-3">
                    <label class="form-label">Date To</label>
                    <input type="date" name="date_to" class="form-control" value="<?= $_GET['date_to'] ?? '' ?>">
                </div>
                <div class="form-group col-md-3">
                    <label class="form-label">User ID</label>
                    <input type="number" name="entry_by" class="form-control" value="<?= $_GET['entry_by'] ?? '' ?>">
                </div>
                <div class="form-group col-md-3 mt-4">
                     <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>

        <!-- Add New Button -->
        <a href="views/form.php" class="btn btn-success mt-4">Add New Submission</a>

        <!-- Submission List -->
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Amount</th>
                    <th>Buyer</th>
                    <th>Receipt ID</th>
                    <th>Buyer Email</th>
                    <th>Phone</th>
                    <th>City</th>
                    <th>Date</th>
                    <th>Entry By</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($records)): ?>
                    <?php foreach ($records as $record): ?>
                        <tr>
                            <td><?= htmlspecialchars($record['id']) ?></td>
                            <td><?= htmlspecialchars($record['amount']) ?></td>
                            <td><?= htmlspecialchars($record['buyer']) ?></td>
                            <td><?= htmlspecialchars($record['receipt_id']) ?></td>
                            <td><?= htmlspecialchars($record['buyer_email']) ?></td>
                            <td><?= htmlspecialchars($record['phone']) ?></td>
                            <td><?= htmlspecialchars($record['city']) ?></td>
                            <td><?= htmlspecialchars($record['entry_at']) ?></td>
                            <td><?= htmlspecialchars($record['entry_by']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="8" class="text-center">No records found</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
