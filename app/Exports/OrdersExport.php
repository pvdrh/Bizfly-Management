<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class OrdersExport implements FromCollection, WithMapping, WithHeadings, WithColumnWidths
{
    private $orders;

    public function __construct($orders)
    {
        $this->orders = $orders;
    }

    public function collection()
    {
        return $this->orders;
    }

    public function headings(): array
    {
        return [
            'Mã đơn hàng',
            'Tên khách hàng',
            'Số điện thoại',
            'Địa chỉ',
            'Ghi chú',
            'Thành tiền',
            'Thời gian đặt hàng',
        ];
    }

    public function map($order): array
    {
        return [
            $order->code,
            $order->customers->name,
            $order->customers->phone,
            $order->customers->address,
            $order->note,
            number_format($order->total) .' VND',
            $order->created_at->format('d-m-Y'),
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 15,
            'B' => 25,
            'C' => 15,
            'D' => 25,
            'E' => 15,
            'F' => 15,
            'G' => 15,
        ];
    }
}
