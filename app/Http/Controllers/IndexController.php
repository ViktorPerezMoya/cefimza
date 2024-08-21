<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dato;
use App\Models\Seccion;
use App\Models\Integrante;
use App\Models\Parametro;
use App\Models\Nota;

class IndexController extends Controller
{
    public function index(){
        $data['is_home'] = true;
        $data['seccionesmenu'] = Seccion::where('orden_menu','>',0)->where('in_menu',1)->orderBy('orden_home','asc')->get();
        $data['secciones'] = Seccion::with('tarjetas')->with('datos')->where('orden_home','>',0)->where('in_home',1)->orderBy('orden_home','asc')->get();
        $data['equipo'] = Integrante::all();
        $data['mapa'] = Parametro::where('tipo','mapa')->first();
        $data['parametros'] = Parametro::whereIn('tipo',['redsocial','link','texto'])->get();
        //dd($data);
        return view('index',$data);
    }

    public function informes(Request $request){
        $data['seccionesmenu'] = Seccion::where('orden_menu','>',0)->where('in_menu',1)->orderBy('orden_home','asc')->get();
        $data['seccion'] = Seccion::find(10);
        $notas = Nota::where('seccion_id',10)
        ->select('id','titulo','url','imagen','autor','fecha','resumen')
        ->paginate(3);
        $data['notas'] = $notas;

        $data['parametros'] = Parametro::whereIn('tipo',['redsocial','link','texto'])->get();

        return view('informes-listado',$data);
    }

    public function informe(Request $request,$url){
        $data['seccionesmenu'] = Seccion::where('orden_menu','>',0)->where('in_menu',1)->orderBy('orden_home','asc')->get();
        $data['informe'] = Nota::where('url',$url)->where('visible',true)->first();
        if(empty($data['informe'])) abort(404);
        $data['parametros'] = Parametro::whereIn('tipo',['redsocial','link','texto'])->get();

        return view('informe',$data);
    }
}
