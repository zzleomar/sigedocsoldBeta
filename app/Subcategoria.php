<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Subcategoria extends Model
{
    protected $table = 'subcategoria_documento';
    protected $primaryKey='id_subcategoria';
    protected $fillable=['id_categoria','nombre_subcategoria','descripcion_subcategoria'];
    public static function subcategorias($id)
    {
        return Subcategoria::where('id_categoria', $id)->get();
    }
}