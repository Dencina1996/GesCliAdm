<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if($request->has('filtro')){
            $filtro=$request->input('filtro');
            $clientes=DB::table('clientes')
                            ->select('id', 'Nombre', 'Localidad', 'cif/nif')
                            ->where('nombre','LIKE',"%".$request->input('filtro')."%")
                            ->orwhere('localidad','LIKE',"%".$request->input('filtro')."%")
                            ->orwhere('cif/nif','LIKE',"%".$request->input('filtro')."%")
                            ->paginate(10)
                            ->appends('filtro',$filtro);
            return $clientes;
        }else{
        $filtro=null;
        $clientes = DB::table('clientes')
                ->select('id', 'Nombre', 'Localidad', 'cif/nif')
                ->paginate(10);            
                return json_encode($clientes);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
