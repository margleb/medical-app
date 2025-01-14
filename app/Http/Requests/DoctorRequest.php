<?php

namespace App\Http\Requests;

use App\Enums\Specialty;
use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
{


    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Получите правила валидации, которые должны применяться к запросу.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:10',
            'specialty' => 'required|in:' . implode(',', Specialty::toSelectArray()),
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
            'name.max' => 'Имя доктора должно быть не более 10 символов.',
            'specialty.required' => 'Специальность обязательно для выбора.',
            'specialty.in' => 'Выбранная специальность недопустима.',
        ];
    }
}
