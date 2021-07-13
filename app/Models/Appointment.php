<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = ['patient','doctor', 'contact', 'description', 'time', 'date'];
    protected $primarykey = "id";

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        self::created(function (Appointment $appointment) {
            if (!$appointment->doctors()->get()->contains(2)) {
                $appointment->doctors()->attach(2);
            }
        });
    }

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class);
    }
}
