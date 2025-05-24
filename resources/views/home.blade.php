<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Balanslar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2>Balance list</h2>

    <a href="{{ route('balances.create') }}" class="btn btn-primary mb-3">Create new card</a>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Balance</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($balance as $item)
            <tr>
                <td>{{ $item->balance }}</td>
                <td>
                    <a href="{{ route('balances.edit', $item->id) }}" class="btn btn-warning btn-sm">Hisobni to'ldirish</a>
                    <a href="{{ route('transactions.create') }}?balance_id={{ $item->id }}" class="btn btn-warning btn-sm">Shopping</a>

                    <a href="{{ route('transactions.index') }}?balance_id={{ $item->id }}" class="btn btn-warning btn-sm">Purchase receipt</a>

                    <form action="{{ route('balances.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Haqiqatan ham o‘chirmoqchimisiz?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>
</body>
</html>
