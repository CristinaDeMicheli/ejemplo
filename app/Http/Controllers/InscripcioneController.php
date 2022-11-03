<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscripcione;
use App\Models\User;
use App\Models\Curso;
use Illuminate\Support\Facades\DB;

class InscripcioneController extends Controller
{
     function __construct()
  {
         $this->middleware('permission:ver-inscripcione|crear-inscripcione|editar-inscripcione|borrar-inscripcione', ['only' => ['index']]);
         $this->middleware('permission:crear-inscripcione', ['only' => ['create','store']]);
         $this->middleware('permission:editar-inscripcione', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-inscripcione', ['only' => ['destroy']]);
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
         return view('inscripciones.index',compact('inscripciones'));
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
      //  $usuarios = User::pluck('name','name')->all();
       // $cursos =  Curso::pluck('titulo','titulo')->all();
       
            //$usuarios = DB::table('user')->get();
             //$cursos = DB::table('curso')->get();
        
        $cursos = Curso::all();
         $usuarios = User::all();
        //$usuarios = User::first();
         return view('inscripciones.crear',compact('usuarios','cursos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
       // exit();
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
         $usuarios = User::all();
        $cursos =  Curso::all();
         $inscripcione = Inscripcione::find($id);
        return view('inscripciones.editar',compact('inscripcione','usuarios','cursos'));
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
        $inscripcione = Inscripcione::find($id);
        $inscripcione->user_id= $request->input('user_id');
        $inscripcione->curso_id= $request->input('curso_id');
        $inscripcione->save();
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
        ///
          DB::table("inscripciones")->where('id',$id)->delete();
        return redirect()->route('inscripciones.index'); 
    }
}
