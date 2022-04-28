<!-- Ссылка на общую html-разметку -->
@extends('head')

<!-- Начало/Конец кода -->
@section('title-block')Продуктовая панель@endsection

<!-- Начало кода -->
@section('content')

    <div class="container bg-indigo-50 p-3 rounded-3">
        <div class="">
            <div class="text-end">
                <a href="{{ route('add') }}" type="button" class="btn btn-warning">Создать товар</a>
            </div>
        </div>
    </div>

<div class="container" style="padding: 4%;">
    @if ($table_name != true)
        <div>
            <h3>Пока пусто</h3>
        </div>
    @else
        <div>
            <h3>Продуктовая панель</h3>
        </div>
            <div class="container">
                <div class="row row-cols-3">
                    @foreach($table as $key)
                         <div class="alert alert-light">
                            <div class="row row-cols-2">
                                <span> <h3> {{ $key->name }} </h3> </span>
                                <span style="color: green; text-align: end; font-size: 24px;"> {{ $key->price." руб" }} </span>
                                <span> <a href="{{ route('categories', $key->category_id) }}"> {{ $key->categories->title }}</a> </span>
                                <span style="color: grey; text-align: end; font-size: 14px;"> {{ $key->weight." кг" }} </span>
                            </div>

                            <span> <a href="{{ route('categories', $key->product_id) }}"> {{ $key->categories->product_title }}</a> </span>
                            <span> {{ $key->description }} </span>

                            <a href="{{ route('one-show-product', $key->id) }}"> <img class="img-thumbnail" src="{{ asset($key->profile_image)  }}" title="{{ $key->name }}"></a>
                            <div class="row">
                                <div class="col">
                                    <a href="{{ route('one-show-product', $key->id) }}" class="mx-auto btn btn-outline-dark">Подробнее</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    @endif
</div>
@endsection
