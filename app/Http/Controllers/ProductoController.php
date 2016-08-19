<?php

namespace App\Http\Controllers;

use App\Core\Categoria\CategoriaRepository;
use App\Core\Marca\MarcaRepository;
use App\Core\Modelo\ModeloRepository;
use App\Core\Producto\Producto;
use App\Core\Producto\ProductoRepository;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ProductoController extends Controller
{
    protected $repoMarca;
    protected $repoCategoria;
    protected $repoModelo;
    protected $repoProducto;

    public function __construct(MarcaRepository $marca, CategoriaRepository $categoria, ProductoRepository $producto)
    {
        $this->repoMarca = $marca;
        $this->repoCategoria = $categoria;
        $this->repoModelo = new ModeloRepository();
        $this->repoProducto = $producto;
    }

    public function index()
    {
        $marcas = $this->repoMarca->all();
        $categorias = $this->repoCategoria->all();
        $modelos = $this->repoModelo->all();
        $productos = $this->repoProducto->all();
        return View('sales.mantenimientos.productos', compact('productos', 'marcas', 'categorias', 'modelos'));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $marcas = $this->repoMarca->all();
        $categorias = $this->repoCategoria->all();
        $modelos = $this->repoModelo->all();
        $productos = $this->repoProducto->all();
        $editarProducto = $this->repoProducto->find($id);
        return View('sales.mantenimientos.editarproducto', compact('productos', 'marcas', 'categorias', 'modelos', 'editarProducto'));
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
        $actualizarProducto = $request->all();
        $producto = $this->repoProducto->updated($id, $actualizarProducto);
        return redirect()->action('ProductoController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eliminarProducto = $this->repoProducto->deleted($id);
        return redirect()->action('ProductoController@index');
    }

    public function buscarProducto(Request $request)
    {
        $marcas = $this->repoMarca->all();
        $categorias = $this->repoCategoria->all();
        $modelos = $this->repoModelo->all();
        //buscar Producto
        $variables = $request->all();
        $productos = $this->repoProducto->buscarProducto($variables);
        return View('sales.mantenimientos.productos', compact('productos', 'marcas', 'categorias', 'modelos'));
    }

}
