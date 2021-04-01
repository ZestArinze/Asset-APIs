<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    // disable default timestamps for table
    public $timestamps = false;

    protected $fillable = [
        'name',
        'country_id',
    ];

    /**
     * 
     * get cities in the state
     */
    public function cities() {
        return $this->hasMany(City::class);
    }
}
