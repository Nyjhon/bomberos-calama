<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reconocimiento extends Model
{
    use HasFactory;
    protected $dates = ['deleted_at'];
    protected $table = 'reconocimientos';

    protected $hidden = ['created_at', 'update:at'];
}
