<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    public $table = "job_types";

    use HasFactory;

    protected $fillable = [
        'name',
        'order',
    ];

    public function getJobs()
    {
        return $this->hasMany(Jobs::class, 'type');
    }
}
