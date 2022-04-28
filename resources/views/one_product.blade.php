<!-- Ссылка на общую html-разметку (показываем общий шаблон) -->
@extends('head')

<!-- Начало/Конец кода -->
@section('title-block'){{ $table->name }} @endsection

<!-- Начало кода -->
@section('content')
<div class="container" style="padding: 4%;">
    <div>
        <h3>{{ $table->name }}</h3>
    </div>
        <div class="container">
            <div class="row row-cols-2">
                     <div class="alert alert-light">
                        <div class="row row-cols-2">
                            <span> <h3> {{ $table->name }} </h3> </span>
                            <span style="color: green; text-align: end; font-size: 24px;"> {{ $table->price." руб" }} </span>
                            <span> {{ $table->categories->title }} </span>
                        </div>

                        <span> {{ $table->product_title }} </span>
                        <span> {{ $table->description }} </span>

                        <img class="img-thumbnail" src="{{ asset($table->profile_image)  }}" title="{{ $table->name }}">
                        <div class="row">
                            <div class="col">

                                <form action="{{ route('delete-product', $table->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Удалить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="alert alert-light">
                        <h3>Технические характеристики</h3>
                        <div class="row row-cols-2">
                            <span style="color: grey;">Габариты</span>
                            <span style="color: grey; text-align: end;"> {{ $table->weight." кг" }} </span>
                        </div>
                        <a href="{{ route('page-edit-product', $table->id) }}" class="btn btn-outline-warning">Редактировать</a>
                    </div>
            </div>
        </div>
    <div class="container mt-4 bg-indigo-50">
        <span><a href="{{ route('show') }}">Назад</a></span>
    </div>
</div>
@endsection
