<?php

namespace App;
use App\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password','t_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
                    
    public function setPasswordAttribute($password){
        $this->attributes['password']=\Hash::make($password);
    }
    
    public function teams(){
      return $this->belongsToMany(Team::class);
    }
    public function roles(){
    return $this->belongsToMany(Role::class);
    }
    
    // 判断用户是否具有某个角色
    public function hasRole($role){
    if (is_string($role)) {
        return $this->roles->contains('name', $role);
        }
    return !! $role->intersect($this->roles)->count();
    }
    
    
    // 判断用户是否具有某权限
    public function hasPermission($permission)
    {
      return $this->hasRole($permission->roles);
    }
    
    
    public function isAdmin(){
        return $this->hasRole('admin');
    }
    
    
    // 给用户分配角色
    public function assignRole($role)
    {
       return $this->roles()->save(
       Role::whereName($role)->firstOrFail()
       );
    }
}
