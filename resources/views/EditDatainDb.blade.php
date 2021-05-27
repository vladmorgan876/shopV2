
@extends('layouts.app')
@section('content')
    <div class="fo" style="position:absolute;width: 100%;padding: 50px;top:2em">
        <nav class="fixed-top" style="margin-left: 70em;margin-top: 4em"><a style="text-decoration: none" href="{{route('mainPageAdmin')}}"><h6>На главную администратора</h6></a></nav>
        <div class="container" style="margin-left:150px;margin-top: 2em">
            @if(isset($products))
                @foreach($products as $product)
                    <div class="card mb-sm-3" style="max-width: 740px;">
                        <div class="row no-gutters">
                            <div class="col-md-2">
                                <img src="{{asset('/storage/'.$product->image)}}" class="card-img" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <p class="card-text">{{$product->id}}.</p>
                                    <h5 class="card-title">{{$product->category}}</h5>
                                    <h4 class="card-title">{{$product->name}}</h4>
                                    <p class="card-text">{{$product->price}}.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="margin-bottom: 20px">
                        <a href="{{route('DeleteData',$product->id)}}">
                            <button type="button" class="btn btn-danger">Удалить</button>
                        </a>
                        <a href="{{route('EditData',$product->id)}}">

                            <button type="button" class="btn badge-info">Редактировать</button>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
