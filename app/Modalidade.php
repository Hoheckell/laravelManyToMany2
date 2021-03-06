<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modalidade extends Model
{

    protected $table='modalidades';
    protected $dates = ['created_at','updated_at'];
    protected $fillable = ['nome','horario'];

    public function professores(){
        return $this->belongsToMany("App\Modalidade","modalidades_professores",'professor_id','modalidade_id');
    }

}
