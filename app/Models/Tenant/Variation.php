<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class Variation extends Model
{
    use HasFactory,UsesTenantConnection;
    public $table = 'variations';
    protected $fillable=[
        "product_id",
        "sku",
        "barcode",
        "variation_name",
        "display_name",
        "image",
        "price_import",
        "price_export",
        "status",
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'boolean',
    ];
}