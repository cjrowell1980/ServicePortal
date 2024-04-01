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
        'report',
        'active',
    ];

    public function getStatus()
    {
        return $this->belongsTo(VisitStatus::class, 'id');
    }

    public function getJob()
    {
        return $this->belongsTo(Jobs::class, 'id');
    }

    public function getEngineer()
    {
        return $this->belongsTo(Engineers::class, 'id');
    }
}
