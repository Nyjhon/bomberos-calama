<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehiculoverO extends Model
{
    use HasFactory;
    protected $dates = ['deleted_at'];
    protected $table = 'vehiculovero';

    protected $hidden = ['created_at', 'update:at'];use HasFactory;
}
