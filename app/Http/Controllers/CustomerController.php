<?php

namespace App\Http\Controllers;

use App\Exports\CustomersExport;
use App\Exports\CustomersSampleExport;
use App\Http\Requests\ImportCustomerRequest;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Imports\CustomersImport;
use App\Models\Company;
use App\Models\Customer;
use App\Models\CustomerHistory;
use App\Models\Order;
use App\Models\User;
use App\Models\UserInfo;
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
    public function index(Request $request)
    {
        $cus_name = '';
        if (Auth::user()->info->role == UserInfo::ROLE['admin']) {
            $query = Customer::query();
            if ($request->has('search') && strlen($request->input('search')) > 0) {
                $query->where('name', 'LIKE', "%" . $request->input('search') . "%");
                $cus_name = $request->input('search');
            }
            $customers = $query->paginate(10);
        } else {
            $user_code = Auth::user()->info->code;
            $query = Customer::Where(['employee_code' => $user_code]);
            if ($request->has('search') && strlen($request->input('search')) > 0) {
                $query->where('name', 'LIKE', "%" . $request->input('search') . "%");
            }
            $customers = $query->paginate(10);
        }
        return view('customers.index')->with([
            'customers' => $customers,
            'cus_name' => $cus_name
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
    public function store(StoreCustomerRequest $request)
    {
        try {
            $customer = new Customer();

            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->age = $request->age;
            $customer->job = $request->job;
            $customer->address = $request->address;
            $customer->gender = $request->gender;
            $customer->customer_type = $request->customer_type;
            $customer->company_id = $request->company_id;
            $customer->employee_code = $request->employee_code;
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
        $customer_employees = $customer->employee_code;
        $query = User::query();
        if (is_array($customer_employees)) {
            if ($customer_employees && count($customer_employees) > 0) {
                $query->whereHas('info', function ($qr) use ($customer_employees) {
                    $qr->whereIn('code', $customer_employees);
                });
            }
        } else {
            if ($customer_employees) {
                $query->whereHas('info', function ($qr) use ($customer_employees) {
                    $qr->where(['code' => $customer_employees]);
                });
            }
        }
        $users = $query->get();
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
        $customer_employees = $customer->employee_code;
        $query = User::query();
        if (is_array($customer_employees)) {
            $query->whereHas('info', function ($qr) use ($customer_employees) {
                $qr->whereIn('code', $customer_employees);
            });
        } else {
            $query->whereHas('info', function ($qr) use ($customer_employees) {
                $qr->where(['code' => $customer_employees]);
            });
        }
        $user = $query->get();
        $companies = Company::get();
        $users = User::get();
        return view('customers.edit')->with([
            'customer' => $customer,
            'companies' => $companies,
            'user' => $user,
            'users' => $users,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, $id)
    {
        try {
            $customer = Customer::find($id);

            $customerHistory = new CustomerHistory();
            $customerHistory->customer_id = $customer->_id;
            $customerHistory->name = $customer->name;
            $customerHistory->email = $customer->email;
            $customerHistory->phone = $customer->phone;
            $customerHistory->age = $customer->age;
            $customerHistory->job = $customer->job;
            $customerHistory->address = $customer->address;
            $customerHistory->gender = $customer->gender;
            $customerHistory->customer_type = $customer->customer_type;
            $customerHistory->employee_code = $customer->employee_code;
            $customerHistory->updatedBy = Auth::user()->_id;
            $customerHistory->save();

            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->age = $request->age;
            $customer->job = $request->job;
            $customer->address = $request->address;
            $customer->gender = $request->gender;
            $customer->customer_type = $request->customer_type;
            $customer->company_id = $request->company_id;
            $customer->employee_code = $request->employee_code;
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

    public function exportExcel(Request $request)
    {
        if ($request->ids) {
            $ids = $request->ids;
            $idsArr = explode(",", $ids);
        }
        if (!empty($idsArr)) {
            $customers = Customer::whereIn('_id', $idsArr)->get();
        } else if (Auth::user()->info->role == UserInfo::ROLE['admin']) {
            $customers = Customer::get();
        } else {
            $user_code = Auth::user()->info->code;
            $customers = Customer::Where(['employee_code' => $user_code])->get();
        }
        return Excel::download(new CustomersExport($customers), 'Danh sách khách hàng.xlsx');
    }

    public function importExcel(ImportCustomerRequest $request)
    {
        try {
            $customers = Excel::toArray(new CustomersImport(), $request->file('file'));
            $customers = $customers[0];
            if (count($customers)) {
                foreach ($customers as $key => $customer) {
                    $email = (string)$customer[1];
                    $phone = $customer[2];
                    $emailCus = Customer::where('email', $email)->get();
                    $phoneCus = Customer::where('phone', $phone)->get();
                    if (!(count($emailCus) > 0) || !(count($phoneCus) > 0)) {
                        $newCustomer = new Customer();
                        $newCustomer->name = $customer[0];
                        $newCustomer->email = $customer[1];
                        $newCustomer->phone = $customer[2];
                        $newCustomer->age = $customer[3];
                        $newCustomer->job = $customer[4];
                        $newCustomer->address = $customer[5];
                        $newCustomer->gender = $customer[6];
                        $newCustomer->customer_type = $customer[7];
                        $newCustomer->save();

                        Session::flash('success', 'Thêm mới thành công!');
                    }
                }
            }
        } catch (Exception $e) {
            Log::error('Error import customer from file excel', [
                'method' => __METHOD__,
                'message' => $e->getMessage(),
                'line' => __LINE__
            ]);

            Session::flash('error', 'File excel không đúng định dạng!');
        }

        return redirect()->route('customers.index');
    }

    public function getListOrders(Request $request, $id)
    {
        $customer = Customer::find($id);
        $orders = Order::where('customer_id', $id)->get();
        return view('customers.order')->with([
            'orders' => $orders,
            'customer' => $customer
        ]);
    }

    public function exportExcelSample()
    {
        $file = public_path() . '/template/import_customer_template.xlsx';
        return response()->download($file, 'import_customer_template.xlsx');
    }

    public function deleteAll(Request $request)
    {
        try {
            if ($request->ids) {
                $ids = $request->ids;
                $idsArr = explode(",", $ids);
            }
            if (!empty($idsArr)) {
                Customer::whereIn('_id', $idsArr)->delete();
            } else if (Auth::user()->info->role == UserInfo::ROLE['admin']) {
                Customer::query()->delete();
            } else {
                $user_code = Auth::user()->info->code;
                Customer::where(['employee_code' => $user_code])->delete();
            }

            Session::flash('success', 'Xóa thành công!');
        } catch (Exception $e) {
            Log::error('Error delete all category', [
                'method' => __METHOD__,
                'message' => $e->getMessage(),
                'line' => __LINE__
            ]);

            Session::flash('error', 'Xóa thất bại!');
        }
        return redirect()->route('categories.index');
    }

    public function getHistoryUpdate(Request $request, $id)
    {
        $histories = CustomerHistory::where('customer_id', $id)->with('users')->paginate(10);

        return view('customers.history')->with([
            'histories' => $histories
        ]);
    }
}
