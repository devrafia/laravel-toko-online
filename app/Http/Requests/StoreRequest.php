<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'logo' => [request()->method == 'POST' ? 'required' : '', 'image', 'mimes:jpeg,jpg,png,gif,svg', 'max:2048'],
            'name' => ['required', 'min:3', 'max:255'],
            'description' => ['required', 'min:3']
        ];
    }
}
