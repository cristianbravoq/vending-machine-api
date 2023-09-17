<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acumulado extends Model
{
    use HasFactory;
    protected $table = 'acumulados';

    protected $fillable = ['valor_acumulado'];
}
