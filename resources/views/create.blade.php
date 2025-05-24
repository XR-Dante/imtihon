<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create balance</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Create balance</h2>

    <form action="{{ route('balances.store') }}" method="POST">
        @csrf
{{--        <input type="hidden" name="balance_id" value="{{ $id }}">--}}

        <div class="mb-3">
            <input type="number" step="0.001" class="form-control" id="balance" name="balance" required>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('balances.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
</body>
</html>
