<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogCoin extends Model
{
    use HasFactory;
    protected $fillable = ['log_id', 'value'];

        // Relación de pertenencia a Log
        public function log()
        {
            return $this->belongsTo(Log::class);
        }
}
