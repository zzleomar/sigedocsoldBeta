<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Relations;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use DB;
class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_dependencia','id_perfil','id_pais','id_state','id_municipio','id_ciudad','name', 'email','avatar','cedula','nombres','apellidos','telefono','sexo','ocupacion'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    public function perfil()
    {
        return $this->belongsToMany('App\Perfil');
    }
 public static function usuario($id,$id_perfil)
    {
        return User::select(DB::table('users')
                ->raw("CONCAT(users.nombres,' ',users.apellidos)  AS fullname"),'id')
                ->where('id_perfil',$id_perfil)
                ->where('id_dependencia', $id)
                ->get(); 
    }
}