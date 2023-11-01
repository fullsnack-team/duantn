<?php

namespace App\Models\Tenant;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, UsesTenantConnection;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function inventoryTransactions()
    {
        return $this->hasMany(InventoryTransaction::class,'created_by','id');
    }
    public function payments()
    {
        return $this->hasMany(Payment::class,'created_by','id');
    }
    public function orderReturns()
    {
        return $this->hasMany(OrderReturn::class,'created_by','id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class,'created_by','id');
    }
    public function locations()
    {
        return $this->hasMany(Location::class,'created_by','id');
    }
}
