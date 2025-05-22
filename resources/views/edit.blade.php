<!-- resources/views/edit.blade.php -->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Balansni tuldirish</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2></h2>

    <form action="{{ route('balances.update', $balance->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="balance" class="form-label">Balans</label>
            <input type="number" step="0.001" class="form-control" id="balance" name="balance" value="{{ $balance->balance }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('balances.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
</body>
</html>
