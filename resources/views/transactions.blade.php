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
        <option value="expense" {{ request('status') == 'expense' ? 'selected' : '' }}>Expense</option>
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
            @if($item->status === 'expense')
                <tr>
                    <td style="color: red">-{{ $item->balance }}</td>
                    <td style="color: red">{{ $item->status }}</td>
                </tr>
            @else()
            <tr>
                <td style="color: green">+{{ $item->balance }}</td>
                <td style="color: green">{{ $item->status }}</td>
            </tr>

            @endif
        @endforeach

        </tbody>
    </table>
    <a href="{{ route('balances.index') }}" class="btn btn-secondary">Home</a>

</div>

</body>
</html>
