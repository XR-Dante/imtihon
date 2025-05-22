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
        <option value="income" {{ request('status') == 'income' ? 'selected' : '' }}>Income</option>
        <option value="expence" {{ request('status') == 'expence' ? 'selected' : '' }}>Expence</option>
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
        @foreach ($balance as $item)
            <tr>
                <td>{{ $item->balance }}</td>
                <td>{{ $item->type }}</td>
            </tr>

        @endforeach


        </tbody>
    </table>
</div>

</body>
</html>
