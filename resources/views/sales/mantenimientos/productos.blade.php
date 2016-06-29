<!-- resources/views/auth/register.blade.php -->
@extends('sales.index')
@section('content')

    <a class="btn btn-w-m btn-primary">Registrar Categoria</a>
    <a class="btn btn-w-m btn-primary">Registrar Marca</a>
    <a class="btn btn-w-m btn-primary">Registrar Modelo</a><br/><br/>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">

                    <h3 class="box-title">Lista de Productos</h3><br/><br/>
                    <a class="btn btn-w-m btn-primary "  data-toggle="modal" data-target="#myModal" >Registrar Nuevo Producto</a>

                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody><tr>
                            <th>CODIGO</th>
                            <th>NOMBRE</th>
                            <th>MARCA</th>
                            <th>CATEGORIA</th>
                            <th>MODELO</th>
                        </tr>
                        @foreach($productos as $producto)
                        <tr>
                            <td>{{$producto->codigo}}</td>
                            <td>{{$producto->nombre}}</td>
                            <td>{{$producto->marca_id}}</td>
                            <td>{{$producto->categoria_id}}</td>
                            <td>{{$producto->modelo_id}}</td>
                        </tr>
                        @endforeach
                        </tbody></table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

    <div class="container">        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Registrar Nuevo Producto</h4>
                    </div>
                    <div class="modal-body">
                        {{--formulario--}}
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
                                    <label for="inputEmail3" class="col-sm-2 control-label">Descripcion</label>
                                    <div class="col-sm-6">
                                        <textarea class="form-control"  placeholder="descripcion Producto" name="descripcion"></textarea>
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