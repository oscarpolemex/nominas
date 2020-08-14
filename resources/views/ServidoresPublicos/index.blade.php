@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header bg-info  border-0 py-3 d-flex align-items-center"
                 style="background-color:#F1F1F1 !important;">
                <div class="col-11">
                    <h3 class="card-title mb-0">SERVIDORES PUBLICOS</h3>
                </div>
                <div class="1">
                    <button class="btn btn-primary mr-5" onclick="location.href='{{route('ServidoresPublicos.create')}}'">
                        <i class="fa fa-pencil"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table class="table" style="font-size:150%" id='tableServidores'>
                    <thead>
                        <tr>
                            <th class='id'>Id</th>
                            <th>CURP</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Validado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('#tableServidores').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('getServidores')}}",
            columns: [
                {data: 'id'},
                {data: 'curp'},
                {data: 'nombre'},
                {data: 'c_electronico'},
                {data: 'verificado'}
            ],
            "columnDefs": [
                {
                    "targets": [4],
                    "render": function (data, type, row) {
                        if(row.verificado == 0){
                            return "No";
                        }else{
                            return "Si";
                        }
                    },
                    "targets": [5],
                    "render": function (data, type, row) {
                        var ruta = 'ServidoresPublicos/'+row.id+'/edit';
                        html ='<div style="display: inline-block;">';
                        html +='    <a href="'+ruta+'" class="btn btn-primary" style="border-color: #5b1e3b;background-color: #5b1e3b;">';
                        html +='        <i class="fa fa-pencil-alt"></i>Editar';
                        html +='    </a>';
                        html +='</div>'
                        return html;;
                    }
                }
            ]
        });
    });
</script>
@endsection