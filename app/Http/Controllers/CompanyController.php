<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateCompanyRequest;
use App\Http\Requests\StoreCompanyRequest;
use Session;
use Illuminate\Support\Facades\Log;
use Exception;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Company::query();
        if ($request->has('search') && strlen($request->input('search')) > 0) {
            $query->where('name', 'LIKE', "%" . $request->input('search') . "%");
        }
        $companies = $query->paginate(10);
        return view('companies.index')->with([
            'companies' => $companies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        try {
            $company = new Company();

            $company->name = $request->name;
            $company->phone = $request->phone;
            $company->address = $request->address;
            $company->save();

            Session::flash('success', 'Tạo mới thành công!');
        } catch (Exception $e) {
            Log::error('Error store company', [
                'method' => __METHOD__,
                'message' => $e->getMessage(),
                'line' => __LINE__
            ]);

            Session::flash('error', 'Tạo mới thất bại!');
        }

        return redirect()->route('companies.index');
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
        $company = Company::find($id);
        return view('companies.edit')->with('company', $company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, $id)
    {
        try {
            $company = Company::find($id);
            $company->name = $request->name;
            $company->phone = $request->phone;
            $company->address = $request->address;
            $company->save();

            Session::flash('success', 'Cập nhật thành công!');
        } catch (Exception $e) {
            Log::error('Error update company', [
                'method' => __METHOD__,
                'message' => $e->getMessage(),
                'line' => __LINE__
            ]);

            Session::flash('error', 'Cập nhật thất bại!');
        }

        return redirect()->route('companies.index');
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
            $company = Company::find($id);
            $company->delete();
            Session::flash('success', 'Xóa thành công!');
        } catch (Exception $e) {
            Log::error('Error delete company', [
                'method' => __METHOD__,
                'message' => $e->getMessage(),
                'line' => __LINE__
            ]);

            Session::flash('error', 'Xóa thất bại!');
        }
        return redirect()->route('companies.index');
    }
}
