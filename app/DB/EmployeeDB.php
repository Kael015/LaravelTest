<?php

namespace App\DB;

use App\Models\employee;
use App\Models\company;
use Illuminate\Support\Facades\DB;


class EmployeeDB
{
    public function get()
    {
        try {
            //code...
            $employee = DB::table('employees')
            ->select('employees.*','companies.name as company')
            ->join('companies', 'employees.companies_id', '=', 'companies.id')
            ->paginate(5);;
            // $employee = DB::table('companies')->paginate(10);
            // dd($employee);
            return $employee;

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getCompanyList($offset, $resultCount)
    {
        try {
            //code...
            $companyList = company::where('name', 'LIKE',  '%' . request()->term. '%')->orderBy('name')->skip($offset)->take($resultCount)->get(['id',DB::raw('name as text')]);
            return $companyList;

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getTotalCompanyList()
    {
        try {
            //code...
            $totalCompanyList = company::count();
            return $totalCompanyList;

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getById()
    {
        try {
            //code...
            $employee = $employee = DB::table('employees')
            ->select('employees.*','companies.name as company')
            ->join('companies', 'employees.companies_id', '=', 'companies.id')
            ->get();
            // $employee = DB::table('companies')->paginate(10);
            // dd($employee);
            return $employee;

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function search()
    {
        try {
            //code...
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function insert()
    {
        try {
            //code...
            $employee = new employee;
 
            $employee->name = request()->nama;
            $employee->email = request()->email;
            $employee->companies_id  = request()->company;
            
            $employee->save();
            
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update()
    {
        try {
            $employee = employee::find(request()->id);
            // dd($employee);

            // $employee->id = request()->id;
            $employee->name = request()->nama;
            $employee->email = request()->email;
            $employee->companies_id = request()->company;
            
            $employee->save();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete()
    {
        try {
            //code...
            $id = request()->id;
            employee::destroy($id);
            return redirect('/companies')->with('success','Data berhasil dihapus'); 

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}