<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visits extends Model
{
    use HasFactory;

    protected $fillable = [
        'job',
        'engineer',
        'status',
        'notes',
        'js',
        'ph',
        'pi',
        'ci',
        'notes',
        'report',
    ];
}
