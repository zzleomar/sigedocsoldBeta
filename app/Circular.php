<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Circular extends Model
{
 protected $table = 'circular';
 protected $primaryKey='id_circular';
 protected $fillable=['id_itemsubcategoria','codigo_circular','nota_circular','para_circular','de_circular','cuerpo_circular','html_circular'];
}