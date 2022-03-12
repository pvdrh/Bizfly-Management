<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
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
    public function index()
    {
        $orders = Order::with('customers')->get();
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
        $products = Product::get();
        $customers = Customer::get();
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
    public function store(Request $request)
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
    public function destroy($id)
    {
        try {
            $order = Order::find($id);
            $order->delete();

            Session::flash('success', 'Xóa thành công!');
        } catch (Exception $e) {
            Log::error('Error delete order', [
                'method' => __METHOD__,
                'message' => $e->getMessage(),
                'line' => __LINE__
            ]);

            Session::flash('error', 'Xóa thất bại!');
        }
        return redirect()->route('categories.index');
    }
}
