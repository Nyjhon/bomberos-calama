<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehiculoverR extends Model
{
    use HasFactory;
    protected $dates = ['deleted_at'];
    protected $table = 'vehiculoverr';

    protected $hidden = ['created_at', 'update:at'];use HasFactory;
}
