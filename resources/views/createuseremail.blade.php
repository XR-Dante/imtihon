<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="{{ route('send_code_email.store') }}" method="POST">
    @csrf
    <input type="number" name="userCode" placeholder="Tasdiqlash kodi:">
    <button type="submit">Yuborish</button>
</form>

</body>
</html>
{{--<form action="{{ route('send_code_email.create') }}"  method="GET" >--}}
{{--    <x-primary-button class="ms-4">--}}
{{--        Google orqali ro'yxatdan o'tish--}}
{{--    </x-primary-button>--}}
{{--</form>--}}
