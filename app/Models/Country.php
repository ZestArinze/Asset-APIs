<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    // disable default timestamps for table
    public $timestamps = false;

    protected $fillable = [
        'sortname',
        'name',
        'phonecode',
    ];

    /**
     * 
     * get states in the country
     */
    public function states() {
        return $this->hasMany(State::class);
    }
}
