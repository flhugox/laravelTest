<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\numeros;

class NumeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $numeros = numeros::all();
        return view('numeros')->with('numeros', $numeros);
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
        $this->validate($request,[
                'number1'=>'required',
                'number2'=>'required',
                'number3'=>'required'
        ]);
        numeros::create([
            'numeros'=>$request->get('number1'),
            'numeros_2'=>$request->get('number2'),
            'numeros_3'=>$request->get('number3')
        ]);

        return back()->with('mensaje','Se Agrego Correctamente');
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

    public function importar(Request $request){
        $this->validate($request,[
            'documento'=>'required'
    ]);
        if($request->hasFile('documento')){
            $path = $request->file('documento')->getRealPath();
            $datos = Excel::load($path, function($reader){
            })->get();

            if(!empty($datos) && $datos->count()){
                 $datos = $datos->toArray();
                 for($i=0; $i< count($datos); $i++){
                    if(is_numeric($datos[$i])) {
                        
                        print_r($datos[$i]);
                    }
                    $datosImportar[] = $datos[$i];
                  
                 }
            }

            numeros::insert($datosImportar);
        }

        return back();
    }


    public function guardarNumeros(Request $request){
       
            $path = $request->file('documento')->getRealPath();
            $datos = Excel::load($path, function($reader){
            })->get();

            if(!empty($datos) && $datos->count()){
                 $datos = $datos->toArray();
                 for($i=0; $i< count($datos); $i++){
                    if(is_numeric($datos[$i])) {
                        
                        print_r($datos[$i]);
                    }
                    $datosImportar[] = $datos[$i];
                  
                 }
            }

            numeros::insert($datosImportar);
        

        return back();
    }



    public function exportar(){

        $numeros = numeros::all();
        
        Excel::create('numeros', function($excel) use ($numeros){
            $excel->sheet('Exportar', function($sheet) use ($numeros){
                $sheet->fromArray($numeros);
            });
        })->export('xls');
    }
}
