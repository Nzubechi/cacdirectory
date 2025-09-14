<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'surname',
        'phone',
        'email',
        'home_address',
        'profession',
        'dob',
        'dob_day',
        'dob_month',
        'dob_year',
        'gender',
        'group',
        'department',
        'class',
        'remark',
    ];

    protected $casts = [
        'dob' => 'date',
    ];
    public function getAgeAttribute()
    {
        return $this->dob ? Carbon::parse($this->dob)->age : null;
    }

    public function getAgeBracketAttribute()
    {
        $age = $this->age;

        return is_null($age) ? null : ($age < 60 ? 'Below 60' : '60 and Above');
    }

    public function getBirthdayTodayAttribute(): bool
    {
        if (!$this->dob) {
            return false;
        }

        return $this->dob->isBirthday(); // Laravel/Carbon built-in
    }
}
