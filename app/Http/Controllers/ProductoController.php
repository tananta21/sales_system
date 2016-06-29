<?php

namespace App\Http\Controllers;

use App\Core\Categoria\CategoriaRepository;
use App\Core\Marca\MarcaRepository;
use App\Core\Modelo\ModeloRepository;
use App\Core\Producto\ProductoRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;

class ProductoController extends Controller
{
    protected $repoMarca;
    protected $repoCategoria;
    protected $repoModelo;
    protected $repoProducto;

    public function __construct(){
        $this->repoMarca = new MarcaRepository();
        $this->repoCategoria = new CategoriaRepository();
        $this->repoModelo = new ModeloRepository();
        $this->repoProducto = new ProductoRepository();
    }

    public function index()
    {
        $marcas = $this->repoMarca->all();
        $categorias = $this->repoCategoria->all();
        $modelos = $this->repoModelo->all();
        $productos = $this->repoProducto->all();
        return View('sales.mantenimientos.productos',compact('productos','marcas','categorias','modelos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inputs = Input::all();
        $productoNuevo = $this->repoProducto->addProducto($inputs);
        return redirect()->action('ProductoController@index');
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
}
