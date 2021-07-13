<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = ['P_firstName', 'P_middleName', 'P_lastName',
    'P_gender', 'P_age', 'P_medHistory',
    'P_guardian','P_lastVisit', 'P_status',
    'P_contactNum', 'P_location', 'P_reasonVisit'
    , 'P_amountPaid' , 'P_visitDescription'];
}