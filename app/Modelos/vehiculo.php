<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class vehiculo extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'vehiculos';

    protected $hidden = ['created_at', 'update:at'];
    public function getmantenimiento(){
    	return $this->hasMany(vehiculoverM::class, 'sigla', 'sigla')->orderBy('fecha','asc');
    }
    public function getdocumentos(){
    	return $this->hasMany(vehiculoverD::class, 'sigla', 'sigla')->orderBy('fecha','asc');

    }
    public function getrequerimiento(){
    	return $this->hasMany(vehiculoverR::class, 'sigla', 'sigla')->orderBy('fecha','asc');

    }
    public function getotros(){
        return $this->hasMany(vehiculoverO::class, 'sigla', 'sigla')->orderBy('fecha','asc');

    }

}
