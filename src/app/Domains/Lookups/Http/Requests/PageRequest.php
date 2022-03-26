<?php

namespace App\Domains\Lookups\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class PageRequest.
 */
class PageRequest extends FormRequest
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
                    'description' => 'required|max:5000',

                ];
            case self::METHOD_PATCH:
                return [
                    'id' => ['required', Rule::exists('pages')],
                    'title' => 'required|max:250',
                    'description' => 'required|max:5000',

                ];
            case self::METHOD_DELETE:
            default:
                return [
                    'id' => ['required', Rule::exists('pages')],
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
