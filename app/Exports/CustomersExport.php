<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class CustomersExport implements FromCollection, WithMapping, WithHeadings, WithColumnWidths
{
    private $customers;

    public function __construct($customers)
    {
        $this->customers = $customers;
    }

    public function collection()
    {
        return $this->customers;
    }

    public function headings(): array
    {
        return [
            'Tên khách hàng',
            'Email',
            'Số điện thoại',
            'Địa chỉ',
            'Tuổi',
            'Giới tính',
            'Nghề nghiệp',
            'Phân loại',
        ];
    }

    public function map($customer) :array
    {
        return [
            $customer->name,
            $customer->email,
            $customer->phone,
            $customer->address,
            $customer->age,
            $customer->gender == 1 ? 'Nam' : 'Nữ',
            $customer->job,
            $customer->customer_type,
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 25,
            'B' => 25,
            'C' => 15,
            'D' => 20,
            'E' => 5,
            'F' => 10,
            'G' => 10,
            'h' => 10,
        ];
    }
}
