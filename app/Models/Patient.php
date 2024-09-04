<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    /**
     * Указываем, какие поля можно массово заполнять (mass assignable).
     */
    protected $fillable = ['name', 'age', 'doctor_id'];

    /**
     * Связь с моделью Doctor (многие к одному).
     */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
