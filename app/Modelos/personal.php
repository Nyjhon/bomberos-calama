<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class personal extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'personal';

    protected $hidden = ['created_at', 'update:at'];
    public function getcurso(){
    	return $this->hasMany(curso::class, 'ci', 'ci')->orderBy('id','asc');
    }
    public function getexperiencia(){
    	return $this->hasMany(experiencia::class, 'ci', 'ci')->orderBy('id','asc');
    }
    public function getreconocimiento(){
    	return $this->hasMany(reconocimiento::class, 'ci', 'ci')->orderBy('id','asc');
    }
    public function getatenuante(){
    	return $this->hasMany(atenuante::class, 'ci', 'ci')->orderBy('id','asc');
    }
    public function getagravante(){
    	return $this->hasMany(agravante::class, 'ci', 'ci')->orderBy('id','asc');
    }
}
