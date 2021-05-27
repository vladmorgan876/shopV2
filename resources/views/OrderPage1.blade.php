@extends('layouts.app')
@section('content')
<div class="container">
    <nav class="fixed-top" style="margin-left: 70em;margin-top: 4em"><a style="text-decoration: none" href="{{route('mainPageAdmin')}}"><h6>На главную администратора</h6></a></nav>
    <div style="color: red;margin-left: 450px"> <h3>Страница заказов</h3></div>
    <hr>
<ul>
    <li> <a style="text-decoration: none" href="{{route('ListOrders')}}"><h5>посмотреть весь список заказов</h5></a></li>
    <li> <a style="text-decoration: none" href="{{route('ListCompletedOrders')}}"><h5>посмотреть выполненные заказы</h5></a></li>
    <li> <a style="text-decoration: none" href="{{route('ListNotDoneOrders')}}"><h5>посмотреть не выполненные заказы</h5></a></li>
    <li><h5 style="color: green">Заказы за определенную дату</h5></li>
</ul>
    <form class="row g-1" id="inputdate" method="POST" action="{{ route('selectOrderByDate') }}">
        @csrf
        <div class="col-auto">
            <input type="date" class="form-control" id="selectdate" name="selectdate" placeholder="Введите дату">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Выполнить запрос</button>
        </div>
    </form>
    <ul>
        <li><h5 style="color: green">Заказы за определенный период</h5></li>
    </ul>
    <form class="row g-1" id="inputdate" method="POST" action="{{ route('selectOrderByPeriod') }}">
        @csrf
        <div class="col-auto">
            <input type="date" class="form-control" id="selectdate1" name="selectdate1" placeholder="Введите дату">
        </div>
        <div class="col-auto">
            <input type="date" class="form-control" id="selectdate2" name="selectdate2" placeholder="Введите дату">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Выполнить запрос</button>
        </div>
    </form>
    <ul>
        <li><h5 style="color: green">Заказы определенного клиента</h5></li>
    </ul>
    <form class="row g-1" id="inputname" method="POST" action="{{ route('selectClient') }}">
        @csrf
        <div class="col-auto">
            <input type="text" class="form-control" id="selectclient" name="selectclient" placeholder="Введите имя">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Выполнить запрос</button>
        </div>
    </form>
    <hr>

    @if(isset($allOrders))
    <table class="table table-striped table-hover table-bordered table-success ">
        <caption>Список всех заказов</caption>
        <div style="color: red;margin-left: 450px"> <h3>Список всех заказов</h3></div>
        <thead>
        <tr>
            <th scope="col">Имя</th>
            <th scope="col">E-mail</th>
            <th scope="col">Название изделия</th>
            <th scope="col">Категория</th>
            <th scope="col">Цена изделия</th>
            <th scope="col">Количество</th>
            <th scope="col">Сумма</th>
            <th scope="col">Дата заказа</th>
            <th scope="col">Дата выполнения</th>
            <th scope="col">Статус</th>
            <th scope="col">изменить статус</th>
        </tr>
        </thead>
        <tbody>
        @foreach($allOrders as $product)
        <tr>
            <td>{{$product->username}}</td>
            <td>{{$product->email}}</td>
            <td>{{$product->productname}}</td>
            <td>{{$product->category}}</td>
            <td>{{$product->productprice}}</td>
            <td>{{$product->productquantity}}</td>
            <td>{{$product->totalsum}}</td>
            <td>{{$product->orderdate}}</td>
            <td>{{$product->ordercompleted}}</td>
            <td>{{$product->status}}</td>
            <td><a style="text-decoration: none" href="{{route('ordercompleted',$product->id)}}"><p>выполнен</p></a><a style="text-decoration: none" href="{{route('orderdelete',$product->id)}}"><p>удалить</p></a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @endif

    @if(isset($selectOrderByDate))
        <table class="table table-striped table-hover table-bordered table-success">
            <caption>Список заказов за определенную дату</caption>
            @if(count($selectOrderByDate))
                <div style="color: red;margin-left: 350px"> <h3>Список заказов за <span style="color: blue">{{$selectOrderByDate[0]->orderdate}}</span></h3></div>
            @endif
            @if(!count($selectOrderByDate))
                <div style="color: red;margin-left: 350px"> <h3>Заказов <span style="color: blue">{{$date}}</span> не было  </h3></div>
            @endif
            <thead>
            <tr>
                <th scope="col">Имя</th>
                <th scope="col">E-mail</th>
                <th scope="col">Название изделия</th>
                <th scope="col">Категория</th>
                <th scope="col">Цена изделия</th>
                <th scope="col">Количество</th>
                <th scope="col">Сумма</th>
                <th scope="col">Дата заказа</th>
                <th scope="col">Дата выполнения</th>
                <th scope="col">Статус</th>
                <th scope="col">изменить статус</th>
            </tr>
            </thead>
            <tbody>
            @foreach($selectOrderByDate as $product)
                <tr>
                    <td>{{$product->username}}</td>
                    <td>{{$product->email}}</td>
                    <td>{{$product->productname}}</td>
                    <td>{{$product->category}}</td>
                    <td>{{$product->productprice}}</td>
                    <td>{{$product->productquantity}}</td>
                    <td>{{$product->totalsum}}</td>
                    <td>{{$product->orderdate}}</td>
                    <td>{{$product->ordercompleted}}</td>
                    <td>{{$product->status}}</td>
                    <td><a style="text-decoration: none" href="{{route('ordercompleted',$product->id)}}"><p>выполнен</p></a><a style="text-decoration: none" href="{{route('orderdelete',$product->id)}}"><p>удалить</p></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif

    @if(isset($selectOrderByPeriod))
        <table class="table table-striped table-hover table-bordered table-success">
            <caption>Список заказов за определенный период</caption>
            @if(count($selectOrderByPeriod));
            <div style="color: red;margin-left: 220px"> <h3>Список заказов за период с <span style="color: blue">{{$date1}}</span> по <span style="color: blue">{{$date2}}</span></h3></div>
            @endif
            @if(!count($selectOrderByPeriod));
            <div style="color: red;margin-left: 220px"> <h3> Заказов за период с <span style="color: blue">{{$date1}} <span style="color: red">по</span>  {{$date2}}</span> не было</h3></div>
            @endif
            <thead>
            <tr>
                <th scope="col">Имя</th>
                <th scope="col">E-mail</th>
                <th scope="col">Название изделия</th>
                <th scope="col">Категория</th>
                <th scope="col">Цена изделия</th>
                <th scope="col">Количество</th>
                <th scope="col">Сумма</th>
                <th scope="col">Дата заказа</th>
                <th scope="col">Дата выполнения</th>
                <th scope="col">Статус</th>
                <th scope="col">изменить статус</th>
            </tr>
            </thead>
            <tbody>
            @foreach($selectOrderByPeriod as $product)
                <tr>
                    <td>{{$product->username}}</td>
                    <td>{{$product->email}}</td>
                    <td>{{$product->productname}}</td>
                    <td>{{$product->category}}</td>
                    <td>{{$product->productprice}}</td>
                    <td>{{$product->productquantity}}</td>
                    <td>{{$product->totalsum}}</td>
                    <td>{{$product->orderdate}}</td>
                    <td>{{$product->ordercompleted}}</td>
                    <td>{{$product->status}}</td>
                    <td><a style="text-decoration: none" href="{{route('ordercompleted',$product->id)}}"><p>выполнен</p></a><a style="text-decoration: none" href="{{route('orderdelete',$product->id)}}"><p>удалить</p></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif

    @if(isset($completedOrders))
        <table class="table table-striped table-hover table-bordered table-success">
            <caption>Список выполненных заказов</caption>
            <div style="color: red;margin-left: 400px"> <h3>Список выполненных заказов</h3></div>
            <thead>
            <tr>
                <th scope="col">Имя</th>
                <th scope="col">E-mail</th>
                <th scope="col">Название изделия</th>
                <th scope="col">Категория</th>
                <th scope="col">Цена изделия</th>
                <th scope="col">Количество</th>
                <th scope="col">Сумма</th>
                <th scope="col">Дата заказа</th>
                <th scope="col">Дата выполнения</th>
                <th scope="col">Статус</th>
                <th scope="col">Удалить</th>
            </tr>
            </thead>
            <tbody>
            @foreach($completedOrders as $product)
                <tr>
                    <td>{{$product->username}}</td>
                    <td>{{$product->email}}</td>
                    <td>{{$product->productname}}</td>
                    <td>{{$product->category}}</td>
                    <td>{{$product->productprice}}</td>
                    <td>{{$product->productquantity}}</td>
                    <td>{{$product->totalsum}}</td>
                    <td>{{$product->orderdate}}</td>
                    <td>{{$product->ordercompleted}}</td>
                    <td>{{$product->status}}</td>
                    <td><a style="text-decoration: none" href="{{route('orderdelete',$product->id)}}"><p>Удалить</p></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif

    @if(isset($noDoneOrders))
        <table class="table table-striped table-hover table-bordered table-success">
            <caption>Список не выполненных заказов</caption>
            <div style="color: red;margin-left: 400px"> <h3>Список не выполненных заказов</h3></div>
            <thead>
            <tr>
                <th scope="col">Имя</th>
                <th scope="col">E-mail</th>
                <th scope="col">Название изделия</th>
                <th scope="col">Категория</th>
                <th scope="col">Цена изделия</th>
                <th scope="col">Количество</th>
                <th scope="col">Сумма</th>
                <th scope="col">Дата заказа</th>
                <th scope="col">Дата выполнения</th>
                <th scope="col">Статус</th>
                <th scope="col">Изменить статус</th>
            </tr>
            </thead>
            <tbody>
            @foreach($noDoneOrders as $product)
                <tr>
                    <td>{{$product->username}}</td>
                    <td>{{$product->email}}</td>
                    <td>{{$product->productname}}</td>
                    <td>{{$product->category}}</td>
                    <td>{{$product->productprice}}</td>
                    <td>{{$product->productquantity}}</td>
                    <td>{{$product->totalsum}}</td>
                    <td>{{$product->orderdate}}</td>
                    <td>{{$product->ordercompleted}}</td>
                    <td>{{$product->status}}</td>
                    <td><a style="text-decoration: none" href="{{route('ordercompleted',$product->id)}}"><p>выполнен</p></a><a style="text-decoration: none" href="{{route('orderdelete',$product->id)}}"><p>Удалить</p></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif

    @if(isset($client))
        <table class="table table-striped table-hover table-bordered table-success">
            <caption>Список заказов определенного клиента</caption>

            @if(count($client))
                <div style="color: red;margin-left: 400px"> <h3>Список заказов <span style="color: blue">{{$client[0]->username}}</span></h3></div>
            @endif
            @if(count($client)==0)
                <div style="color: red;margin-left: 400px"> <h3>Клиентов с таким именем не было </h3></div>
            @endif

            <thead>
            <tr>
                <th scope="col">Имя</th>
                <th scope="col">E-mail</th>
                <th scope="col">Название изделия</th>
                <th scope="col">Категория</th>
                <th scope="col">Цена изделия</th>
                <th scope="col">Количество</th>
                <th scope="col">Сумма</th>
                <th scope="col">Дата заказа</th>
                <th scope="col">Дата выполнения</th>
                <th scope="col">Статус</th>
                <th scope="col">Изменить статус</th>
            </tr>
            </thead>
            <tbody>
            @foreach($client as $product)
                <tr>
                    <td>{{$product->username}}</td>
                    <td>{{$product->email}}</td>
                    <td>{{$product->productname}}</td>
                    <td>{{$product->category}}</td>
                    <td>{{$product->productprice}}</td>
                    <td>{{$product->productquantity}}</td>
                    <td>{{$product->totalsum}}</td>
                    <td>{{$product->orderdate}}</td>
                    <td>{{$product->ordercompleted}}</td>
                    <td>{{$product->status}}</td>
                    <td><a style="text-decoration: none" href="{{route('ordercompleted',$product->id)}}"><p>выполнен</p></a><a style="text-decoration: none" href="{{route('orderdelete',$product->id)}}"><p>Удалить</p></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif





</div>


@endsection
