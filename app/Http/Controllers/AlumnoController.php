<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;

class AlumnoController extends Controller
{
   
   function __construct()
   {
    $this->middleware('permission:ver-alumno | crear-alumno | editar-alumno | borrar-alumno')->only=>('index');
    $this->middleware('permission:crear-alumno', ['only'=>['create','store']]);
    $this->middleware('permission: editar-alumno', ['only'=>['edit','update']]);
    $this->middleware('borrar-alumno', ['only'=>['destroy']]);
   }
    
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Con paginación
         $alumnos = Alumno::paginate(5);
         return view('alumnos.index',compact('alumnos'));
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
          return view('alumnos.crear');
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
            'dni'=> 'required', 
            'apellidoynombre'=> 'required',
            'matricula'=> 'required',
            'matricula2'=> 'required',
            'correo'=> 'required',
            'numerocontacto'=> 'required',
            'comprobantepago'=> 'required',
        ]);  
        Alumno::create($request->all());
    
        return redirect()->route('alumnos.index');

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
            $alumno = Alumno::find($id);
            dd($alumno);
          return view('alumnos.editar',compact('alumno'));

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
           'dni'=> 'required', 
            'apellidoynombre'=> 'required',
            'matricula'=> 'required',
            'matricula2'=> 'required',
            'correo'=> 'required',
            'numerocontacto'=> 'required',
            'comprobantepago'=> 'required',
        ]);
    
        $alumno->update($request->all());
    
        return redirect()->route('alumnos.index');
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
         $alumno->delete();
    
        return redirect()->route('alumnos.index');
    }
}
