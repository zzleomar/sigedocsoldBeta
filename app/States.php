<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    protected $table='states';
    protected $primaryKey='id_state';
    protected $fillable=['id_pais','nombre'];
    public static function estados($id)
    {
        return States::where('id_pais', $id)->get();
    }
}
