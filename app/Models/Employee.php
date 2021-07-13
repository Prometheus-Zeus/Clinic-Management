<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['e_firstname','e_middlename', 'e_lastname', 'e_contact', 'e_gender', 'e_role', 'e_schedule', 'e_rate'];
    protected $primarykey = "id";

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        self::created(function (Employee $employee) {
            if (!$employee->roles()->get()->contains(2)) {
                $employee->roles()->attach(2);
            }
        });
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
