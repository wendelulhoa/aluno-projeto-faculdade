<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class professor extends Model
{
    use HasFactory;
    public $fillable = ['name','email'];
    public $table    = 'professor';
}
