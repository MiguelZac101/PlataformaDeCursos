<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Curso rechazado</title>
</head>
<body>
    <h1>Email: curso rechazado</h1>
    <p> curso :{{$curso->title}}</p>
    <p>motivos : {!!$curso->observation->body!!}</p>
</body>
</html>