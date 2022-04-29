<!-- Ссылка на общую html-разметку -->
@extends('head')

<!-- Начало/Конец кода -->
@section('title-block')Главная@endsection

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
                            <span> <h3>{{ $table->name }}</h3> </span>
                            <span style="color: green; text-align: end; font-size: 24px;">{{ $table->price." руб" }}</span>
                            <span>{{ $table->categories->title }}</span>
                        </div>

                        <span>{{ $table->categories->product_title }}</span>
                        <span>{{ $table->description }}</span>

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
                            <div  class="container">
                                    <form method="POST" action="{{ route('edit-product', $table->id) }}" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                            <select class="form-select mb-2 @error('product_id') is-invalid @enderror" autofocus required name="product_id">
                                            <option style="color: green; background: #e9ecef" selected disabled value="{{ $table->categories->product_title }}">Выберите товар</option>
                                                @foreach($categories as $cat)
                                                    <option value="{{ $cat->id }}">{{ $cat->product_title }}</option>
                                                @endforeach
                                            </select>

                                            <select class="form-select form-select-sm mb-5 @error('category_id') is-invalid @enderror" required name="category_id">
                                            <option style="color: green; background: #e9ecef" selected disabled value="{{ $table->categories->title }}">Выберите категорию</option>
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
                                                <input class="form-control" placeholder="Вес товара" type="text" name="weight" value="{{$table->weight}}">
                                                <label for="Вес товара">Вес товара</label>
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
                                                    <button class="btn btn-success" type="submit">Обновить</button>
                                            </div>
                                        </div>
                                </form>
                            </div>
                    </div>
              </div>
        </div>
</div>




<!-- Конец кода -->
@endsection
