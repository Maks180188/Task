<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    public $table = 'persons';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'number',
        'name',
        'last_name',
        'gender',
        'date_of_birth'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'number' => 'integer',
        'name' => 'string',
        'last_name' => 'string',
        'string' => 'string',
        'date_of_birth' => 'date',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'number' => 'required|integer|min:1',
        'name' => 'string|max:124',
        'last_name' => 'string|max:124',
        'gender' => 'in:M,F',
        'date_of_birth' => 'date_format:Y-m-d|before:today'
    ];

}
