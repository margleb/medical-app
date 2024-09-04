<?php

namespace App\Enums;

class Specialty
{
    const SURGEON = 'Хирург';
    const THERAPIST = 'Терапевт';
    const ENT = 'ЛОР';

    /**
     * Получите все специальности в виде массива.
     *
     * @return array
     */
    public static function all()
    {
        return [
            self::SURGEON,
            self::THERAPIST,
            self::ENT,
        ];
    }

    /**
     * Получите список специальностей для формы выбора.
     *
     * @return array
     */
    public static function toSelectArray()
    {
        return array_values(self::all());
    }
}
