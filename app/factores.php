<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class factores extends Model
{
     protected $table = 'factores';
    protected $primaryKey='id_factores';
    protected $fillable=['id_user','id_preparaduria','id_periodo','f1','f2','f3','f4','f5','f6','f7','f8','f9','f10','lugar'];

}
