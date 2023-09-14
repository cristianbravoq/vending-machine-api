<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $fillable = ['description'];

        // Relación uno a muchos con LogCoin
        public function logCoins()
        {
            return $this->hasMany(LogCoin::class);
        }
}