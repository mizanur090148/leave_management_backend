<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UniqueCheck;
use App\Models\Outlet;

class OutletRequest extends FormRequest
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
     * Get the validation messages that apply to the erroneous request.
     *
     * @return bool
     */
    public function messages()
    {
        return [
            //'name.required' => 'Outlet name is required.'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'max:60',
                new UniqueCheck(Outlet::class),
            ],
            'responsible_person' => [
                'required',
                'max:60'
            ],
            'address' => [
                'required',
                'max:120'
            ]
        ];
    }
}
