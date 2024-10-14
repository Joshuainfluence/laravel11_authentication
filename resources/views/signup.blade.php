<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Signup</h1>
    <form action="{{route('signup')}}" method="post">
        @csrf
        <label for="name">name:</label>
        <input type="text" name="name" required id="">
        <label for="email">Email:</label>
        <input type="email" name="email" required id="">
        <label for="password">Password:</label>
        <input type="password" name="password" required id="">
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" name="password_confirmation" required id="">
        <button type="submit">Signup</button>
    </form>
</body>
</html>