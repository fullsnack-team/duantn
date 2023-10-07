<?php

namespace App\Models\Address;

use App\Models\Address\District;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    use HasFactory;
    protected $table = 'communes';
    protected $fillable = [
        'name',
        'district_id',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
