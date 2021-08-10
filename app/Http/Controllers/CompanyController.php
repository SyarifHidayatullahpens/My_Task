<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

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
            'nama' => 'required|string|min:5',
            'email' => 'required|email',
            'logo' => 'required|file|image|mimes:png,jpg,jpeg|max:2048|dimensions:min_width=100,min_height=100',
            'website_url' => 'required',
        ]);

        $logo = $request->file('logo');
        $logo->storeAs('public/path', $logo->hashName());

        $data = Company::create([
            'nama'          => $request->nama,
            'email'         => $request->email,
            'logo'          => $logo->hashName(),
            'website_url'   => $request->website_url,
        ]);

        if($data) {
            return redirect()->route('company.index')->with('success','Data created successfully!');
        }else{
            return redirect()->route('company.index')->with('error','You have no permission for this page!');
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
            'nama' => 'required|string|min:5',
            'email' => 'required|email',
            'logo' => 'required|file|image|mimes:png,jpg,jpeg|max:2048|dimensions:min_width=100,min_height=100',
            'website_url' => 'required',
        ]);
        $company = Company::findOrFail($id);

        if($request->file('logo') == "") 
        {
            $company->update([
                'nama'           => $request->nama,
                'email'          => $request->email,
                'website_url'    => $request->website_url,
            ]);
    
        } else {
            Storage::disk('local')->delete('public/path/'.$company->image);
    
            //upload new image
            $logo = $request->file('logo');
            $logo->storeAs('public/path', $logo->hashName());
    
            $company->update([
                'nama'           => $request->nama,
                'email'          => $request->email,
                'logo'           => $logo->hashName(),
                'website_url'    => $request->website_url,
                
            ]);
        }
        if($company) {
            return redirect()->route('company.index')->with('success','Item created successfully!');
        }else{
            return redirect()->route('company.index')->with('error','You have no permission for this page!');
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
        return redirect()->route('company.index')->with('success','Deleted successfully');
    }
}
