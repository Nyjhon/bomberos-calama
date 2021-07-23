<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class curso extends Model
{
    use HasFactory;
    protected $dates = ['deleted_at'];
    protected $table = 'cursos';

    protected $hidden = ['created_at', 'update:at'];
}
