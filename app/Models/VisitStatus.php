<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'colour',
        'order',
    ];

    public function getVisits()
    {
        return $this->hasMany(Visits::class, 'id');
    }
}
