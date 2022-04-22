<!-- Ссылка на общую html-разметку -->
@extends('head')

<!-- Начало/Конец кода -->
@section('title-block')Категории@endsection

<!-- Начало кода -->
@section('content')

<div class="container" style="padding: 4%;">
    <div>
        <h3>Категории</h3>
    </div>
        <div class="container">
            <div class="row row-cols-3">
                @foreach($categories as $cat)
                    <div class="alert alert-light">
                        <div class="row row-cols-2">
                            <span> <h3> {{ $cat->name }} </h3> </span>
                            <span style="color: green; text-align: end; font-size: 24px;"> {{ $cat->price." руб" }} </span>
                            <span> {{ $cat->category }} </span>
                            <span style="color: grey; text-align: end; font-size: 14px;"> {{ $cat->weght." кг" }} </span>
                        </div>

                        <span> {{ $cat->product }} </span>
                        <span> {{ $cat->description }} </span>

                        <a href="{{ route('one-show-product', $cat->id) }}"> <img class="img-thumbnail" src="{{ asset($cat->profile_image)  }}" title="{{ $cat->name }}"></a>
                        <div class="row">
                            <div class="col">
                                <a href="{{ route('one-show-product', $cat->id) }}" class="mx-auto btn btn-outline-dark">Подробнее</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    <div class="container mt-4 bg-indigo-50">
        <span><a href="{{ route('show') }}">Назад</a></span>
    </div>
    </div>
@endsection
