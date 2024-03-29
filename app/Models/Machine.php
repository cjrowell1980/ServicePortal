<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    public $table = 'machine';

    use HasFactory;

    protected $fillable = [
        'customer',
        'stock',
        'asset',
        'make',
        'model',
        'serial',
        'yom',
        'warranty',
        'warranty_period',
    ];

    public function getCustomer()
    {
        return $this->belongsTo(Customers::class, 'customer');
    }
}
