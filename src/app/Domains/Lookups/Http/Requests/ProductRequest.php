<?php

namespace App\Domains\Lookups\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use app\services\StorageManagerService;
use phpDocumentor\Reflection\Types\Nullable;

/**
 * Class CategoryRequest.
 */
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
        switch (request()->method){
            case self::METHOD_POST:
                return [
                    'title' => ['required', 'max:255'],
                    'price' => ['required', 'max:255'],
                    'sale_price' => ['required'],
                    'short_desc' => ['required'],
                    'category_id' => ['required','max:255'],
                    'desc' => ['required'],

                    'img' => ['required', 'mimes:'.implode(',',StorageManagerService::$allowedImages)],

                ];
//                return [
//
//                    'title' => 'required|max:250',
//                    'price' => 'required|max:250',
//                    'sale_price' => 'required|max:250',
//                    'short_desc' => 'required|max:250',
//
//                    'img' => ['required|, 'mimes:'.implode(',',StorageManagerService::$allowedImages)]',
//                    'category_id' => 'required',
//                    'desc' => 'required|max:2500',
//                ];
            case self::METHOD_PATCH:
                return [
                    'id' => ['required', Rule::exists('products')],
                    'title' => 'required|max:250',
                    'price' => 'required|max:250',
                    'sale_price' => 'required|max:250',
                    'short_desc' => 'required|max:250',
                    'img' => ['Nullable','mimes:'.implode(',',StorageManagerService::$allowedImages)],
                    'desc' => 'required|max:2500',
                ];
            case self::METHOD_DELETE:
            default:
                return [
                    'id' => ['required', Rule::exists('products')],
                ];
        }
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
        ];
    }
}
