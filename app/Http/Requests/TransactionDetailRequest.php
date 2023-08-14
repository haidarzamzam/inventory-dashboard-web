<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionDetailRequest extends FormRequest
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
            'transaction_id' => 'required|numeric|exists:transactions,id',
            'product_id'     => 'required|numeric|exists:products,id',
            'serial_no'      => 'required|numeric|exists:serial_numbers,serial_no',
            'price'          => 'required|numeric',
            'discount'       => 'required|numeric|lte:price'
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'transaction_id' => $this->route('transaction_id')
        ]);
    }
}
