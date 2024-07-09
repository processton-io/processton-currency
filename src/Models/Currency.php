<?php

namespace Processton\ProcesstonCurrency\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = 'currencies';
    protected $guarded = []; 

    use HasFactory;
}
