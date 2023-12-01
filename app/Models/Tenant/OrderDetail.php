<?php

namespace App\Models\Tenant;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class OrderDetail extends Model
{
    use HasFactory,UsesTenantConnection;
    public $table = 'order_details';
    protected $fillable=[
        "order_id",
        "variation_id",
        "price",
        "discount",
        "discount_type",
        "quantity",
        "tax",
        "total_price",
    ];
    public function order()
    {
        return $this->belongsTo(Order::class,'order_id','id');
    }
    public function variant()
    {
        return $this->belongsTo(Variation::class,'variation_id','id');
    }
    public function orderDetailBatch()
    {
        return $this->hasMany(OrderDetailBatch::class,'order_detail_id','id');
    }
    public function scopeWhereProduct($query, array $option = [], ?int $locationId = 0){
        $query->select('variation_id',
            \DB::raw('sum(quantity) as total_quantity'),
            \DB::raw('sum(price) as total_price_import'),
            \DB::raw('sum(total_price) as total_price_sell'))
            ->with(['variant'])
            ->when($locationId != 0, function ($query) use ($locationId){
                return $query->whereHas('order', function ($query) use ($locationId){
                   return $query->where('location_id', $locationId);
                });
            });

        switch ($option[0]){
            case 'today':
                return $query->whereDate('created_at', Carbon::today())->groupBy('variation_id')->paginate(10);
            case 'yesterday':
                return $query->whereDate('created_at', Carbon::yesterday())->groupBy('variation_id')->paginate(10);
            case 'sevenDays':
                return $query->whereDate('created_at', '>=', Carbon::now()->subDays(7))->groupBy('variation_id')
                    ->paginate(10);
            case 'thirtyDays':
                return $query->whereDate('created_at', '>=', Carbon::now()->subDays(30))->groupBy('variation_id')
                    ->paginate(10);
            case 'fromTo':
                return $query->whereBetween('created_at', [$option[1], $option[2]])->groupBy('variation_id')
                    ->paginate(10);
            default:
                return responseApi("Lỗi", false);
        }
    }
}
