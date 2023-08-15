<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TransactionRequest extends FormRequest
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
            'customer'   => 'required|max:100',
            'trans_type' => 'required|in:sell,buy',
            'trans_no'   => [
                'required',
                'numeric',
                'digits:4',
                Rule::unique('transactions')
                    ->whereNull('deleted_at')
                    ->ignore($this->transaction->id ?? 0)
            ],
        ];
    }
}
