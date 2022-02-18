<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscripcione;

class InscripcioneController extends Controller
{
     function __construct()
   {
    $this->middleware('permission:ver-inscripcione | crear-inscripcione | editar-inscripcione | borrar-inscripcione')->only=>('index');
    $this->middleware('permission:crear-inscripcione', ['only'=>['create','store']]);
    $this->middleware('permission: editar-inscripcione', ['only'=>['edit','update']]);
    $this->middleware('borrar-inscripcione', ['only'=>['destroy']]);
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //Con paginación
         $inscripciones = Inscripcione::paginate(5);
         return view('incripciones.index',compact('inscripciones'));
         //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('inscripciones.crear');
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
        request()->validate([
           'user_id'=> 'required',
            'curso_id'=> 'required',
        ]);  
        Inscripcione::create($request->all());
    
        return redirect()->route('inscripciones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        return view('inscripciones.editar',compact('inscripcione'));
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
        request()->validate([
           'user_id'=> 'required',
            'curso_id'=> 'required',
        ]); 
        $inscripcione->update($request->all());
    
        return redirect()->route('inscripciones.index');
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
          $inscrpcione->delete();
    
        return redirect()->route('inscripciones.index');
    }
}
