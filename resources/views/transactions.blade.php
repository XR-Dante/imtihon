<!-- resources/views/home.blade.php -->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Purchase receipt</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<form action="{{ route('transactions.index') }}" method="GET">
    <select name="status" class="form-select" onchange="this.form.submit()">
        <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>All</option>
        <option value="kirim" {{ request('status') == 'kirim' ? 'selected' : '' }}>Kirim</option>
        <option value="chiqim" {{ request('status') == 'chiqim' ? 'selected' : '' }}>Chiqim</option>
    </select>
</form>



<div class="container mt-4">
    <h2>Purchase receipt</h2>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Purchase receipt</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($transactions as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->balance_id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->balance }}</td>
                <td>{{ $item->date }}</td>
            </tr>

        @endforeach


        </tbody>
    </table>
</div>

</body>
</html>
