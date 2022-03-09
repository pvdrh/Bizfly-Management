<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function checkIssetBeforeCreate($data)
    {
        $permission = Permission::where('name', $data['name'])->first();
        if (empty($permission)) {
            Permission::create($data);
        } else {
            $permission->update($data);
        }
    }

    public function run()
    {
        // SuperAdmin
        self::checkIssetBeforeCreate([
            'name' => 'super-admin',
            'display_name' => 'Toàn bộ quyền',
            'group_code' => null,
            'description' => 'Có toàn quyền sử dụng hệ thống'
        ]);

        // Product
        self::checkIssetBeforeCreate([
            'name' => 'get-list-product',
            'display_name' => 'Xem danh sách sản phẩm',
            'group_code' => 'product-management',
            'description' => 'Xem danh sách sản phẩm'
        ]);
        self::checkIssetBeforeCreate([
            'name' => 'update-product',
            'display_name' => 'Cập nhập thông tin sản phẩm',
            'group_code' => 'product-management',
            'description' => 'Cập nhật thông tin sản phẩm'
        ]);
        self::checkIssetBeforeCreate([
            'name' => 'update-product',
            'display_name' => 'Xóa sản phẩm',
            'group_code' => 'product-management',
            'description' => 'Xóa sản phẩm'
        ]);

        // Order
        self::checkIssetBeforeCreate([
            'name' => 'get-list-order',
            'display_name' => 'Xem danh sách đơn hàng',
            'group_code' => 'order-management',
            'description' => 'Xem danh sách đơn hàng'
        ]);
        self::checkIssetBeforeCreate([
            'name' => 'update-order',
            'display_name' => 'Chuyển trạng thái đơn hàng',
            'group_code' => 'order-management',
            'description' => 'Chuyển trạng thái đơn hàng'
        ]);

        // Customer
        self::checkIssetBeforeCreate([
            'name' => 'get-list-customer',
            'display_name' => 'Xem danh sách khách hàng',
            'group_code' => 'customer-management',
            'description' => 'Xem danh sách khách hàng'
        ]);
        self::checkIssetBeforeCreate([
            'name' => 'update-customer',
            'display_name' => 'Cập nhập thông tin khách hàng',
            'group_code' => 'customer-management',
            'description' => 'Cập nhật thông tin khách hàng'
        ]);
        self::checkIssetBeforeCreate([
            'name' => 'delete-customer',
            'display_name' => 'Xóa khách hàng',
            'group_code' => 'customer-management',
            'description' => 'Xóa khách hàng'
        ]);

        // Company
        self::checkIssetBeforeCreate([
            'name' => 'get-list-company',
            'display_name' => 'Xem danh sách công ty',
            'group_code' => 'company-management',
            'description' => 'Xem danh sách công ty'
        ]);
        self::checkIssetBeforeCreate([
            'name' => 'update-company',
            'display_name' => 'Cập nhập thông tin công ty',
            'group_code' => 'company-management',
            'description' => 'Cập nhật thông tin công ty'
        ]);
        self::checkIssetBeforeCreate([
            'name' => 'delete-company',
            'display_name' => 'Xóa công ty',
            'group_code' => 'company-management',
            'description' => 'Xóa công ty'
        ]);

        // Employee
        self::checkIssetBeforeCreate([
            'name' => 'get-list-employee',
            'display_name' => 'Xem danh sách nhân viên',
            'group_code' => 'employee-management',
            'description' => 'Xem danh sách công ty'
        ]);
        self::checkIssetBeforeCreate([
            'name' => 'update-employee',
            'display_name' => 'Cập nhập thông tin công viên',
            'group_code' => 'employee-management',
            'description' => 'Cập nhật thông tin công ty'
        ]);
        self::checkIssetBeforeCreate([
            'name' => 'delete-employee',
            'display_name' => 'Xóa nhân viên',
            'group_code' => 'employee-management',
            'description' => 'Xóa nhân viên'
        ]);
    }
}
