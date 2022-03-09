<?php

namespace Database\Seeders;

use App\Models\GroupPermission;
use Illuminate\Database\Seeder;

class GroupPermissionTableSeeder extends Seeder
{
    public function checkIssetBeforeCreate($data)
    {
        $groupPermission = GroupPermission::where('code', $data['code'])->first();
        if (empty($groupPermission)) {
            GroupPermission::create($data);
        } else {
            $groupPermission->update($data);
        }
    }

    public function run()
    {
        self::checkIssetBeforeCreate([
            'name' => 'Quản lý sản phẩm',
            'code' => 'product-management',
            'description' => 'Quản lý toàn bộ chức năng liên quan đến sản phẩm'
        ]);

        self::checkIssetBeforeCreate([
            'name' => 'Quản lý đơn hàng',
            'code' => 'order-management',
            'description' => 'Quản lý toàn bộ chức năng liên quan đến đơn hàng'
        ]);

        self::checkIssetBeforeCreate([
            'name' => 'Quản lý khách hàng',
            'code' => 'customer-management',
            'description' => 'Quản lý toàn bộ chức năng liên quan đến khách hàng'
        ]);

        self::checkIssetBeforeCreate([
            'name' => 'Quản lý công ty',
            'code' => 'company-management',
            'description' => 'Quản lý toàn bộ chức năng liên quan đến công ty'
        ]);

        self::checkIssetBeforeCreate([
            'name' => 'Quản lý nhân viên',
            'code' => 'employee-management',
            'description' => 'Quản lý toàn bộ chức năng liên quan đến nhân viên'
        ]);

        self::checkIssetBeforeCreate([
            'name' => 'Quản lý chức vụ',
            'code' => 'position-management',
            'description' => 'Quản lý toàn bộ chức năng liên quan đến chức vụ'
        ]);
    }
}
