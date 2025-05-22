<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Yangi xarid (Transaction)</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Purchase</h2>

    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf

        {{-- Balans ID ni yashirincha uzatish --}}
        <input type="hidden" name="balance_id" value="{{ $id }}">

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="expence">Expence</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" name="description" required>
        </div>

        <div class="mb-3">
            <label for="balance" class="form-label">USD</label>
            <input type="number" step="0.001" class="form-control" name="balance" required>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" name="date" required>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('home') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
</body>
</html>
