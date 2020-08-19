@extends('layouts.app')
@section('content')

<div class="container mt-2">
    <div class="card">
        <div class="card-header bg-info  border-0 py-3 d-flex align-items-center"
             style="background-color:#F1F1F1 !important;">
            <div class="col-11">
                <h3 class="card-title mb-0">ARCHIVOS</h3>
            </div>
            <div class="1">
                <button class="btn btn-primary mr-5" id='btnBuscar'>
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            @if($servidor->documentos)

            <table class="table" id='tableRecibos'>
                <thead>
                    <tr>
                        <th scope="col"> Tipo de Recibo</th>
                        <th scope="col"> Número de Recibo</th>
                        <th scope="col"> Fecha</th>
                        <th scope="col"> Documento</th>
                        <th scope="col"> Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($servidor->documentos as $item)
                    <tr>
                        <td>{{$item->recibo->tipoRecibo->nombre}}</td>
                        <td>{{$item->recibo->consecutivo}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>{{$item->nombre}}</td>
                        <td>
                            <a class="btn btn-success btn-sm" href="/recibos/getFile/{{$item->id}}"><i class="fa fa-download"></i></a>
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
<div class="modal" tabindex="-1" id="modalb" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Busqueda de Recibos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class='row'>
                        <div class="form-group col-md-4">
                            <label for='tipo_recibo_id'> Tipo de recibo </label>
                            <select class="form-control" id='tipo_recibo_id'>
                                <option value=''>Selecciona un tipo</option>
                                @foreach($tiporecibo as $tipo)
                                <option value='{{$tipo->id}}'>{{$tipo->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for='anio'> Año de recibo </label>
                            <input type='text' id='anio' class="form-control"/>
                        </div>
                        <div class="form-group col-md-4">
                            <label for='numero'> Numero de recibo </label>
                            <input type='text' id='numero' class="form-control"/>
                        </div>
                    </div>
                    <div class='col-md-12' align='center'>
                        <label id='labelError'></label>
                        <input type='button' class='btn btn-primary' id='btnBusqueda' value='Busqueda'/>
                    </div><br>
                    <div class='col-md-12'>
                        <table class="table table-striped table-bordered" id='tableBusqueda'>
                            <thead>
                                <tr>
                                    <th scope="col"> Tipo de Recibo</th>
                                    <th scope="col"> Número de Recibo</th>
                                    <th scope="col"> Fecha</th>
                                    <th scope="col"> Documento</th>
                                    <th scope="col"> Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
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
    $('#btnBuscar').on('click', function () {
        $('#modalb').modal('show')
    })
    $('#btnBusqueda').on('click', function () {
        if($('#tipo_recibo_id').val() != ''){
            if($('#anio').val() != ''){
                if($('#numero').val() != ''){
                    $.ajax({
                        url:'/recibos/busqueda/'+$('#tipo_recibo_id').val()+'/'+$('#anio').val()+'/'+$('#numero').val()+"/"+'{{$servidor->id}}',
                        async:true,
                        type:'GET',
                        success:function(data){
                            var html='';
                            html +='<tr>';
                            html +='    <td>'+data.recibo.nombre+'</td>';
                            html +='    <td>'+data.recibo.consecutivo+'</td>';
                            html +='    <td>'+data.created_at+'</td>';
                            html +='    <td>';
                            html +='        <a class="btn btn-success btn-sm" href="/recibos/getFile/'+data.id+'"><i class="fa fa-download"></i></a>';
                            html +='    </td>';
                            html +='</tr>';
                            $("#tableBusqueda tbody").html(html);
                        },error:function(data){
                            $("#labelError").text(data.responseText);
                        }
                    });
                }else{
                    alert('Ingresa número de recibo')
                }
            }else{
                alert('Ingresa año de recibo')
            }
        
        }else{
            alert('Selecciona tipo de recibo')
        }
    });
</script>
@endsection
