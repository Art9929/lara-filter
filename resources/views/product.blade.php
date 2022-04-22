<!-- Ссылка на общую html-разметку -->
@extends('head')

<!-- Начало/Конец кода -->
@section('title-block')Главная@endsection

<!-- Начало кода -->
@section('content')

		<div  class="container" style="max-width: 50%;">
        <form method="POST" action=" {{ route('regprod') }}" enctype="multipart/form-data">
            @csrf
                <select class="form-select mb-2" autofocus required name="product">
                <option selected disabled>Выберите товар</option>
                    <option value="Бытовой кондиционер">Бытовой кондиционер</option>
                    <option value="Полупромышленный кондиционер">Полупромышленный кондиционер</option>
                </select>

                <select class="form-select form-select-sm mb-5" required name="category_id">
                <option selected disabled >Выберите категорию</option>
                    @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                    @endforeach
                </select>

				<div class="form-floating">
                    <input class="form-control" placeholder="Имя товара" type="text" name="name" autofocus>
                    <label for="floatingInput">Имя товара</label>
                </div>
                <div class="form-floating">
                    <input class="form-control" placeholder="Цена" type="text" name="price" >
                    <label for="floatingInput">Цена</label>
                </div>
                <div class="form-floating">
                    <input class="form-control" placeholder="Вес товара" type="text" name="weight" >
                    <label for="floatingInput">Вес товара</label>
                </div>

                <div class="form-floating mb-3">
                    <textarea class="form-control" id="floatingTextarea2" style="height: 100px" placeholder="Описание товара" type="text" name="description"></textarea>
                    <label for="floatingTextarea2">Введите описание товара</label>
                </div>


<!-- Кнопки  -->

            <div class="row row-cols-auto">
                <div class="col">
                    <input class="form-control" type="file" name="profile_image">
                </div>
            <div class="col">
                    <input class="form-control" type="reset" value="Очистить"></p>
                </div>
            <div class="col">
                    <button class="btn btn-success" type="submit">Добавить</button>
                </div>
            </div>


    </form>
</div>

<!-- Конец кода -->
@endsection
