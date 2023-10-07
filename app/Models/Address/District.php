<?php

namespace App\Models\Address;

use App\Models\Address\Commune;
use App\Models\Address\Province;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $table = 'districts';
    protected $fillable = [
        'name',
        'province_id',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    public function communes()
    {
        return $this->hasMany(Commune::class);
    }
}
