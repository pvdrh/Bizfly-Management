<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, WithMapping, WithHeadings, WithColumnWidths
{
    private $users;

    public function __construct($users)
    {
        $this->users = $users;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->users;
    }

    public function headings(): array
    {
        return [
            'Mã nhân viên',
            'Họ tên',
            'Email',
            'Số điện thoại',
            'Địa chỉ',
            'Giới tính',
        ];
    }

    public function map($user) :array
    {
        return [
            $user->info->code,
            $user->info->name,
            $user->email,
            $user->info->phone,
            $user->info->address,
            $user->info->gender ? 'Nam' : 'Nữ',
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 15,
            'B' => 30,
            'C' => 25,
            'D' => 20,
            'E' => 20,
            'F' => 10,
        ];
    }
}
