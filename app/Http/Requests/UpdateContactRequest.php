<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContactRequest extends FormRequest
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
        $id = $this->route('contact');

        return [
            'name' => 'required|string|min:5',
            'contact' => 'required|string|max:9|unique:contacts,contact,' . $id,
            'email' => 'required|email|unique:contacts,email,' . $id,
        ];
    }
}
