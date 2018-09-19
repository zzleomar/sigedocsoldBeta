<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
     protected $table = 'status';
     protected $primaryKey = 'id_status';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
     ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
    public function status()
    {   
        return $this->belongsTo('App\User','rol_id');
    }
}
