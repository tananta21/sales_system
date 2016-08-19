<?php

namespace App\Http\Controllers;

use App\Core\DetalleVentaProducto\DetalleVentaProducto;
use App\Core\DetalleVentaProducto\DetalleVentaProductoRepository;
use App\Core\Marca\MarcaRepository;
use App\Core\Producto\ProductoRepository;
use App\Core\Venta\VentaRepository;
use App\Http\Requests;
use App\Http\Traits\FormsElements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class VentaController extends Controller
{
    use FormsElements;
    protected $repoMarca;
    protected $repoProducto;
    protected $repoVenta;
    protected $repoDetalleVentaProducto;

    public function __construct(MarcaRepository $marca, ProductoRepository $producto,
                                VentaRepository $repoVenta, DetalleVentaProductoRepository $repoDetalleVentaProducto)
    {
        $this->repoMarca = $marca;
        $this->repoProducto = $producto;
        $this->repoVenta = $repoVenta;
        $this->repoDetalleVentaProducto = $repoDetalleVentaProducto;
    }

    public function index()
    {
        $nro_venta = $this->repoVenta->all()->toArray();
        return View('sales.ventas.ventanueva',compact('nro_venta'));
    }

    //BUSCAR PRODUCTO EN EL MENU DE VENTA
    public function buscarProducto()
    {
        $codigo = Input::get('codigo');
        $productos = $this->repoProducto->buscarEnVentas($codigo);

        if (empty($productos)) {
            return 0;
        } else {
            return response()->json($productos);
        }
    }

    //REGISTRAR NUEVA VENTA
    public function create()
    {
       //recuperar todos los datos que se envian desde la vista de venta nueva
        $id_producto = Input::get('idproducto');
        $cantidad = Input::get('cantidad');
        $precio = Input::get('precio');
        $nro_venta = Input::get('nro_venta');
        $cliente_id = 1;
        $empleado_id = 1;

        //ingresar datos a la tabla ventas
        $venta = $this->repoVenta->addVenta($cliente_id,$empleado_id);

        //convertir datos json para ingresar en array a la tablla detalle ventas

        $id_productos = json_decode(json_encode($id_producto));
        $cantidades = json_decode(json_encode($cantidad));
        $precios = json_decode(json_encode($precio));

        //ingresar datos a la tabla detalle de venta

        for($i=0;  $i<count($id_productos); $i++){
//            dd($id_productos[$i]->value);
            $detalle = $this->repoDetalleVentaProducto->addDetalleVenta($nro_venta,$id_productos[$i]->value, $precios[$i]->value,$cantidades[$i]->value);
        }

        return response()->json();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //    EJEMPLO DE TRAIT
    public function buscarMarca()
    {

        $marca = $this->repoMarca->all()->toArray();
        $combo = $this->createSelect($marca);

        return View('sales.ventas.ventanueva', compact('combo'));
    }

}
