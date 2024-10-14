<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>dashboard</title>
</head>
<body>
    <h1>Welcome, {{ Auth::user()->name}}</h1>
    <p>Your email: {{ Auth::user()->email}}</p>

    <form action="{{ route('logout')}}" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>