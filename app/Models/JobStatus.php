<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobStatus extends Model
{
    public $table = "job_statuses";

    use HasFactory;

    protected $fillable = [
        'name',
        'colour',
        'order',
    ];

    public function getJobs()
    {
        return $this->hasMany(Jobs::class, 'status');
    }
}
