<?php

namespace App\Http\Controllers;

use App\Exports\CustomersExport;
use App\Models\Company;
use App\Models\Customer;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Log;
use Exception;
use Maatwebsite\Excel\Facades\Excel;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->_id;
        $customers = Customer::get();
        return view('customers.index')->with([
            'customers' => $customers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::get();
        $users = User::with('info')->get();
        return view('customers.create')->with([
            'companies' => $companies,
            'users' => $users
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
            $customer = new Customer();

            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->age = (int)$request->age;
            $customer->job = $request->job;
            $customer->address = $request->address;
            $customer->gender = $request->gender;
            $customer->customer_type = $request->customer_type;
            $customer->company_id = $request->company_id;
            $customer->employee_id = $request->employee_id;
            $customer->save();

            Session::flash('success', 'Tạo mới thành công!');
        } catch (Exception $e) {
            Log::error('Error store customer', [
                'method' => __METHOD__,
                'message' => $e->getMessage(),
                'line' => __LINE__
            ]);

            Session::flash('error', 'Tạo mới thất bại!');
        }

        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);
        $customer_employees = $customer->employee_id;
        $users = User::whereIn('_id', $customer_employees)->get();
        $company = Company::find($customer->company_id);
        return view('customers.show')->with([
            'customer' => $customer,
            'company' => $company,
            'users' => $users
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        $customer_employees = $customer->employee_id;
        $users = User::whereIn('_id', $customer_employees)->get();
        $company = Company::find($customer->company_id);
        return view('customers.edit')->with([
            'customer' => $customer,
            'company' => $company,
            'users' => $users
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
        try {
            $customer = Customer::find($id);

            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->age = (int)$request->age;
            $customer->job = $request->job;
            $customer->address = $request->address;
            $customer->gender = $request->gender;
            $customer->customer_type = $request->customer_type;
            $customer->company_id = $request->company_id;
            $customer->employee_id = $request->employee_id;
            $customer->save();

            Session::flash('success', 'Cập nhật thành công!');
        } catch (Exception $e) {
            Log::error('Error update customer', [
                'method' => __METHOD__,
                'message' => $e->getMessage(),
                'line' => __LINE__
            ]);

            Session::flash('error', 'Cập nhật thất bại!');
        }

        return redirect()->route('customers.index');
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
            $customer = Customer::find($id);
            $customer->delete();

            Session::flash('success', 'Xóa thành công!');
        } catch (Exception $e) {
            Log::error('Error delete customer', [
                'method' => __METHOD__,
                'message' => $e->getMessage(),
                'line' => __LINE__
            ]);

            Session::flash('error', 'Xóa thất bại!');
        }
        return redirect()->route('customers.index');
    }

    public function exportExcel(){
        $customers = Customer::get();
        return Excel::download(new CustomersExport($customers), 'customers.xlsx');
    }
}
