<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Convocatoria extends Model
{
 protected $table = 'convocatoria';
 protected $primaryKey='id_convocatoria';
 protected $fillable=['id_itemsubcategoria','codigo_convocatoria','nota_convocatoria','para_convocatoria','de_convocatoria','cuerpo_convocatoria','html_convocatoria'];
}