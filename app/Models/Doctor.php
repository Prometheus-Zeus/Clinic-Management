<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = ['d_firstname','d_middlename', 'd_lastname', 'd_contact', 'd_gender', 'd_specialist', 'd_schedule', 'd_rate'];
    protected $primarykey = "id";
}
