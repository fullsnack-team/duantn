<?php

namespace App\Models\Address;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $table = 'provinces';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
    protected $hidden = ['created_at', 'updated_at'];

    public function districts()
    {
        return $this->hasMany(District::class, 'province_id', 'id');
    }
}
