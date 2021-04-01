<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    // disable default timestamps for table
    public $timestamps = false;

    protected $fillable = [
        'name',
        'state_id',
    ];
}
