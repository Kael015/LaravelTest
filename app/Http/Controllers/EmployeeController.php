<?php

namespace App\Http\Controllers;

use App\DB\EmployeeDB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Imports\EmployeeImport;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    private $EmployeeDB;

    public function __construct(EmployeeDB $EmployeeDB)
    {
        $this->EmployeeDB = $EmployeeDB;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $response = $this->EmployeeDB->get();
        // dd($response);

        return view(
            'employee',[
            'employees'=>$response,
        ]);
    }

    public function companyList(Request $request)
    {
        //
        // dd($results);
        if ($request->ajax()) {
            $page = $request->page;
            $resultCount = 5;

            $offset = ($page - 1) * $resultCount;

            $employee = $this->EmployeeDB->getCompanyList($offset, $resultCount);

            $count = $this->EmployeeDB->getTotalCompanyList();
            $endCount = $offset + $resultCount;
            // dd($count);
            if ($endCount > $count) {
                $more = false;
            } else {
                $more = true;
            }
            

            $results = array(
            "results" => $employee,
            "pagination" => array(
                "more" => $more
            )
            );

            return response()->json($results);
        }
        // $response = $this->EmployeeDB->getCompanyList();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('employee_insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'company' => 'required',
        ],
        [
            'nama.required' => 'Name is required',
            'email.required' => 'Email is required',
            'company.required' => 'Company is required',
            
        ]);

        $response = $this->EmployeeDB->insert();
        return redirect('/employee')->with('success','Data berhasil diubah'); 

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        $response = $this->EmployeeDB->getById();
        // dd($response);

        return view(
            'employee_edit',[
            // 'Role' => $Hasils->Role,
            'employees'=>$response[0],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        if ($request->nama && $request->email && $request->company) {
            $response = $this->EmployeeDB->update();
            return redirect('/employees')->with('success','Data berhasil diubah'); 
        } else {
            $request->validate([
                'nama' => 'required',
                'email' => 'required',
                'company' => 'required',
            ],
            [
                'nama.required' => 'Name is required',
                'email.required' => 'Email is required',
                'company.required' => 'Company is required',
                
            ]);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
    }

    public function importData(Request $request)
    {
        //
        Excel::import(new EmployeeImport, request()->file('file'));
        return back();
    }
}
