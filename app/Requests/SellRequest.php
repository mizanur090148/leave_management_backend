<?php

namespace App\Requests;

use App\Models\Settings\SubCategory;
use Illuminate\Foundation\Http\FormRequest;

class SellRequest extends FormRequest
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
            'invoice_no' => [
                'required',
                'max:20'
            ],
            'code' => [
                'required',
                'digits:12'
            ],
            'unit_price' => [
                'required',
                'numeric',
                'min:0'
            ],
            'quantity' => [
                'required',
                'numeric',
                'min:0'
            ]
        ];
    }

    protected function prepareForValidation()
    {
        $code = $this->code;
        $subCategoryId = substr($code, 0, 6);
        if ($subCategoryId) {
            $subCategory = SubCategory::findOrFail($subCategoryId);
            $this->merge([
                'sub_category_id' => $subCategoryId,
                'unit_price'      => $subCategory->product_unit_price,
                'factory_id'      => factoryId()
            ]);
        }
    }
}
