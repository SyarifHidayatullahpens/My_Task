<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $datas = DB::table('users')->join('companys','company_id','=','companys_id')
                 ->join('departements','departement_id','=','departements_id')
                 ->select('companys.nama','departements.name')->get();
        return view('user.home', compact('user'));
    } 

}
