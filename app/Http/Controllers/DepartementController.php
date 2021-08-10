<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departement;
use Illuminate\Support\Facades\DB;


class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $datas = DB::table('departements')->get();
       return view ('admin.departement.index_departement', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.departement.create_departement');
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
            'name'    => 'required|min:3',
            'description' => 'required',
        ]);
        $data   = $request->all();
        $depart  = Departement::create($data);
        if($depart) {
            return redirect()->route('departement.index')->with('success','Item created successfully!');
        }else{
            return redirect()->route('departement.index')->with('error','You have no permission for this page!');
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
       $data = Departement::findOrFail($id);
        return view('admin.departement.edit_departement',compact('data'));
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
            'name' => 'required|min:3',
            'description'   => 'required',
        ]);

        $depart = Departement::findOrFail($id);
        $data = $request->all();
        $depart->update($data);
        if($depart){
         return redirect()->route('departement.index')->with('info','You added new items');
         }else{
             return redirect()->route('departement.index')->with('error','You have no permission for this page!');
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
       $depart = Departement::findOrFail($id);
       $depart->delete();
       return redirect()->route('departement.index')->with('success','Deleted successfully');

    }

    
}
