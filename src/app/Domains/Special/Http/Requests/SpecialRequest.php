<?php

namespace App\Domains\Special\Http\Requests;

use App\Services\StorageManagerService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class WorkerRequest.
 */
class SpecialRequest extends FormRequest
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

                    'title' => ['required', 'max:350'],
                    'worker_id' => ['required', 'max:350'],

                ];
            case self::METHOD_PATCH:
                return [
                    'title' => 'required|max:250',
                ];
            case self::METHOD_DELETE:
            default:
                return [
                    'id' => ['required', Rule::exists('specials')],
                    'title' => ['required', 'max:350'],
                    'worker_id' => ['required', 'max:350'],
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
