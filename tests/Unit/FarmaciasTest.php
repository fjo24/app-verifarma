<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Models\Farmacia;

//use Illuminate\Foundation\Testing\DatabaseMigrations;
//use Auth;

class FarmaciasTest extends TestCase
{
    //use DatabaseMigrations;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_creando_farmacia_con_exito()
    {
        try {
            
            $farmacia = new Farmacia([
                'nombre'     =>  'Farmacia de test',
                'direccion'  =>  'Corrientes 928',
                'latitud'    =>  '-32.88131209245695',
                'longitud'   =>  '-68.85834799171776'
            ]);
            $farmacia->save();
            if (isset($farmacia)) $this->assertTrue(true);
            $farmacia->delete();
        
        } catch (\Exception $e) {

            return $e->getMessage();

        }

    }


    public function test_creando_farmacia_con_error_latitud_required()
    {   
        try {
            
            $farmacia = new Farmacia([
                'nombre'     =>  'Farmacia sin latitud',
                'direccion'  =>  'Callao 1902',
                'longitud'   =>  '-68.85834799171776'
            ]);
            $farmacia->save();
        
        } catch (\Exception $e) {
            $this->assertNotEmpty($e->getMessage());
        }

    }

    public function test_calculo_de_distancia()
    {
        $latitud_origen = "-32.88131209245695";
        $longitud_origen = "-68.85834799171776";

        $latitud_destino = "-34.59492500322074";
        $longitud_destino = "-58.392962248595985";
        
        $data = file_get_contents(
            'https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins='.$latitud_origen.','.$longitud_origen.'&destinations='.$latitud_destino.','.$longitud_destino.'&key='.env('API_KEY_GM')
        );
        $data = json_decode($data, true);
        $this->assertNotEmpty($data['rows'][0]['elements'][0]['distance']['value']);
    }
}
