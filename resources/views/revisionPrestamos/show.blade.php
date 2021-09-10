@extends('layouts.app')
@section('content')
<div class="container mt-2">
    <div class="card">
        <div class="card-header bg-info  border-0 py-3 d-flex align-items-center"
             style="background-color:#F1F1F1 !important;">
            <div>
                <h3 class="card-title mb-0">SOLICITUD</h3>
            </div>
        </div>
        <div class="card-body">
            {!! Form::open(['route'=>["revision_prestamos.update",$file->id], 'method'=>'PUT', 'files' => true, 'role' => 'form', 'id' => 'form']) !!}
            {!! Form::text('estatus',null,['class'=>'form-control', 'placeholder'=>'',  'id' => 'estatus','hidden']) !!}
            <button id="aprobar" type="submit" class="btn btn-success btn-sm">Aprobar</button>
            <button id="rechazar" type="submit" class="btn btn-danger btn-sm">Rechazar</button>
            <a href="{{route("revision_prestamos.index")}}" class="btn btn-warning btn-sm text-light">Regresar</a>
            {!! Form::close() !!}
            <iframe src="{{asset("get-solicitud")}}/{{$file->id}}" class="mt-1" width="1030"
                    height="1000"></iframe>
        </div>
    </div>
</div>
@endsection
@section("scripts")
<script type="text/javascript">
    $(document).ready(function () {
        $("#aprobar").click(function (e) {
            e.preventDefault();
            $("#estatus").val("2");
            $("#form").submit();
        });
        $("#rechazar").click(function (e) {
            e.preventDefault();
            $("#estatus").val("3");
            $("#form").submit();
        });
    });
</script>
@endsection