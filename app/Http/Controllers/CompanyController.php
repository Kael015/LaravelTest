<?php

namespace App\Http\Controllers;

use App\DB\CompanyDB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    private $CompanyDB;

    public function __construct(CompanyDB $CompanyDB)
    {
        $this->CompanyDB = $CompanyDB;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $response = $this->CompanyDB->get();
        // dd($response);

        return view(
            'company',[
            'companies'=>$response,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('company_insert');
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
            'website' => 'required',
            'logo' => 'required|image|mimes:png|max:2048|dimensions:min_width=100,min_height=100,',
        ],
        [
            'nama.required' => 'Name is required',
            'email.required' => 'Email is required',
            'website.required' => 'Website is required', 
            'logo.required' => 'Logo is required', 
            'logo.mimes' => 'File type not accepted,Only accept PNG', 
            'logo.max' => 'File too big', 
            'logo.dimensions' => 'Dimensions too small', 
            
        ]);
        
        $response = $this->CompanyDB->insert();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        $response = $this->CompanyDB->getById();
        // dd($response);

        return view(
            'company_edit',[
            // 'Role' => $Hasils->Role,
            'companies'=>$response[0],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        // dd($request->nama, $request->email, $request->website, $request->url_logo, $request->id);
        if ($request->nama && $request->email && $request->website && $request->url_logo && $request->id ) {
            # code...
            // echo "save";
            $response = $this->CompanyDB->update();
            return redirect('/companies')->with('success','Data berhasil diubah'); 
        } else {
            $request->validate([
                'nama' => 'required',
                'email' => 'required',
                'website' => 'required',
                'logo' => 'required|image|mimes:png|max:2048|dimensions:min_width=100,min_height=100,',
            ],
            [
                'nama.required' => 'Name is required',
                'email.required' => 'Email is required',
                'website.required' => 'Website is required', 
                'logo.required' => 'Logo is required', 
                'logo.mimes' => 'File type not accepted,Only accept PNG', 
                'logo.max' => 'File too big', 
                'logo.dimensions' => 'Dimensions too small', 
                
            ]);
            $response = $this->CompanyDB->update();
            return redirect('/companies')->with('success','Data berhasil diubah'); 
            # code...
        }
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $response = $this->CompanyDB->delete();
        return redirect('/companies')->with('success','Data berhasil diubah'); 
    }
}
