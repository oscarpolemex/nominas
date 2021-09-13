@extends('layouts.app')
@section('content')

    <div class="container mt-2">
        <div class="card">
            <div class="card-header bg-info  border-0 py-3 d-flex align-items-center"
                 style="background-color:#F1F1F1 !important;">
                <div class="col-11">
                    <h3 class="card-title mb-0" style="line-height: 12px;">Portal de Gestión Interna</h3><br>
                    <h4 class="card-title mb-0">Comprobantes de percepciones y deducciones.</h4>
                </div>
                <div class="col-1">
                    <button class="btn btn-primary mr-5" id='btnBuscar'>
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if($servidor->documentos)
                        <table class="table" id='tableRecibos' style="font-size: 17px">
                            <thead>
                            <tr>
                                <th scope="col" class="text-center"> Tipo de Recibo</th>
                                <th scope="col" class="text-center"> Número de Recibo</th>
                                <th scope="col" class="text-center"> Fecha</th>
                                <th scope="col" class="text-center"> Documento</th>
                                <th scope="col" class="text-center"> Descargar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($servidor->documentos as $item)
                                <tr>
                                    <td class="text-center">{{$item->recibo->tipoRecibo->nombre}}</td>
                                    <td class="text-center">{{$item->recibo->consecutivo}}</td>
                                    <td class="text-center">{{\Carbon\Carbon::create($item->created_at)->format("d/m/Y")}}</td>
                                    <td class="text-center">{{$item->nombre}}</td>
                                    <td class="text-center">
                                        <a class="btn btn-success btn-sm" href="/recibos/getFile/{{$item->id}}"><i
                                                class="fa fa-download"></i></a>
                                    </td>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <h1>No hay documentos</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="modalb" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Búsqueda de comprobantes de percepciones y deducciones.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <form id="form-busqueda">
                            @csrf
                            <input type="text" name="servidor_id" value="{{$servidor->id}}" hidden>
                            <div class='row'>
                                <div class="form-group col-md-4">
                                    <label for='anio'> Año de recibo </label>
                                    <input type='text' id='anio' name="anio" class="form-control"/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for='tipo_recibo_id'> Tipo de recibo </label>
                                    <select class="form-control" id='tipo_recibo_id' name="tipo_recibo_id">
                                        <option value=''>Selecciona un tipo</option>
                                        @foreach($tiporecibo as $tipo)
                                            <option value='{{$tipo->id}}'>{{$tipo->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for='numero'> Numero de recibo </label>
                                    <input type='text' id='numero' name="numero" class="form-control"/>
                                </div>
                            </div>
                            <div class='col-md-12' align='center'>
                                <input type='button' class='btn btn-primary' id='btnBusqueda' value='Busqueda'/>
                            </div>
                        </form>
                        <br>
                        <div class='col-md-12'>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id='tableBusqueda'>
                                    <thead>
                                    <tr>
                                        <th scope="col"> Tipo de Recibo</th>
                                        <th scope="col"> Número de Recibo</th>
                                        <th scope="col"> Fecha</th>
                                        <th scope="col"> Documento</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            @if($errors->has('error'))
            swal({
                title: "No se encontró el recibo. Consulte con su administrador",
                icon: "error",
                buttons: true,
            });
            @endif
        });
        $(".cita").click(function () {
            let form = $(this).data('id');
            swal({
                title: "¿Quieres agendar una cita?",
                text: "Tu cita será generada y confirmada via correo electronico",
                icon: "warning",
                buttons: true,
            }).then((submit) => {
                if (submit) {
                    $('#' + form).submit();
                }
            });
        });

        $('#btnBuscar').on('click', function () {
            $('#modalb').modal('show')
        })
        $('#btnBusqueda').on('click', function () {

            if ($('#tipo_recibo_id').val() !== '' || $('#anio').val() !== '' || $('#numero').val() != '') {
                $.ajax({
                    url: '/recibos/busqueda/',
                    async: true,
                    data: $("#form-busqueda").serialize(),
                    type: 'POST',
                    dataType: "json",
                    success: function (data) {
                        var html = '';
                        $.each(data, function (i, v) {
                            let fecha = new Date(v.created_at);
                            var options = {year: 'numeric', month: 'numeric', day: 'numeric'};
                            html += '<tr>';
                            html += '    <td>' + v.nombre + '</td>';
                            html += '    <td>' + v.recibo.consecutivo + '</td>';
                            html += '    <td>' + fecha.toLocaleDateString("es-ES", options) + '</td>';
                            html += '    <td>';
                            html += '        <a class="btn btn-success btn-sm" href="/recibos/getFile/' + v.id + '"><i class="fa fa-download"></i></a>';
                            html += '    </td>';
                            html += '</tr>';
                        });
                        $("#tableBusqueda tbody").html(html);
                    }, error: function (data) {
                        var html = '';
                        html += '<tr>';
                        html += '<td colspan="5"><h3 id="labelError" class="text-center" ></td>';
                        html += '</tr>'
                        $("#tableBusqueda tbody").html(html);
                        $("#labelError").text(data.responseText);
                    }
                });
            } else {
                alert('Ingresa al menos un criterio de búsqueda')
            }
        });
    </script>
@endsection
