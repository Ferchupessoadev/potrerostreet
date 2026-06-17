<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8'],
        ];
    }


    public function messages(): array
    {
        return [
            // Mensajes para 'name'
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser un texto válido.',
            'name.max' => 'El nombre no puede superar los 255 caracteres.',

            // Mensajes para 'email'
            'email.required' => '¡Necesitamos tu correo para registrarte!',
            'email.string' => 'El correo debe ser un texto válido.',
            'email.email' => 'El formato del correo no es válido.',
            'email.max' => 'El correo es demasiado largo.',
            'email.unique' => 'Este correo ya está registrado en nuestra plataforma.',

            // Mensajes para 'password'
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
        ];
    }
}
