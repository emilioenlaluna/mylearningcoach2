<?php

namespace App\Http\Controllers\Maestro\Cursos;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class MaestroLeccionesController extends Controller
{

    public function leccion($id)
    {
        $hijos = DB::table('leccion')
            ->select('leccion.NombreLeccion','leccion.FechaLeccion', 'leccion.Detalles', 'leccion.idLeccion')
            ->where('leccion.Curso_idCurso', '=', $id)
            ->get();
        $viewData = [];
        $viewData["title"] = "Gestionar Lecciones";
        $viewData["lecciones"] = json_decode($hijos, true);
        return view('maestro.lecciones')->with("viewData", $viewData);
    }

    public function guardar(Request $request)
    {
        DB::table('cursos')->insert([
            'NombreCurso' => $request->input('name'),
            'FechaInicio' => $request->input('fechainicio'),
            'FechaFin' => $request->input('fechafin'),
            'Visible' => $request->input('visible'),
            'imagenUrl' => $request->input('url'),
            'Categoria_idCategoria' => $request->input('categoria'),
            'users_id' => Auth::id()
        ]);
        return back();
    }


}
