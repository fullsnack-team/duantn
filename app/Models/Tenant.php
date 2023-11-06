<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Spatie\Multitenancy\Actions\MigrateTenantAction;
use Spatie\Multitenancy\Commands\TenantsArtisanCommand;
use Spatie\Multitenancy\Models\Tenant as SpatieTenant;

class Tenant extends SpatieTenant
{
    use SoftDeletes;

    protected $table = 'tenants';

    protected static function booted()
    {
        static::created(fn(Tenant $model) => $model->createDatabase());
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function business_field()
    {
        return $this->belongsTo(BusinessField::class, 'business_field_id');
    }

    public function createDatabase()
    {
        // add logic to create database
        try {

            $this->makeCurrent();
            $status = DB::statement("CREATE DATABASE IF NOT EXISTS `{$this->database}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;");
            if ($status) {
                Artisan::call(TenantsArtisanCommand::class, [

                    'artisanCommand' => 'migrate --path=database/migrations/tenant --database=tenant',

                    '--tenant' => $this->id,

                ]);

                $role = Tenant\Role::create([
                    'name' => 'admin',
                    'guard_name' => 'tenant'
                ]);

                $user = $this->user;
                $userCreate = \App\Models\Tenant\User::query()->create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'username' => $user->name,
                ]);
//                dd(config('permission.models.role'));
                $userCreate->roles()->attach($role->id);

            }

        } catch (\Throwable $th) {

            throw $th;

        }
    }
}
