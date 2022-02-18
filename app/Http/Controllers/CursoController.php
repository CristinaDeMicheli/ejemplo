<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

class CursoController extends Controller
{

   function __construct()
   {
    $this->middleware('permission:ver-curso | crear-curso | editar-curso | borrar-curso')->only=>('index');
    $this->middleware('permission:crear-curso', ['only'=>['create','store']]);
    $this->middleware('permission: editar-curso', ['only'=>['edit','update']]);
    $this->middleware('borrar-curso', ['only'=>['destroy']]);
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Con paginación
         $cursos = Curso::paginate(5);
         return view('cursos.index',compact('cursos'));
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
        return view('cursos.crear');
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
           'titulo'=> 'required', 
           'descripcion'=> 'required', 
        ]);  
        Curso::create($request->all());
    
        return redirect()->route('cursos.index');

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
        return view('cursos.editar',compact('curso'));
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
           'titulo'=> 'required', 
           'descripcion'=> 'required',,
        ]);
    
        $curso->update($request->all());
    
        return redirect()->route('cursos.index');

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
         $curso->delete();
    
        return redirect()->route('cursos.index');
    }
}
