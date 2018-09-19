<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oficio extends Model
{
    protected $table = 'oficio';
    protected $primaryKey='id_oficio';
    protected $fillable=['id_documento','id_categoria','id_subcategoria','id_itemsubcategoria','id_estados','id_dependencia','id_user','numero','anio','acronimo','nota','para','de','cuerpo','fecha'];

}
