<?php

namespace App\DB;

use App\Models\company;
use Illuminate\Support\Facades\DB;


class CompanyDB
{
    public function get()
    {
        try {
            //code...
            $company = company::paginate(5);
            // $company = DB::table('companies')->paginate(10);
            // dd($company);
            return $company;

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getById()
    {
        try {
            //code...
            $company = company::where('id', request()->id)->get();
            // $company = DB::table('companies')->paginate(10);
            // dd($company);
            return $company;

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
            $company = new company;
 
            $company->name = request()->nama;
            $company->email = request()->email;
            $company->website = request()->website;
    
            $filenameWithExt = request()->logo->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = request()->logo->getClientOriginalExtension();
            $urlpath = request()->logo->storeAs(
                'company',
                request()->nama."-logo.$extension",
            );

            $company->url_logo = $urlpath;
            
            $company->save();
            return redirect('/companies')->with('success','Data berhasil diubah'); 
            
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update()
    {
        try {
            $company = company::find(request()->id);
 
            // $company->id = request()->id;
            $company->name = request()->nama;
            $company->email = request()->email;
            $company->website = request()->website;
            if (!request()->url_logo) {
                # code...
                $filenameWithExt = request()->logo->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = request()->logo->getClientOriginalExtension();
                $urlpath = request()->logo->storeAs(
                    'company',
                    request()->nama."-logo.$extension",
                );
            }else {
                # code...
                $urlpath = request()->url_logo;
            }
    

            $company->url_logo = $urlpath;
            
            $company->save();
            return redirect('/companies')->with('success','Data berhasil ditambahkan'); 
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete()
    {
        try {
            //code...
            $id = request()->id;
            company::destroy($id);
            return redirect('/companies')->with('success','Data berhasil dihapus'); 

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}