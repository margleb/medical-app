<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
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
            'name' => 'required|string|max:10',
            'doctor_id' => 'required|exists:doctors,id', // Проверка на существование врача
        ];
    }

    /**
     * Сообщения об ошибках для валидации.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.max' => 'Имя пациента максимум 10 символов.',
            'doctor_id.required' => 'Выбор врача обязателен.',
            'doctor_id.exists' => 'Выбранный врач не существует.',
        ];
    }
}
