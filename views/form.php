<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h3 class="text-center mb-4">Submit Your Details</h3>
            <a href="../index.php" class="btn btn-primary col-md-2">List</a>

            <div id="response" class="mt-3 text-center"></div>
            <form id="ajax-form">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="amount">Amount</label>
                        <input type="number" class="form-control" name="amount" placeholder="Amount">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="buyer">Buyer</label>
                        <input type="text" class="form-control" name="buyer" placeholder="Buyer" maxlength="20">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="receipt_id">Receipt ID</label>
                        <input type="text" class="form-control" name="receipt_id" placeholder="Receipt ID">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Phone</label>
                        <div class="input-group">
                            <span class="input-group-text">+880</span>
                            <input type="text" name="phone" class="form-control" placeholder="Enter phone">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="buyer_email">Buyer Email</label>
                        <input type="email" class="form-control" name="buyer_email" placeholder="Buyer Email">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="city">City</label>
                        <input type="text" class="form-control" name="city" placeholder="City">
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="note">Note (max 30 words)</label>
                        <textarea class="form-control" name="note" placeholder="Note"></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="form-label">Items</label>
                        <div id="items-container">
                            <div class="input-group mb-2 item-row">
                                <input type="text" name="items[]" class="form-control items" placeholder="Enter item ">
                                <button type="button" class="btn btn-danger remove-item">X</button>
                            </div>
                        </div>
                        <button type="button" id="add-item" class="btn btn-secondary mt-2">Add Item</button>
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="entry_by">Entry By</label>
                        <input type="number" class="form-control" name="entry_by" placeholder="Entry By">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../public/js/script.js"></script>
</body>

</html>