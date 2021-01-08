@extends("layouts.app")
@section("content")
    <div class="container mt-2">
        <div class="card">
            <div class="card-header" style="background-color:#F1F1F1 !important;">
                <div>
                    <h3 class="card-title mb-0">AGREGAR EVENTO</h3>
                </div>
                <div class="float-right">
                    <button class="btn btn-primary mr-5" onclick="location.href='{{route('eventos.create')}}'">
                        <i class="fa fa-pencil"></i> Agregar evento
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-resposive">
                    @if(count($eventos))
                        <table class="table table-striped" style="font-size:150%">
                            <thead>
                            <tr>
                                <th>Evento</th>
                                <th>Fecha de inicio</th>
                                <th>Fecha de fin</th>
                                <th>Estatus</th>
                                <th>Citas</th>
                            </tr>
                            </thead>
                            @foreach($eventos as $item)
                                <tr>
                                    <td>{{$item->nombre_evento}}</td>
                                    <td>{{$item->fecha_inicio}}</td>
                                    <td>{{$item->fecha_fin}}</td>
                                    <td>
                                        @if($item->estatus == 1)
                                            {!! Form::open(['route'=>['eventos.update', $item->id], 'method'=>'PUT', 'files' => true, 'role' => 'form',"id" => "evento".$item->id]) !!}
                                            <a type="submit" class="btn btn-sm btn-success evento"
                                               data-id="evento{{$item->id}}">Activo</a>
                                            {!! Form::close() !!}
                                        @elseif($item->estatus == 2)
                                            {!! Form::open(['route'=>['eventos.update', $item->id], 'method'=>'PUT', 'files' => true, 'role' => 'form',"id" => "evento".$item->id]) !!}
                                            <a type="submit" class="btn btn-sm btn-warning evento"
                                               data-id="evento{{$item->id}}">Ocupado</a>
                                            {!! Form::close() !!}
                                        @else
                                            <button type="button" class="btn btn-sm btn-danger">Finalizado</button>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route("eventos.show",$item->id)}}"
                                           class="btn btn-sm btn-primary text-light"
                                           style="text-decoration: none;">Ver citas</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <div class="text-center">
                            <h3>No hay eventos registrados</h3>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
@endsection
@section("scripts")
    <script>
        $(".evento").click(function () {
            let form = $(this).data('id');
            swal({
                title: "¿Quieres finalizar el evento?",
                text: "El evento será finalizado y no se agendarán más citas",
                icon: "warning",
                buttons: true,
            }).then((submit) => {
                if (submit) {
                    $('#' + form).submit();
                }
            });
        });
        $(".table").DataTable();
    </script>
@endsection
