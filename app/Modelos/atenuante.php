<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class atenuante extends Model
{
    use HasFactory;
    protected $dates = ['deleted_at'];
    protected $table = 'atenuantes';

    protected $hidden = ['created_at', 'update:at'];
}
