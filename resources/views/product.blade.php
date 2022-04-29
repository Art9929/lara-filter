<!-- Ссылка на общую html-разметку -->
@extends('head')

<!-- Начало/Конец кода -->
@section('title-block')Главная@endsection

<!-- Начало кода -->
@section('content')

		<div  class="container" style="max-width: 50%;">
        <form method="POST" action=" {{ route('regprod') }}" enctype="multipart/form-data">
            @csrf
                <select class="form-select mb-2 @error('product_id') is-invalid @enderror" autofocus required name="product_id">
                <option selected disabled>Выберите товар</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->product_title }}</option>
                    @endforeach
                </select>

                <select class="form-select form-select-sm mb-5 @error('category_id') is-invalid @enderror" required name="category_id">
                <option selected disabled >Выберите категорию</option>
                    @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                    @endforeach
                </select>

				<div class="form-floating">
                    <input class="form-control
                           @error('name') is-invalid @enderror"
                           value="{{ old('name') }}"
                           placeholder="Имя товара"
                           type="text"
                           name="name"
                           autofocus>
                    <label for="floatingInput">Имя товара</label>

                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-floating">
                    <input class="form-control
                           @error('price') is-invalid @enderror"
                           value="{{ old('price') }}"
                           placeholder="Цена"
                           type="text"
                           name="price">
                    <label for="floatingInput">Цена</label>

                    @error('price')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-floating">
                    <input class="form-control" placeholder="Вес товара" type="text" name="weight" >
                    <label for="floatingInput">Вес товара</label>
                </div>

                <div class="form-floating mb-3">
                    <textarea class="form-control
                              @error('description') is-invalid @enderror"
                              id="floatingTextarea2"
                              style="height: 100px"
                              placeholder="Описание товара"
                              type="text"
                              name="description">{{ old('description') }}</textarea>
                    <label for="floatingTextarea2">Введите описание товара</label>

                    @error('description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


<!-- Кнопки  -->

            <div class="row row-cols-auto">

                <div class="col">
                    <input class="form-control
                           @error('profile_image') is-invalid @enderror"
                           type="file"
                           name="profile_image">

                    @error('profile_image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
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
