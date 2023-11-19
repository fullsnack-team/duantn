<?php

namespace App\Http\Controllers;

use App\Http\Requests\TenantRequest;
use App\Models\BusinessField;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class TenantController extends Controller
{
    public function __construct(
        protected TenantRequest $request
    )
    {
    }

    public function index()
    {
        $tenants = Tenant::with(['user', 'business_field'])->orderBy('created_at', 'desc')->get();
        $businessField = BusinessField::all();
        $users = User::all();
        return view('admin.tenant.index', compact('tenants', 'businessField', 'users'));
    }

    public function store()
    {
        DB::beginTransaction();
        try {
            if (!empty($this->request->validated())) {
                $filterDatabase = Tenant::where('database', $this->request->input('name_tenant'))->get();
                if (count($filterDatabase) > 0) return responseApi('Cơ sở đã tổn tại');
                else if (!$this->request->has('user_id')) {
                    $user = new User();
                    $user->name = $this->request->input('username');
                    $user->email = $this->request->input('email');
                    $user->password = password_hash($this->request->input('password'),PASSWORD_DEFAULT);
                    $user->pricing_id = 1;
                    $user->save();
                    return responseApi('Tạo người dùng thành công', true);
                } else {
                    $tenant = new Tenant();
                    $tenant->name = $this->request->input('name_tenant');
                    $tenant->domain = $this->request->input('name_tenant') . ".com";
                    $tenant->database = $this->request->input('name_tenant');
                    $tenant->user_id = $this->request->input('user_id');
                    $tenant->business_field_id = $this->request->input('business_field');
                    $tenant->status = 1;
                    $tenant->save();
                    return responseApi('Tạo chi nhánh thành công', true);
                }
            }
            DB::commit();
            return responseApi("Tạo thất bại", true);

        } catch (\Throwable $throwable) {
            DB::rollBack();
            return responseApi($throwable->getMessage());
        }
    }
}