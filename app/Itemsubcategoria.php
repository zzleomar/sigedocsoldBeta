<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Itemsubcategoria extends Model
{
 protected $table = 'itemsubcategoria';
 protected $primaryKey='id_itemsubcategoria';
 protected $fillable=['id_subcategoria','nombre_itemsubcategoria','descripcion_itemsubcategoria'];
 public static function itemsubcategorias($id)
 {
    return Itemsubcategoria::where('id_subcategoria', $id)->get();
 }  
}