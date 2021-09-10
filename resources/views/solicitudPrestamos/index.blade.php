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
                        <th>FECHA DE SOLICITUD</th>
                        <th>ESTATUS</th>
                        <th>CITA</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($prestamos))
                        @foreach($prestamos as $item)
                            <tr>
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
                                    @if($item->estatus == 2)
                                        <button type="button" class="btn btn-primary btn-sm btn-cita"
                                                data-toggle="modal"
                                                data-target=".bd-example-modal-lg" data-id="{{$item->id}}">
                                            Generar cita
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3" class="text-center"><h4>No tienes operaciones activas</h4></td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::open(['id' => 'form-submit', "class"=>"fade"]) !!}
    {!! Form::text('fecha_inicio',null,['class'=>'form-control', 'placeholder'=>'',  'id' => 'fecha-inicio']) !!}
    {!! Form::text('solicitud',null,['class'=>'form-control', 'placeholder'=>'',  'id' => 'id-solicitud']) !!}
    {!! Form::close() !!}

@endsection
@section("scripts")
    <script type="text/javascript">
        $(document).ready(function () {
            $("#calendar").css("font-size", "1.5em");
            let solicitud;
            let inicio = moment().add(1, 'days');
            $(document).on('click', '.btn-cita', function () {
                solicitud = $(this).data("id");
            });
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: "prev,next today",
                    center: "title",
                    right: "timeGridDay",
                },
                defaultDate: inicio,
                initialView: "timeGridDay",
                themeSystem: 'bootstrap',
                height: 650,
                contentHeight: 600,
                aspectRatio: 2,
                expandRows: true,
                hiddenDays: [0, 6],
                businessHours: [ // specify an array instead
                    {
                        daysOfWeek: [1, 2, 3, 4, 5], // Monday, Tuesday, Wednesday
                        startTime: '10:00', // 8am
                        endTime: '14:00' // 6pm
                    },
                    {
                        daysOfWeek: [1, 2, 3, 4, 5], // Thursday, Friday
                        startTime: '15:00', // 10am
                        endTime: '18:00' // 4pm
                    }
                ],
                slotMinTime: "10:00:00",
                slotMaxTime: "18:00:00",
                slotDuration: "00:04:00",
                allDayText: "Horarios",
                slotLabelFormat: {
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: true
                },//se visualizara de esta manera 01:00 AM en la columna de horas
                slotLabelInterval: "00:04:00",
                eventTimeFormat: {
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: true
                },//y este código se visualizara de la misma manera pero en el titulo del evento creado en fullcalendar
                dateClick: function (info) {
                    let fecha = moment(new Date(info.dateStr));
                    let check = moment(new Date(info.dateStr)).format('YYYY-MM-DD h:mm');
                    var today = moment(new Date()).format('YYYY-MM-DD h:mm');
                    // si el inicio de evento ocurre hoy o en el futuro mostramos el modal
                    if (check >= today) {
                        swal({
                            title: "Confirmar cita",
                            text: "Se agendará una cita para el día: " + fecha.format("DD MMMM YYYY") + " a las " + fecha.format("h:mm A"),
                            icon: "warning",
                            buttons: true,
                        }).then((submit) => {
                            if (submit) {
                                $("#fecha-inicio").val(info.dateStr);
                                $("#id-solicitud").val(solicitud);

                                console.log($("#form-submit").serialize());
                            }
                        });
                    }
                    // si no, mostramos una alerta de error
                    else {
                        return false;
                    }
                },
                events: [
                    {
                        title: 'Ocupado',
                        start: '2021-02-08T15:32:00.008',
                        end: '2021-02-08T15:36:00.008',
                        color: "red"
                    },

                ]
            });
            calendar.setOption("locale", "Es")
            calendar.render();
        });
    </script>
@endsection
