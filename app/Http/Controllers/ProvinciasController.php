<?php

namespace App\Http\Controllers;

use App\Models\Provincias;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class ProvinciasController extends Controller
{
    /**
     *  @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provincias = Provincias::all();
        return view('provincias.index', compact('provincias'));
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        $errors = $request->validate([
            'codigo' => 'required',
            'detalle' => 'required'
        ]);
        try {

            $values = $request->input();
            date_default_timezone_set('America/Argentina/Buenos_Aires');
            $fechaActual = date('Y-m-d H:i:s');
            $values["created_at"] = $values["updated_at"] = $fechaActual;

            Provincias::create($request->all());
            return redirect()->route('provincias.index');
        } catch (\Throwable $th) {
            return "Se ha producido un error: " . $th->errorInfo["2"];
        }
    }
}
