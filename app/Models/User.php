<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Role;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function products(){
        return $this->hasMany(\App\Models\Product::class);
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }
    public function assignRole($role)
    {
        if(is_string($role)) {
            $role = Role::whereName($role)->firstOrFail();
        }
        $this->roles()->sync($role, false);
    }
    public function hasRole($role)
    {
        if(is_string($role)) {
            $role = $this->roles()->whereName($role)->first();
            if($role!=null) {
                return true;
            }
        }
        return false;
    }
    public function permissions()
    {
/*         return $this->roles()->with('permissions')->get()->pluck('permissions')->flatten()->pluck('name')->unique();
 */
        return $this->roles->map->permissions->flatten()->pluck('name')->unique();
    }

    public function orders(){
        return $this->hasMany(\App\Models\Order::class);
    }

    public function cart(){
        return $this->hasMany(\App\Models\Cart::class);
    }
}
