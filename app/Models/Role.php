<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = ['role'];
    protected $primarykey = "id";


    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }
}
