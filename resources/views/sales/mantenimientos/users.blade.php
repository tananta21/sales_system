<!-- resources/views/auth/register.blade.php -->
@extends('sales.index')
@section('content')


    <div class="box">
        <div class="box-header">
                <a class="btn btn-w-m btn-primary" id="boton" >Registrar Usuario</a>
                 <div id="mielemento" style="display: none" >
                     <div  class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Please Introduce the Dates of User</h3>
                        </div>
                <!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(['action' => 'UserController@create','method' => 'post', 'class' => 'form-horizontal']) !!}
                {{--<form class="form-horizontal" action="/sales/users/register" method="post">--}}
                    {{--{!! csrf_field() !!}--}}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">N° Documento</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control"  placeholder="DNI" name="nrodocumento" value="{{ old('nrodocumento') }}" maxlength="8" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                                @if (session('mensaje'))
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                            $("#mielemento").css("display", "block");
                                        });
                                    </script>
                                    <script type="text/javascript">
                                        alert("el numero de documento ya existe!");
                                    </script>
                                @endif
                            </div>
                            <label for="inputEmail3" class="col-sm-2 control-label">Tipo Usuario</label>
                            <div class="col-sm-3">
                                <select class="form-control" name="tipo_usuario" required  >
                                    <option value="">Seleccione tipo usuario</option>
                                    @foreach($tipo_usuario as $tipo)
                                        <option value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Nombres</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputName" placeholder="Nombres" name="name" value="{{ old('name')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Apellidos</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputName" placeholder="Apellidos" name="apellido" value="{{ old('apellido')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label" >Email</label>
                            <div class="col-sm-4">
                                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email')}}" >
                            </div>

                            <label for="inputEmail3" class="col-sm-1 control-label">Telefono</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control"  placeholder="Telefono" name="telefono" value="{{old('telefono')}}">
                            </div>
                        </div>

                            {{--SELEECIOAR SEXO Y DEMAS TABLAS DEPENDIENTES DE USUARIOS--}}
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Sexo</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="sexo" >
                                    <option value="v">seleccione sexo</option>
                                    <option value="h">Hombre</option>
                                    <option value="m">Mujer</option>
                                </select>
                            </div>
                            <label for="inputEmail3" class="col-sm-1 control-label">Estado Civil</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="estado_civil">
                                    <option value="1">Seleccione estado civil</option>
                                    @foreach($estado_civil as $estado)
                                        <option value="{{$estado->id}}">{{$estado->descripcion}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Grado Instruccion</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="grado_instruccion">
                                    <option value="1">Seleccione grado</option>
                                    @foreach($grado_instruccion as $grado)
                                    <option value="{{$grado->id}}">{{$grado->descripcion}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="inputEmail3" class="col-sm-1 control-label">Ocupacion</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="ocupacion" >
                                    <option value="1">Seleccione ocupacion</option>
                                    @foreach($ocupacion as $ocupaciones)
                                        <option value="{{$ocupaciones->id}}">{{$ocupaciones->descripcion}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Ubigeo</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="ubigeo">
                                    <option value="1">Seleccione Ubigeo</option>
                                    @foreach($ubigeo as $ubigeos)
                                        <option value="{{$ubigeos->id}}">{{$ubigeos->numubigeo}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>




                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer" style="text-align: center">
                        {{--<input type="reset" class="btn btn-default" id="cancel" value="Cancelar">--}}
                        <a href="/sales/users" class="btn btn-default">Cancelar</a>
                        <button type="submit" class="btn btn-info">Guardar</button>
                    </div>
                    <!-- /.box-footer -->
                {{--</form>--}}
                            {!! Form::close() !!}
            </div>
                 </div>

            <script>
                $(document).ready(function(){
                    $("#boton").click(function(){
                        $("#mielemento").css("display", "block");
                        //lo que se desee hacer al recibir un clic el checkbox
                    });
                    $("#cancel").click(function(){
                        $("#mielemento").css("display", "none");
                        //lo que se desee hacer al recibir un clic el checkbox
                    });

                });
            </script>


        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <tbody><tr>
                    <th>Documento</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    {{--<th>Date</th>--}}
                    {{--<th>Status</th>--}}
                    {{--<th>Reason</th>--}}
                </tr>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->nro_documento}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->apellido}}</td>
                    <td>{{$user->email}}</td>
                    {{--<td>11-7-2014</td>--}}
                    {{--<td><span class="label label-success">Approved</span></td>--}}
                    {{--<td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>--}}
                </tr>
                @endforeach
                {{--<tr>--}}
                    {{--<td>219</td>--}}
                    {{--<td>Alexander Pierce</td>--}}
                    {{--<td>11-7-2014</td>--}}
                    {{--<td><span class="label label-warning">Pending</span></td>--}}
                    {{--<td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<td>657</td>--}}
                    {{--<td>Bob Doe</td>--}}
                    {{--<td>11-7-2014</td>--}}
                    {{--<td><span class="label label-primary">Approved</span></td>--}}
                    {{--<td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<td>175</td>--}}
                    {{--<td>Mike Doe</td>--}}
                    {{--<td>11-7-2014</td>--}}
                    {{--<td><span class="label label-danger">Denied</span></td>--}}
                    {{--<td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>--}}
                {{--</tr>--}}
                </tbody></table>
        </div>
        <!-- /.box-body -->
    </div>
@endsection