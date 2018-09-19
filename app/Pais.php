<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Pais extends Model
{
    protected $table = 'pais';
    protected $primaryKey='id_pais';
    protected $fillable=['nombre'];
    public function users()
    {
        return $this->hasMany('App\User', 'pais', 'id');
    }
}