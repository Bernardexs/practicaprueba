<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categoria=Categoria::all();
        $productos=DB::table('productos')
        ->join('categorias','productos.categoria_id','=','categorias.id')
        ->where('productos.estado',1)
        ->where('categorias.nombre','LIKE','%'.$request->buscar.'%')
        ->select('productos.id','productos.nombre','productos.fechaVencimiento','productos.precio','productos.stock','categorias.nombre as categoria')
        ->get();
        return view('index',compact('categoria'),compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function vender(Producto $producto)
    {
        return view('venta',compact('producto'));
    }
    public function vendido(Request $request,Producto $producto){
        if($producto->stock>=$request->vendido&&$producto->stock!==0){
        $producto->stock-=$request->vendido;
        $producto->total=$producto->precio*$request->vendido;
        $producto->fechaCompra=Carbon::parse('now');
    $producto->save();

    return redirect()->route('index')->with('success','venta realizada con exito ');
        }
        return redirect()->route('index')->with('fail','No hay suficiente '.$producto->nombre.' en existencia');


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Producto::create($request->all());

        return redirect()->route('index')->with('sucess','Guardado exitoso');
    }
    public function ventaFecha(){
        $ventas = Producto::all()->groupBy('fechaCompra');

        foreach ($ventas as $fecha => $ventasPorFecha) {
            $total = $ventasPorFecha->sum('total');
            $ventas[$fecha] = $total;

        }
        return view('totalporfecha',compact('ventas'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $producto->estado=false;
        $producto->save();
        return redirect()->route('index');
    }
}
