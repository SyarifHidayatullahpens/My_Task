<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Departement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = User::all();
        return view('admin.user.index_user', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create_user');
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
            'first_name'    => 'required|string|max:50',
            'last_name'    => 'required|string|max:50',
            'username'     => 'required',
            'email'        => 'required',
            'company_id'   => 'required',
            'departement'  =>  'required',
            'role'         =>  'required',
        ]);
        $data = $request->all();
        $users  = User::create($data);
        if($users) {
            return redirect()->route('user.index')->with('success','Item created successfully!');
        }else{
            return redirect()->route('user.index')->with('error','You have no permission for this page!');
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
        $data = User::findOrFail($id);
        $cek = Departement::all();
        $check = Company::all();
        return view('admin.user.edit_user',compact('data','cek','check'));
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
            'first_name'    => 'required||string|max:50',
            'last_name'    => 'required||string|max:50',
            'username'     => 'required|string',
            'email'        => 'required|',
            'password'     => 'required',
            'company_id'   => 'required',
            'departement'  =>  'required',
            'role'         =>  'required',
        ]);

        $users = User::findOrFail($id);
        $data = $request->all();
        $users->update($data);
        if($users){
         return redirect()->route('user.index')->with('info','You added new items');
         }else{
             return redirect()->route('user.index')->with('error','You have no permission for this page!');
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $employee)
    {
        User::destroy($employee);
        return redirect()->route('user.index')->with('success','Deleted successfully');
    }
}
