<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Models\SubscriptionOrder;
use App\Models\SubscriptionOrderNote;
use App\Models\TenantChangeHistory;
use App\Models\Order;
use App\Models\Pricing;
use App\Http\Requests\OrderRequest;

class OrderController extends Controller
{
    public function index()
    {
        $tenants = Tenant::get();
        $pricings = Pricing::get();
        $data = SubscriptionOrder::with('tenant:id,business_name', 'pricing:id,name', 'assignedTo:id,name')->orderBy('created_at')->get();
        $subscriptionOrder = $data->map(function ($item) {
            return [
                'id' => $item->id,
                'tenant' => $item->tenant->business_name,
                'pricing' => $item->pricing->name,
                'type' => $item->type,
                'name' => $item->name,
                'tel' => $item->tel,
                'assigned_to' => $item->assignedTo->name,
                'status' => $item->status,
                'status_name' => $this->checkStatus($item->status),
                'created_at' => $item->created_at->format('Y-m-d H:i'),
            ];
        });
        return view('admin.order.index', compact('subscriptionOrder', 'tenants', 'pricings'));
    }

    public function show(Request $request)
    {
        $subscriptionOrder = SubscriptionOrder::with('tenant:id,business_name', 'pricing:id,name', 'assignedTo:id,name')->where('id', $request->id)->get();
        $notes = SubscriptionOrderNote::where('subscription_order_id', $request->id)->first()?->note;
        $data = $subscriptionOrder->map(function ($item) {
            return [
                'id' => $item->id,
                'tenant' => $item->tenant->business_name,
                'pricing' => $item->pricing->name,
                'type' => $item->type,
                'name' => $item->name,
                'tel' => $item->tel,
                'assigned_to' => $item->assignedTo->name,
                'status_name' => $this->checkStatus($item->status),
                'created_at' => $item->created_at->format('Y-m-d H:i'),
            ];
        });
        return response()->json(['detail' => collect($data)->collapse(), 'notes' => $notes]);
    }

    public function checkStatus($status)
    {
        if ($status == 0) {
            return 'Huỷ';
        } elseif ($status == 1) {
            return 'Chưa xử lý';
        } elseif ($status == 2) {
            return 'Đang xử lý';
        } elseif ($status == 3) {
            return 'Đã xử lý';
        } else {
            return 'Không xác định';
        }
    }

    public function updateStatus(Request $request)
    {
        $order = SubscriptionOrder::findOrFail($request->id);
        $order->update([
            'status' => $request->status,
        ]);
        return response()->json(['success' => 'Cập nhật trạng thái thành công!']);
    }

    public function store(OrderRequest $request)
    {
        try {
            $order = SubscriptionOrder::create([
                'tenant_id' => $request->tenant_id,
                'pricing_id' => $request->pricing_id,
                'type' => $request->type,
                'name' => $request->name,
                'tel' => $request->tel,
                'assigned_to' => auth()->user()->id,
                'status' => 1,
            ]);
            if ($request->has('note') && $request->note != '' && $order) {
                SubscriptionOrderNote::create([
                    'subscription_order_id' => $order->id,
                    'note' => $request->note,
                    'created_by' => auth()->user()->id
                ]);
            }
            $tenant = Tenant::findOrFail($request->tenant_id);
            $price = Pricing::findOrFail($request->pricing_id)?->price;
            TenantChangeHistory::create([
                'tenant_id' => $request->tenant_id,
                'change_type' => $request->type,
                'from_pricing_id' => $tenant->pricing_id,
                'to_pricing_id' => $request->pricing_id,
                'total_price' => $price,
                'created_by' => auth()->user()->id
            ]);
            return responseApi('Tạo yêu cầu thành công', true);
        } catch (\Throwable $throwable) {
            return responseApi($throwable->getMessage(), false);
        }
    }

    public function delete(Request $request)
    {
        try {
            $subscriptionOrder = SubscriptionOrder::findOrFail($request->id);
            if (!$subscriptionOrder) return response()->json(['error' => 'Không tìm thấy đơn hàng!']);
            $subscriptionOrder->delete();
            $subscriptionOrderNote = SubscriptionOrderNote::where('subscription_order_id', $request->id);
            if ($subscriptionOrderNote) $subscriptionOrderNote->delete();
            return response()->json(['msg' => 'Xóa thành công!', 'status' => 200]);
        } catch (\Throwable $throwable) {
            return response()->json(['error' => $throwable->getMessage()]);
        }
    }

    public function createNote(Request $request)
    {
        $check = SubscriptionOrderNote::where('subscription_order_id', $request->subscription_order_id)->first();
        if ($check) {
            $check->update([
                'note' => $request->note,
                'created_by' => auth()->user()->id
            ]);
            return response()->json(['success' => 'Cập nhật ghi chú thành công!']);
        }
        SubscriptionOrderNote::create([
            'subscription_order_id' => $request->subscription_order_id,
            'note' => $request->note,
            'created_by' => auth()->user()->id
        ]);
        return response()->json(['success' => 'Thêm ghi chú thành công!']);
    }

    public function showNote(Request $request)
    {
        $notes = SubscriptionOrderNote::where('subscription_order_id', $request->subscription_order_id)->first()?->note;
        return response()->json(['notes' => $notes]);
    }

    public function listTenantChangeHistory(Request $request)
    {
        $tenantChangeHistory = TenantChangeHistory::query()
            ->with('tenant:id,business_name', 'fromPricing:id,name', 'toPricing:id,name', 'createdBy:id,name')
            ->orderBy('created_at')
            ->get();
        $data = $tenantChangeHistory->map(function ($item) {
            return [
                'id' => $item->id,
                'tenant' => $item->tenant->business_name,
                'change_type' => $item->change_type,
                'from_pricing' => $item->fromPricing->name,
                'to_pricing' => $item->toPricing->name,
                'total_price' => $item->total_price,
                'created_by' => $item->createdBy->name,
                'created_at' => $item->created_at->format('Y-m-d H:i'),
            ];
        });
        return view('admin.order.request', compact('data'));
    }

    public function showTenantChangeHistory(Request $request)
    {
        $tenantChangeHistory = TenantChangeHistory::query()
            ->where('id', $request->id)
            ->first();
        return response()->json(['detail' => $tenantChangeHistory]);
    }

    public function storeOrder(Request $request)
    {
        try {
            $tenantChangeHistory = TenantChangeHistory::query()
                ->where('id', $request->id)
                ->first();
            $order = Order::create([
                'tenant_change_history_id' => $request->id,
                'total' => $tenantChangeHistory->total_price,
                'payment_method' => $request->payment_method,
                'reference_code' => $request->reference_code,
                'created_by' => auth()->user()->id,
            ]);
            if ($order) {
                SubscriptionOrder::where('tenant_id', $tenantChangeHistory->tenant_id)->update([
                    'status' => 3,
                ]);
            }
            return response()->json(['success' => 'Tạo thành công!', 'order' => $order]);
        } catch (\Throwable $throwable) {
            return response()->json(['error' => $throwable->getMessage()]);
        }
    }
}
