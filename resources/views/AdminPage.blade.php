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
<div class="container">
<div style="color: red;margin-left: 450px"> <h2>Главная страница администратора</h2></div>
<ul>
    <li><a style="text-decoration: none" href="{{route('AddDataInDb')}}"><h3>загрузить новые данные в базу данных</h3></a></li>
    <li><a style="text-decoration: none" href="{{route('EditDataInDb')}}"><h3>отредактировать или удалить данные из базы данных</h3></a></li>
    <li><a style="text-decoration: none" href="{{route('WorkWithOrders')}}"><h3>заказы</h3></a></li>
</ul>
</div>
</body>
</html>
