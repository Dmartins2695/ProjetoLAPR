<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable,Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
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
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function assignRole($role){
        if(is_string($role)){
            $role = Role::whereName($role)->firstOrFail();
        }
        $this->roles()->syncWithoutDetaching($role);
    }

    public function deleteRole($role){
        if(is_string($role)){
            $role = Role::whereName($role)->firstOrFail();
        }
        return $this->roles()->detach($role);
    }

    public function hasRole($roleName){
        $roles=$this->roles;
        foreach ($roles as $role) {
            if (strcmp($role->name, $roleName)==0){
                return true;
            }
        }
        return false;
    }

    public function permissions(){
        return $this->roles->map->permissions->flatten()->pluck('name')->unique();
    }

    public function rolesNames(){
        return $this->roles->pluck('name')->all();
    }

    public function isSub(){
        $roles = $this->rolesNames();
        foreach ($roles as $role) {
            if (strcmp('sub', $role) == 0) {
                return true;
            }
        }
        return false;
    }

    public function isAdmin(){
        $roles = $this->rolesNames();
        foreach ($roles as $role) {
            if (strcmp('admin', $role) == 0) {
                return true;
            }
        }
        return false;
    }

//Order
    public function orders(){
        return $this->hasMany(Order::class);
    }

}
