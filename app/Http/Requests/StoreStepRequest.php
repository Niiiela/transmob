<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreStepRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'tracking_id' => ['required', 'exists:trackings,id'],
            'description' => ['required', 'string', 'max:255'],
            'tipo' => ['required', Rule::in(['Progress', 'NOT_DELIVERY', 'DELIVERED'])]
        ];
    }
}
