<?php

namespace App\Domains\Lookups\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class CityRequest.
 */
class CityRequest extends FormRequest
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
                    'name' => 'required|max:250',

                ];
            case self::METHOD_PATCH:
                return [
                    'id' => ['required', Rule::exists('cities')],
                    'name' => 'required|max:250',

                ];
            case self::METHOD_DELETE:
            default:
                return [
                    'id' => ['required', Rule::exists('cities')],
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
