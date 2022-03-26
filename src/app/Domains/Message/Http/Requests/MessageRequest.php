<?php

namespace App\Domains\Message\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class WorkerRequest.
 */
class MessageRequest extends FormRequest
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
                    'full_name' => ['required', 'max:350'],
                    'email' => ['required', 'max:350'],
//                    'title' => ['required', 'max:350'],
                    'user_type' => ['required', 'max:350'],
                    'message' => ['required', 'max:3500'],

                ];

            case self::METHOD_DELETE:
            default:
                return [
                    'id' => ['required', Rule::exists('messages')],
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
