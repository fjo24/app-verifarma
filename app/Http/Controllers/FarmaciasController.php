<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Farmacia;
use Illuminate\Support\Facades\Http;

class FarmaciasController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:farmacias',
            'direccion' => 'required',
            'latitud' => 'required',
            'longitud' => 'required',
        ]);
        Farmacia::create($request->all());
        return response()->json(['mensaje' => 'Farmacia '.$request->nombre.' creada con exito!'], 200);
    }

    public function show($id)
    {
        $farmacia = Farmacia::find($id);
        if ($farmacia) return Farmacia::find($id);
        else return response()->json(['mensaje' => 'Farmacia no encontrada!'], 404);
    }
    
    public function farmacia(Request $request)
    {
        $farmacias = Farmacia::all();
        $menordistance = 9999999;
        foreach ($farmacias as $farmacia) {
            $km = $this->getKm($request, $farmacia);
            if ( ($km < $menordistance) && (!empty($km)) ) {
                $menordistance = $km;
                $cercana = $farmacia;
            }
        }
        if (isset($cercana)) return $cercana;
        else return response()->json(['mensaje' => 'Error al consultar, por favor revise los datos enviados'], 404);
        return $cercana;
    }

    public function getKm($request, $farmacia)
    {
        $data = file_get_contents(
            'https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins='.$request->lat.','.$request->lon.'&destinations='.$farmacia->latitud.','.$farmacia->longitud.'&key='.env('API_KEY_GM')
        );
        $data = json_decode($data, true);
        if(isset($data['rows'][0]['elements'][0]['distance']['value'])) return $data['rows'][0]['elements'][0]['distance']['value']; else return null;
    }

}
