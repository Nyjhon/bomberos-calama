<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class activo extends Model
{
	use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'activos';

    protected $hidden = ['created_at', 'update:at'];
}
