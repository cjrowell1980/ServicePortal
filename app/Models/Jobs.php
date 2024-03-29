<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    public $table = "jobs";

    use HasFactory;

    protected $fillable = [
        'machine',
        'status',
        'type',
        'job_no',
        'reported',
        'job_ref',
    ];

    public function getStatus()
    {
        return $this->belongsTo(JobStatus::class, 'status');
    }

    public function getType()
    {
        return $this->belongsTo(JobType::class, 'type');
    }
}
