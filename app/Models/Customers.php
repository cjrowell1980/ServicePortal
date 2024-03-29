<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    public $table = "customers";

    use HasFactory;

    protected $fillable = [
        'syrinx',
        'name',
    ];

    public function getMachines()
    {
        return $this->hasMany(Machine::class, 'customer');
    }
}
