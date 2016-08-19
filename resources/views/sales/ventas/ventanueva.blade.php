@extends('sales.index')
@section('content')
    <div>
        <div>
            <h3>AGREGAR VENTA NUEVA</h3>
        </div>
        <div>
            <label for="">NRO. VENTA : </label>
            <input style="text-align: center" type="text" name="nro_venta" value="{{$nro_venta['id']}}" readonly/>
        </div>
       <div>
           <div class="col-lg-12">
             <h3 >Buscar Producto</h3>
           </div>
           {!! Form::open(array('route' => 'venta.nueva','method' => 'post','onsubmit' => 'return false', 'id' => 'formulario_busqueda')) !!}
            <div class="form-group">
                <div class="col-sm-4">
                    <input type="text" class="form-control input"  placeholder="Codigo o Nombre Producto" name="codigo" required>
                </div>
                <input type="submit" class="btn btn-success" value="Buscar" />
            </div>
            {!! Form::close() !!}

           <button id="boton01">Limpiar</button>
       </div>
           <div class="box-body table-responsive no-padding" id="respuesta">
           </div>

            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover" id="myTable">
                                <thead>
                                <tr>
                                    <th>CANT</th>
                                    <th>DESCRRIPCION</th>
                                    <th>P. UNIT.</th>
                                    <th>TOTAL</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-footer" style="text-align: center">
                        {{--<input type="reset" class="btn btn-default" id="cancel" value="Cancelar">--}}
                        <a href="#" class="btn btn-default">Cancelar</a>
                        <button  class="btn btn-info" id="vender">Realizar Venta</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{--prueba--}}
    <script type="text/javascript">
        $(document).ready(function() {
            $("#vender").click(function() {
                var codigo_producto = $('input[name="idproducto[]"]').serializeArray();
                var cantidad_producto = $('input[name="cantidad[]"]').serializeArray();
                var precio_producto = $('input[name="precio[]"]').serializeArray();
                var nro_venta = $('input[name="nro_venta"]').val();
           var url = '{{route("registrar.venta")}}';
            $.ajax({
                type: 'GET',
                url: url,
                data: {
                    idproducto: codigo_producto,
                    cantidad : cantidad_producto,
                    precio : precio_producto,
                    nro_venta : nro_venta
                },
//                    "_token": $(this).find( 'input[name="_token"]' ).val()},
                dataType: 'JSON',
//                beforeSend: function() {
//                    $("#respuesta").html('<div>buscando producto</div>');
//                },
                error: function() {
                    $("#respuesta").html('<div> Ha surgido un error. </div>');
                },
//                success: function(respuesta) {
//                    console.log(respuesta)
////                    location.reload();
//                }
                success: function(){
                    alert('todo bien');
                    location.reload();
                }
            });
            });
        });
    </script>

    {{--agregar fila tabla venta--}}
    <script type="text/javascript">
        function mostrar(id) {
            var tbody = $('#myTable').children('tbody');
            var table = tbody.length ? tbody : $('#myTable');
            table.append(
            '<tr id="filaPedido'+id+'">' +
                '</td><input type="hidden" name="idproducto[]" value="'+id+'"/></td>' +
                '<td><input type="text"  onchange="fncSumar('+id+')"  name="cantidad[]" id="cantidad'+id+'"/>'+
                '<td>'+$("#nombreProducto"+id).val()+'</td>' +
                '<td><input type="text" onchange="fncSumar('+id+')" id="precio'+id+'"  name="precio[]" value="'+$("#precio"+id).val()+'"/></td>' +
    //            '<td>'+$("#precio").val()+'</td>' +
                '<td><input type="text" id="total'+id+'" /></td>' +
                '<td><button onclick="eliminarPedido('+id+')">Eliminar</button></td>' +
            '</tr>');
        };

        //        eliminar pedido
        function eliminarPedido(id){
            $("#filaPedido"+id).remove();;
        };
    </script>

    {{--sumar pedido para el subtotal--}}
    <script type="text/javascript">
        function fncSumar(id){
            var numero2 = parseFloat($('#precio'+id).val());
            var numero1 = parseFloat($('#cantidad'+id).val());

            $('#total'+id).val(numero1*numero2);
        }
    </script>

    {{--limpiar contenido de tabla--}}
    <script type="text/javascript">

        $(document).ready(function() {
            $("#boton01").click(function(event) {
                $("#respuesta").empty();
                $(".input").val("");
            });
        });
    </script>

    {{--recuperar datos de la consulta por post--}}
    <script type="text/javascript">
        (function() {
            $("#formulario_busqueda").submit(function() {
                var form = $('#formulario_busqueda');
                var url = form.attr('action');
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        codigo: $(this).find( 'input[name="codigo"]' ).val(),
//                        legajo: $("#legajo").val(),
                        "_token": $(this).find( 'input[name="_token"]' ).val()},
                    dataType: 'JSON',
                    beforeSend: function() {
                        $("#respuesta").html('Buscando Producto...');
                    },
                    error: function() {
                        $("#respuesta").html('<div> Ha surgido un error. </div>');
                    },
                    success: function(respuesta) {
                        if (respuesta) {
                            var html = '<table class="table table-hover"><tbody>';
                            html += ' <tr>';
                            html += ' <th></th>';
                            html += ' <th>CODIGO</th>';
                            html += ' <th>NOMBRE</th>';
                            html += ' <th>PRECIO</th>';
                            html += ' <th>STOCK_ACTUAL</th>';
                            html += ' </tr>';

                            for(var i in respuesta){
//                            $.each(respuesta, function(i,item) {
                                html += ' <tr>';
                                    html += ' <td><button id="add" onclick="mostrar('+respuesta[i].id +')">AGREGAR</button></td>';
                                    html += ' <td><input type="text" id="codigo'+respuesta[i].id+'" style="border:none" readonly value="'+respuesta[i].codigo +'"/></td>';
    //                                html += ' <td>'+respuesta[i].codigo +'</td>';
                                    html += ' <td><input type="text" id="nombreProducto'+respuesta[i].id+'" style="border:none" readonly value="'+respuesta[i].nombre +'"/></td>';
                                    html += ' <td><input type="text" id="precio'+respuesta[i].id+'" style="border:none; color: red; padding: 0.2rem; background: #ffff00" readonly value="'+respuesta[i].precio +'"/></td>';
    //                                html += ' <td>'+respuesta[i].nombre +'</td>';
                                    html += ' <td><input type="text" id="stock'+respuesta[i].id+'" style="border:none; color: red; padding: 0.2rem; background: #ffff00" readonly value="'+respuesta[i].stock_actual +'"/></td>';
//                                html += ' <td>'+respuesta[i].stock_actual +'</td>';
                                html += ' </tr>';
//
                            }
                            html += '</tbody></table>';
                            $("#respuesta").html(html);

                        } else {
                            $("#respuesta").html('<div> No hay ningún producto con ese codigo. </div>');
                        }
                    }
                });
//                $("#legajo").val('');
            });
        }).call(this);



    </script>
@endsection