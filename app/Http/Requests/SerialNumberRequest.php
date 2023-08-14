<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SerialNumberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'product_id' => 'required|numeric|exists:products,id',
            'price'      => 'required|numeric',
            'prod_date'  => 'required|date',
            'warranty_start' => 'required|date|after_or_equal:prod_date',
            'warranty_duration' => 'required|numeric|min:1',
            'serial_no'  => 'required|numeric|digits:6', // add unique validation
            /*'serial_no'  => [
                'required',
                'numeric',
                'digits:6',
                Rule::unique('serial_numbers')
                    ->where('product_id', $this->product_id)
                    ->ignore($this->serial)
            ],*/
        ];
    }
}
