@extends("layouts.app")
@section("content")
    <div class="container mt-2">
        <div class="card">
            <div class="card-header" style="background-color:#F1F1F1 !important;">
                <h3 class="card-title mb-0">{{$evento->nombre_evento}}</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Servidor publico</th>
                        <th>Fecha y Hora</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($evento->citas)
                        @foreach($evento->citas as $item)
                            <tr>
                                @if($item->servidorPublico)
                                    <td>{{$item->servidorPublico->nombre}}</td>
                                @else
                                    <td></td>
                                @endif
                                <td>{{date_format(new DateTime($item->fecha_hora_cita), 'm/d/Y h:i A')}}</td>
                            </tr>
                        @endforeach
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
            $(".table").DataTable({});
        });
    </script>
@endsection
