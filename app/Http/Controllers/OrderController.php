<?php

namespace App\Http\Controllers;

use App\Exports\OrdersExport;
use App\Http\Requests\ImportOrderRequest;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Imports\CustomersImport;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use Illuminate\Support\Facades\Log;
use Exception;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_role = Auth::user()->info->role;
        if ($user_role == UserInfo::ROLE['admin']) {
            $orders = Order::paginate(10);
        } else {
            $user_code = Auth::user()->info->code;
            $customers = Customer::where(['employee_code' => $user_code])->get();
            $customer_id = [];
            foreach ($customers as $customer) {
                $customer_id[] = $customer->_id;
            }
            if ($request->search) {
                $orders = Order::whereIn('customer_id', $customer_id)->where('code', $request->search);
            } else {
                $orders = Order::whereIn('customer_id', $customer_id);
            }
            $orders = $orders->paginate(10);
        }
        return view('orders.index')->with([
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::where('quantity', '>', 0)->get();
        $user_code = Auth::user()->info->code;
        $customers = Customer::where(['employee_code' => $user_code])->get();
        return view('orders.create')->with([
            'products' => $products,
            'customers' => $customers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        try {
            $order = new Order();

            $order->code = 'DH' . rand(1000, 9999);
            $order->status = Order::STATUS['pending'];
            $order->note = $request->note;
            $order->customer_id = $request->customer_id;
            $order->product_id = $request->product_id;
            $product_ids = $request->product_id;
            $products = Product::whereIn('_id', $product_ids)->get();
            $total = 0;
            foreach ($products as $product) {
                $total += $product->price;
                $product->total_sold += 1;
                $product->quantity -= 1;
                $product->save();
            }
            $order->total = $total;
            $order->save();

            Session::flash('success', 'Tạo mới thành công!');
        } catch (Exception $e) {
            Log::error('Error store order', [
                'method' => __METHOD__,
                'message' => $e->getMessage(),
                'line' => __LINE__
            ]);

            Session::flash('error', 'Tạo mới thất bại!');
        }

        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        return view('orders.edit')->with([
            'order' => $order
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function acceptOrder($id)
    {
        try {
            $order = Order::find($id);
            $order->status = Order::STATUS['approved'];
            $order->save();

            Session::flash('success', 'Duyệt đơn thành công!');
        } catch (Exception $e) {
            Log::error('Error accept order', [
                'method' => __METHOD__,
                'message' => $e->getMessage(),
                'line' => __LINE__
            ]);

            Session::flash('error', 'Duyệt đơn thất bại!');
        }
        return redirect()->route('orders.index');
    }

    public function cancelOrder($id)
    {
        try {
            $order = Order::find($id);
            $order->status = Order::STATUS['canceled'];
            $product_ids = $order->product_id;
            $products = Product::whereIn('_id', $product_ids)->get();
            foreach ($products as $product) {
                $product->total_sold -= 1;
                $product->quantity += 1;
                $product->save();
            }
            $order->save();

            Session::flash('success', 'Hủy đơn thành công!');
        } catch (Exception $e) {
            Log::error('Error cancel order', [
                'method' => __METHOD__,
                'message' => $e->getMessage(),
                'line' => __LINE__
            ]);

            Session::flash('error', 'Hủy thất bại!');
        }
        return redirect()->route('orders.index');
    }

    public function returnOrder($id)
    {
        try {
            $order = Order::find($id);
            $order->status = Order::STATUS['return'];
            $product_ids = $order->product_id;
            $products = Product::whereIn('_id', $product_ids)->get();
            foreach ($products as $product) {
                $product->total_sold -= 1;
                $product->quantity += 1;
                $product->save();
            }
            $order->save();

            Session::flash('success', 'Hoàn đơn thành công!');
        } catch (Exception $e) {
            Log::error('Error return order', [
                'method' => __METHOD__,
                'message' => $e->getMessage(),
                'line' => __LINE__
            ]);

            Session::flash('error', 'Duyệt đơn thất bại!');
        }
        return redirect()->route('orders.index');
    }

    public function exportExcel()
    {
        $user_code = Auth::user()->info->code;
        $customers = Customer::where(['employee_code' => $user_code])->get();
        $customer_id = [];
        foreach ($customers as $customer) {
            $customer_id[] = $customer->_id;
        }
        $orders = Order::whereIn('customer_id', $customer_id)->get();

        return Excel::download(new OrdersExport($orders), 'Danh sách đơn hàng.xlsx');
    }

    public function getListOrder(Request $request, $id)
    {
        $orders = Order::where('customer_id', $id)->get();

        return view('orders.index')->with([
            'orders' => $orders
        ]);
    }

    public function importExcel(ImportOrderRequest $request)
    {
        try {
            $orders = Excel::toArray(new CustomersImport(), $request->file('file'));
            $orders = $orders[0];
            if (count($orders)) {
                foreach ($orders as $key => $order) {
                    $oldOrder = Order::where('code', $order[0])->count();
                    if ($oldOrder == 0) {
                        if (strlen($order[3]) > 0) {
                            $customer = Customer::find($order[3]);
                            if ($customer) {
                                $newOrder = new Order();
                                if (strlen($order[0]) < 6) {
                                    $newOrder->code = 'DH' . rand(1000, 9999);
                                } else {
                                    $newOrder->code = $order[0];
                                }
                                $newOrder->status = $order[1];
                                $newOrder->note = $order[2];
                                $newOrder->customer_id = $order[3];
                                $newOrder->total = $order[4];
                                $newOrder->save();

                                Session::flash('success', 'Thêm mới thành công!');
                            } else {
                                Session::flash('error', 'Mã khách hàng không tồn tại!');
                            }
                        } else {
                            Session::flash('error', 'Mã khách hàng không được để trống!');
                        }
                    } else {
                        Session::flash('error', 'Mã đơn hàng đã tồn tại!');
                    }
                }
            }
        } catch (Exception $e) {
            Log::error('Error import order from file excel', [
                'method' => __METHOD__,
                'message' => $e->getMessage(),
                'line' => __LINE__
            ]);

            Session::flash('error', 'Thêm mới thất bại!');
        }

        return redirect()->route('orders.index');
    }
}
