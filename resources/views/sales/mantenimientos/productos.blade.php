<!-- resources/views/auth/register.blade.php -->
@extends('sales.index')
@section('content')

    <a class="btn btn-w-m btn-primary">Registrar Marca</a>
    <a class="btn btn-w-m btn-primary">Registrar Categoria</a>
    <a class="btn btn-w-m btn-primary">Registrar Modelo</a><br/><br/>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">

                    <h3 class="box-title">Lista de Productos</h3><br/><br/>
                    <a class="btn btn-w-m btn-primary "  data-toggle="modal" data-target="#myModal" >Registrar Nuevo Producto</a><br/><br/>
                    <div  id="mielemento" >
                        {!! Form::open(['action'=>'ProductoController@buscarProducto','method' => 'get', 'class' => 'form-horizontal', 'role'=>'form']) !!}
                        <div class="box-body">
                            <div class="form-group" >
                                <div class="col-sm-2">
                                    <input type="text" class="form-control"  placeholder="Codigo Producto" name="codigo" value="<?php if (isset($_GET['codigo'])) echo $_GET['codigo']; ?>">
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control"  placeholder="Nombre Producto" name="nombre" value="<?php if (isset($_GET['nombre'])) echo $_GET['nombre']; ?>"  >
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control" name="marca" >
                                                 <option value="" selected >Seleccione Marca</option>
                                        @foreach($marcas as $marca)
                                             @if($marca->id != 1)
                                                    <option value="{{$marca->id}}" >{{$marca->descripcion}}</option>
                                            @else
                                                    <option value="{{$marca->id}}">{{$marca->descripcion}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-sm-2">
                                    <select class="form-control" name="categoria" >
                                                 <option value="">Seleccionar Categoria</option>
                                        @foreach($categorias as $categoria)

                                            @if($categoria->id != 1)
                                                <option value="{{$categoria->id}}">{{$categoria->descripcion}}</option>
                                            @else
                                                <option value="{{$categoria->id}}">{{$categoria->descripcion}}</option>

                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control" name="modelo" >
                                                <option value="">Seleccionar Modelo</option>
                                        @foreach($modelos as $modelo)
                                            @if($modelo->id!= 1)
                                                <option value="{{$modelo->id}}">{{$modelo->descripcion}}</option>
                                            @else
                                                <option value="{{$modelo->id}}">{{$modelo->descripcion}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="box-footer" style="text-align: center">
                            {{--<input type="reset" class="btn btn-default" id="cancel" value="Cancelar">--}}
                            <a href="/sales/productos" class="btn btn-default">Recargar</a>
                            <button type="submit" class="btn btn-info">Buscar Producto  <i class="fa fa-search"></i></button>
                        </div>
                        {!! Form::close() !!}
                    </div>

                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody >
                        <tr>
                            <th>CODIGO</th>
                            <th>NOMBRE</th>
                            <th>STOCK ACTUAL</th>
                            <th>MARCA</th>
                            <th>CATEGORIA</th>
                            <th>MODELO</th>
                            <th>ESTADO</th>
                            <th>ACCIONES</th>
                        </tr>
                        @foreach($productos as $producto)
                        <tr data-id="{{$producto->id}}">
                            <td>{{$producto->codigo}}</td>
                            <td>{{$producto->nombre}}</td>
                            <td>{{$producto->stock_actual}}</td>
                            <td>{{$producto->marca->descripcion}}</td>
                            <td>{{$producto->categoria->descripcion}}</td>
                            <td>{{$producto->modelo->descripcion}}</td>
                            @if($producto->estado == 1)
                            <td>Activo</td>
                            @else
                            <td>Inactivo</td>
                            @endif
                            <td><a href="/sales/productos/editar/{{$producto->id}}" id="boton"><span class="label label-success">Editar</span> </a>
                                <a href="/sales/productos/eliminar/{{$producto->id}}"><span class="label label-danger"
                                 onclick="return confirm('¿Estas seguro que desea eliminar el Producto {{$producto->nombre}} ?');">Eliminar</span></a>
                            </td>
                        </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    {!! $productos->appends(Request::all())->render() !!}

    {{--modal crear producto--}}
    <div class="container">        <!-- Modal crear -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Registrar Nuevo Producto</h4>
                    </div>
                    <div class="modal-body">

                        {{--formulario crear--}}
                        <div class="box box-primary">

                            {!! Form::open(['action' => 'ProductoController@create','method' => 'post', 'class' => 'form-horizontal', 'role'=>'form']) !!}
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-1 control-label">Codigo</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control"  placeholder="Codigo Producto" name="codigo" required="required" >
                                        </div>
                                        <label for="inputName" class="col-sm-1 control-label">Nombre</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"  placeholder="Nombre Producto" name="nombre" >
                                        </div>
                                    </div>
                                </div>

                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-1 control-label">Marca</label>
                                        <div class="col-sm-3">
                                            <select class="form-control" name="marca" >
                                                @foreach($marcas as $marca)
                                                    @if($marca->id == 1)
                                                    <option value="{{$marca->id}}">Seleccione Marca</option>
                                                    @else
                                                    <option value="{{$marca->id}}">{{$marca->descripcion}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <label for="inputEmail3" class="col-sm-1 control-label">Categoria</label>
                                        <div class="col-sm-3">
                                            <select class="form-control" name="categoria" >
                                                @foreach($categorias as $categoria)
                                                    @if($categoria->id == 1)
                                                    <option value="{{$categoria->id}}">Seleccione Categoria</option>
                                                    @else
                                                    <option value="{{$categoria->id}}">{{$categoria->descripcion}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <label for="inputEmail3" class="col-sm-1 control-label">Modelo</label>
                                        <div class="col-sm-3">
                                            <select class="form-control" name="modelo" >
                                                @foreach($modelos as $modelo)
                                                    @if($modelo->id == 1)
                                                    <option value="{{$modelo->id}}">Seleccione Modelo</option>
                                                    @else
                                                    <option value="{{$modelo->id}}">{{$modelo->descripcion}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                </div>

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-1 control-label">Stock Actual</label>
                                    <div class="col-sm-3">
                                        <input type="number" class="form-control"  placeholder="Stock actual" name="stock_actual" >
                                    </div>
                                    <label for="inputName" class="col-sm-1 control-label">Stock Minimo</label>
                                    <div class="col-sm-3">
                                        <input type="number" class="form-control"  placeholder="Stock minimo" name="stock_minimo" >
                                    </div>
                                    <label for="inputName" class="col-sm-1 control-label">Stock Maximo</label>
                                    <div class="col-sm-3">
                                        <input type="number" class="form-control"  placeholder="Stock maximo" name="stock_maximo" >
                                    </div>
                                </div>
                            </div>

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-1 control-label">Estado Producto</label>
                                        <label class="col-sm-1  control-label" style="text-align: center; color: green">
                                            <input type="radio" name="estado" value="1" checked> Activo<br>
                                        </label>
                                        <label class="col-sm-1 control-label"  style="text-align: center; color: red">
                                            <input type="radio" name="estado" value="0"> Inactivo<br>
                                        </label>

                                    <label for="inputEmail3" class="col-sm-2 control-label">Descripcion</label>
                                    <div class="col-sm-7">
                                        <textarea class="form-control"  placeholder="descripcion Producto" name="descripcion"></textarea>
                                    </div>
                                </div>
                            </div>



                                <div class="box-footer" style="text-align: center">
                                    {{--<input type="reset" class="btn btn-default" id="cancel" value="Cancelar">--}}
                                    <a href="/sales/productos" class="btn btn-default"  >Cancelar</a>
                                    <button type="submit" class="btn btn-info">Guardar</button>
                                </div>

                                 <!-- /.box-body -->

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection