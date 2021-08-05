<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departement;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $datas = Departement::all();
       return view ('admin.departement.index_departement', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.departement.index_departement');
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
            'name'    => 'required',
            'description' => 'required',
        ]);
        $data   = $request->all();
        $depart  = Departement::create($data);
        if($depart) {
            return redirect()->route('departement.index_departement')->with('success','Item created successfully!');
        }else{
            return redirect()->route('departement.index_departements')->with('error','You have no permission for this page!');
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
       $data = Departement::findOrFail($id);
       return view ('admin.departement.show_departement',compact('data'));
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
            'name' => 'required',
            'description'   => 'required',
        ]);

        $depart = Departement::findOrFail($id);
        $data = $request->all();
        $depart->update($data);
        if($depart){
         return redirect()->route('admin.departement.index_departement')->with('info','You added new items');
         }else{
             return redirect()->route('admin.departement.index_departement')->with('error','You have no permission for this page!');
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
       return redirect('admin.departement.index_departement')->redirect('success','Book  Type deleted successfully');

    }
}
