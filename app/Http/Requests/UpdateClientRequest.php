<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'cpf_cnpj' => 'required|string|max:20|unique:clients,cpf_cnpj,' . $this->client->id,
            'photo' => 'nullable|image|mimes:png|max:2048',
            'social_name' => 'nullable|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'photo.mimes' => 'A foto deve ser no formato PNG.',
            'photo.max' => 'A foto não pode ultrapassar 2MB.',
            'name.required' => 'O campo nome é obrigatório.',
            'cpf_cnpj.unique' => 'Este CPF/CNPJ já está cadastrado.',
        ];
    }
}
