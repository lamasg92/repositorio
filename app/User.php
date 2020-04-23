<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dni', 'surname','name', 'email', 'password', 'type', 'foto', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
    
        return $this->belongsToMany('App\Role','role_user')->using('App\RoleUser')->withPivot('user_id','role_id')->withTimestamps();
    }

    public function materias()
    {
        return $this->belongsToMany('App\Materia','materia_docente','user_id','materia_id')->withPivot('estado')->withTimestamps();
    }

    public function apuntes()
    {
        return $this->hasMany('App\Apunte');
    }

    public function carreras()
    {
        return $this->belongsToMany('App\Carrera','usuario_carrera')->withPivot('id','libreta','anio_ingreso', 'estado')->withTimestamps();
    }

    public function authorizeRoles($roles)
    {
        abort_unless($this->hasAnyRole($roles), 401);
        return true;
    }
    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                 return true; 
            }   
        }
        return false;
    }
    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

    public function standard()
    {
        if ($this->roles()->where('name', 'user')->first())
            return true;
        else
            return false;
    }

    public function adminUser()
    {
        if ($this->roles()->where('name', 'admin')->first())
            return true;
        else
            return false;
    }
}
