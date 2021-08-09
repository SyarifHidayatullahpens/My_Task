<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Company::all();
        $user = User::all();
        // dd($user);
        return view('admin.company.index_company', compact('datas','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company.create_company');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'logo' => 'required',
            'website_url' => 'required',
        ]);
        $data   = $request->all();
        $company = Company::create($data);
        if($company) {
            return redirect()->route('company.index_company')->with('success','Item created successfully!');
        }else{
            return redirect()->route('company.index_companys')->with('error','You have no permission for this page!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Company::findOrFail($id);
        return view('admin.company.edit_company',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'logo' => 'required',
            'website_url' => 'required',
        ]);
        $company = Company::findOrFail($id);
        $data   = $request->all();
        $company->update($data);
        if($company) {
            return redirect()->route('company.index_company')->with('success','Item created successfully!');
        }else{
            return redirect()->route('company.index_companys')->with('error','You have no permission for this page!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $company = Company::findOrFail($id);
       $company->delete();
       return redirect('admin.company.index_company')->redirect('success','Item  Type deleted successfully');
    }
}
