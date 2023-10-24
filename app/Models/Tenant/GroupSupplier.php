<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class GroupSupplier extends Model
{
    use HasFactory, UsesTenantConnection;
    protected $table = "group_suppliers";
    protected $fillable = [
        "name",
        "description"
    ];
    public function suppliers()
    {
        return $this->hasMany(Supplier::class);
    }
}
