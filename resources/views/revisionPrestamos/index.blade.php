@extends('layouts.app')
@section('content')
<div class="container mt-2">
    <div class="card">
        <div class="card-header bg-info  border-0 py-3 d-flex align-items-center"
             style="background-color:#F1F1F1 !important;">
            <div>
                <h3 class="card-title mb-0">SOLICITUDES</h3>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>SERVIDOR PÚBLICO</th>
                        <th>FECHA DE SOLICITUD</th>
                        <th>ESTATUS</th>
                        <th>OPCIONES</th>
                        <th>CITA</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($prestamos))
                    @foreach($prestamos as $item)
                    <tr>
                        <td class="text-uppercase">{{$item->servidorPublico->nombre}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>
                            @if($item->estatus == 1)
                            <span class="badge badge-warning">En revisión</span>
                            @elseif($item->estatus == 2)
                            <span class="badge badge-success">Aprobado</span>
                            @else
                            <span class="badge badge-danger">Rechazado</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{route("revision_prestamos.show",$item->id)}}" class="btn btn-primary btn-sm">Ver solicitud</a>
                        </td>
                        <td></td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="3" class="text-center"><h4>No hay solicitudes</h4></td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section("scripts")
<script type="text/javascript">
    $(document).ready(function () {
        $(".table").DataTable();
    });
</script>
@endsection