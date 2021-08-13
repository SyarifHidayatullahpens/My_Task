<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Departement;
use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();
        if ($user->role == 'admin'){
            $datas      = User::all();  
            $companyCount    = Company::count();
            $departementCount = Departement::count();
            $employeeCount  = User::count();

            return view('admin.user.index_user', compact(
                'datas','companyCount','departementCount','employeeCount',
            ));
        }
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $companys = Company::select('id','nama')->get();
        $departements = Departement::select('id','name')->get();
        return view('admin.user.create_user',compact('companys','departements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'phone' => ['required', 'numeric', 'digits_between:10,12'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'company_id' => ['required', 'not_in:0'],
            'departement_id' => ['required', 'not_in:0'],
        ]);

        $user['password'] = hash::make($request->password);

        User::create($user);
        if($user) {
            return redirect()->route('user.index')->with('success','Data created successfully!');
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
        $data = User::findOrFail($id);
        return view('admin.user.show_user',compact('data'));
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
        $companys = Company::select('id','nama')->get();
        $departements = Departement::select('id','name')->get();

        return view('admin.user.edit_user',compact('data','companys','departements'));
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

        $user = $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'phone' => ['required', 'numeric', 'digits_between:10,12'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'company_id' => ['required', 'not_in:0'],
            'departement_id' => ['required', 'not_in:0'],
        ]);

        $user['password'] = hash::make($request->password);

        $employee = User::findOrFail($id);
        $employee->update($user);
        if($user){
         return redirect()->route('user.index')->with('info','You added new data');
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
    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect()->route('user.index')->with('success','Deleted data successfully');
    }
}
