<?php

namespace App\Domains\Lookups\Http\Requests;

use App\Services\StorageManagerService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class CategoryRequest.
 */
class CategoryRequest extends FormRequest
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
                    'title' => 'required|max:250',
                    'image' => ['required', 'mimes:'.implode(',',StorageManagerService::$allowedImages)],
                ];
            case self::METHOD_PATCH:
                return [
                    'id' => ['required', Rule::exists('categories')],
                    'title' => 'required|max:250',
                    'image' => ['Nullable','mimes:'.implode(',',StorageManagerService::$allowedImages)],
                ];
            case self::METHOD_DELETE:
            default:
                return [
                    'id' => ['required', Rule::exists('categories')],
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
