<?php

namespace App\Http\Controllers;

use App\Core\EstadoCivil\EstadoCivilRepository;
use App\Core\GradoInstruccion\GradoInstruccionRepository;
use App\Core\Ocupacion\OcupacionRepository;
use App\Core\TipoUsuario\TipoUsuarioRepository;
use App\Core\Ubigeo\UbigeoRepository;
use App\Core\User\UserRepository;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

//ESTA CLASE HACE REFERENCIA A LOS USUARIOS DEL SISTEMA
class UserController extends Controller
{
    protected $repoTipoUsuario;
    protected $repoEstadoCivil;
    protected $repoOcupacion;
    protected $repoGradoInstruccion;
    protected $repoUbigeo;
    protected $repoUser;

    public function __construct()
    {
        $this->repoTipoUsuario = new TipoUsuarioRepository();
        $this->repoEstadoCivil = new EstadoCivilRepository();
        $this->repoOcupacion = new OcupacionRepository();
        $this->repoGradoInstruccion = new GradoInstruccionRepository();
        $this->repoUbigeo = new UbigeoRepository();
        $this->repoUser = new UserRepository();
    }

    public function index()
    {
        $tipo_usuario = $this->repoTipoUsuario->all();
        $estado_civil = $this->repoEstadoCivil->all();
        $ocupacion = $this->repoOcupacion->all();
        $grado_instruccion = $this->repoGradoInstruccion->all();
        $ubigeo = $this->repoUbigeo->all();
        $users = $this->repoUser->all();

        return View('sales.mantenimientos.users', compact(
            'tipo_usuario', 'estado_civil', 'ocupacion', 'grado_instruccion', 'ubigeo', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $numero = $this->repoUser->allNroDocumento()->toArray();
        foreach ($numero as $numeros) {
            if (($numeros['nro_documento']) === (Input::get('nrodocumento'))) {
            Input::flash();
                return redirect()->action('UserController@index')->with('mensaje', 'este dni ya existe');
            }
        }

//        dd(Input::all());
        $user = new \App\User;
        $user->tipo_usuario_id = Input::get('tipo_usuario');
        $user->estado_civil_id = Input::get('estado_civil');
        $user->grado_instruccion_id = Input::get('grado_instruccion');
        $user->ocupacion_id = Input::get('ocupacion');
        $user->ubigeo_id = Input::get('ubigeo');
        $user->nro_documento = Input::get('nrodocumento');
        $user->name = input::get('name');
        $user->apellido = input::get('apellido');
        $user->sexo = input::get('sexo');
        $user->telefono = input::get('telefono');
        $user->email = input::get('email');
        $user->password = \Hash::make(input::get('nro_documento'));
        $user->save();
        return redirect()->action('UserController@index');


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
}
