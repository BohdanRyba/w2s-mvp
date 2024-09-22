<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaxClass extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'tax_rate',
    ];
}
