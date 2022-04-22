<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequests extends FormRequest  {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()  {
        return [

            'product' => '',
            'category_id' => '',
            'name' => '',
            'weight' => '',
            'price' => '',
            'description' => '',
            'profile_image' => '',

            /*
            'product' => 'required',
            'category_id' => 'required',
            'name' => 'required|min:1|max:50',
            'weight' => 'required|min:1|max:200',
            'price' => 'required',
            'description' => 'required|min:1|max:200',
            'profile_image' => 'required|mimes:png,jpg,jpeg|max:2048',
            */
        ];
    }


    public function messages() {
        return [

            'name.required' => 'Поле Имя является обязательным',
            'price.required' => 'Введите цену',
            'profile_image.required' => 'Загрузите фотографию',

            'name.max' => 'Поле Имя должно содержать не более 50 символов',
            'description.min' => 'Поле Описание должно содержать не менее 3 символов',
            'description.max' => 'Поле Описание должно содержать не более 200 символов',
            'profile_image.mimes' => 'Изображение должно быть файлом типа: png, jpg, jpeg',
            'profile_image.max' => 'Размер изображения профиля не должен превышать 2 мегабайта',
        ];
    }

}
