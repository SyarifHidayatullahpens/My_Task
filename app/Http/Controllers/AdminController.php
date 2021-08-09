<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Departement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $companys = Company::count();
        $departements = Departement::count();
        $users = User::count();
        return view('admin.home', compact('user','companys','departements','users'));


    }
    
}
