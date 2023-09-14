<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price'];

        // Relación uno a muchos con LogCoin
        public function logCoins()
        {
            return $this->hasMany(LogCoin::class);
        }
}