<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Image;

class ProductRequest extends FormRequest
{
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
    public function rules()
    {
        return [
          'title'       => 'required|max:64',
          'description' => 'required|max:255',
          'price'       => 'required',
          'category_id' => 'required'
        ];
    }

    public function withValidator($validator)
    {
        if ($validator->fails()) {
          $images = Image::all()->whereNull('product_id');
          foreach($images as $img){
            $img->delete();
          }
        }
    }
}
