<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Exists;

class StoreFreightRequest extends FormRequest
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
        return 
        [
            'origin' => ['required', 'string', 'max:255'],
	        'destination' => ['required', 'string', 'max:255'],
	        'sender_id' => ['required', 'exists:customers,id'],
	        'destination_id' => ['required', 'exists:customers,id'],
        ];
    }
}
