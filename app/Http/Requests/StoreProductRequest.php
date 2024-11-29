<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'stock' => 'required|integer|min:0|max:10000',
            'expired_at' => 'nullable|date|after:' . Carbon::now(),
            'avatar' => 'required|file|max:3072', // max:3072 tương ứng 3MB
            'sku' => [
                'required',
                'string',
                'min:10',
                'max:20',
                'regex:/^[a-zA-Z0-9]+$/',
                'unique:products,sku',
            ],
            'category_id' => 'required|exists:categories,id',
        ];
    }
}
