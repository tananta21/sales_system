
@extends('sales.index')
@section('content')
{{--formulario editar--}}
<div class="box box-primary">

    {{--{!! Form::open(['action' => ['',$editarProducto],'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}--}}

    <form action="/sales/productos/actualizar/{{$editarProducto->id}}" role="form" method="PUT" class="form-horizontal">
    {!! csrf_field() !!}
            <div class="box-body">
                <div class="form-group">
                    <label for="inputName" class="col-sm-1 control-label">Codigo</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control"  placeholder="Codigo Producto" name="codigo" required="required" value="{{$editarProducto->codigo}}"  >
                    </div>
                    <label for="inputName" class="col-sm-1 control-label">Nombre</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control"  placeholder="Nombre Producto" name="nombre" value="{{$editarProducto->nombre}}" >
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
        <input type="submit" class="btn btn-info" value="Guardar">
    </div>

    <!-- /.box-body -->

    </form>

    {{--{!! Form::close() !!}--}}
</div>
@endsection