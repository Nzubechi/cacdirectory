<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'surname',
        'phone',
        'email',
        'address',
        'home_address',
        'profession',
        'dob',
        'group',
    ];

    protected $dates = ['dob'];
    protected $casts = [
        'dob' => 'date',
    ];

    public function getAgeAttribute()
    {
        return $this->dob ? $this->dob->age : null;
    }
}
