<?php

namespace App\Domains\Worker\Http\Requests;

use App\Services\StorageManagerService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class WorkerRequest.
 */
class WorkerRequest extends FormRequest
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

                    'name' => ['required', 'max:350'],
                    'dob' => ['required', 'max:350'],
                    'title' => ['required', 'max:350'],
                    'gender' => ['required', 'max:350'],
                    'email' => ['nullable', 'max:350'],
                    'additional_mobile_number' => ['nullable', 'max:350'],
                    'area' => ['required', 'max:350'],
                    'description' => ['required', 'max:3500'],
                    'price' => ['required', 'max:350'],
                    'years_of_experience' => ['required', 'max:350'],
                    'number_of_employees' => ['required', 'max:350'],
                    'category_id' => ['required','exists:categories,id'],
                    'city_id' => ['required','exists:cities,id'],
                    'is_verified' => ['sometimes','in:0,1'],
                    'personal_photo' => ['required', 'mimes:'.implode(',',StorageManagerService::$allowedImages)],
                    'image' => ['required', 'mimes:'.implode(',',StorageManagerService::$allowedImages)],
                ];
            case self::METHOD_PATCH:
                return [
                    'id' => ['required', Rule::exists('workers')],
                    'name' => 'required|max:250',
                    'dob' => ['required', 'max:350'],
                    'title' => 'required|max:250',
                    'gender' => ['required', 'max:350'],
                    'email' => ['nullable', 'max:350'],
                    'additional_mobile_number' => ['nullable', 'max:350'],
                    'area' => 'required|max:250',
                    'description' => 'required|max:250',
                    'years_of_experience' => 'required|max:250',
                    'number_of_employees' => 'required|max:250',
                    'category_id' => ['required','exists:categories,id'],
                    'city_id' => ['required','exists:cities,id'],
                    'is_verified' => ['sometimes','in:yes,no'],
                    'image' => ['Nullable', 'mimes:'.implode(',',StorageManagerService::$allowedImages)],
                    'personal_photo' => ['nullable', 'mimes:'.implode(',',StorageManagerService::$allowedImages)],
                ];
            case self::METHOD_DELETE:
            default:
                return [
                    'id' => ['required', Rule::exists('workers')],
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
