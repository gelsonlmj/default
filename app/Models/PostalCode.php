<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostalCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'from_postcode',
        'to_postcode',
        'from_weight',
        'to_weight',
        'cost'
    ];
}
