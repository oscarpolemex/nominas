@extends('layouts.app')
@section('validar')
    @if($servidorPublico->verificado == false)
        <div class="col">
            <button class="btn btn-danger" id="confirmDescartar"><i>Descartar</i></button>
        </div>
    @endif
@endsection
@section('content')
    <div class="container mt-2">
        <div class="card">
            <div class="card-header bg-info  border-0 py-3 d-flex align-items-center"
                 style="background-color:#F1F1F1 !important;">
                <div class='col-md-10'>
                    <h3 class="card-title mb-0">EDITAR</h3>
                </div>
                <div class="1">
                    <button class="btn btn-primary" onclick="location.href='{{route('ServidoresPublicos.index')}}'">
                        <i class="fa fa-arrow-left"></i>Regresar
                    </button>
                </div>
            </div>
            <div class="card-body">
                {!! Form::model($servidorPublico,['route'=>['ServidoresPublicos.update',$servidorPublico->id], 'method'=>'PUT', 'files' => true, 'role' => 'form', 'id' => 'formServidorPublico']) !!}
                @include('ServidoresPublicos.form')
                {!! Form::close() !!}
            </div>
        </div>

    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            let correoE = "{{$servidorPublico->c_electronico}}";
            let curpE = "{{$servidorPublico->curp}}";
            $('#btnSubmitForm').click(function (event) {
                event.preventDefault();
                nombreValidate();
                curpValidate();
                correoValidate();
                celularValidate();
                telContactoValidate();
                if (nombreValidate() === true && curpValidate() === true && correoValidate() === true
                    && celularValidate() === true && telContactoValidate() === true) {
                    $('#formServidorPublico').submit();
                }
            });

            function nombreValidate() {
                var nombre = document.getElementById("nombre").value;
                var cadenaValidate = /^[A-Za-zñÑáÁéEíÍópOúÚ ]+$/;
                if (nombre == null || nombre.length === 0) {
                    $("#nombre").children().attr("class", "text-danger");
                    $("#nombre").parent().children("span").text("¡El campo está vacio!").show();
                    return false;
                } else if (!cadenaValidate.test(nombre)) {
                    $("#nombre").children().attr("class", "text-danger");
                    $("#nombre").parent().children("span").text("Debe ingresar solo letras").show();
                    return false;
                } else {
                    $("#nombre").children().attr("class", "has-success ");
                    $("#nombre").parent().children("span").text("").hide();
                    return true;
                }
            }

            function curpValidate() {
                var curp = document.getElementById("curp").value;
                var cadenaValidate = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/
                const curpTolowercase = curp.toUpperCase();
                if (curp == null || curp.length === 0) {
                    $("#curp").children().attr("class", "text-danger");
                    $("#curp").parent().children("span").text("¡El campo está vacio!").show();
                    return false;
                } else if (!cadenaValidate.test(curpTolowercase)) {
                    $("#curp").children().attr("class", "text-danger");
                    $("#curp").parent().children("span").text("¡No contiene el formato correcto!").show();
                    return false;
                } else {
                    $("#curp").children().attr("class", "has-success ");
                    $("#curp").parent().children("span").text("").hide();
                    return true;
                }
            }

            function correoValidate() {
                var correo = document.getElementById("correo").value;
                var correoValidate = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

                if (correo == null || correo.length === 0) {
                    $("#correo").children().attr("class", "text-danger");
                    $("#correo").parent().children("span").text("¡El campo está vacio!").show();
                    return false;
                } else if (!correoValidate.test(correo)) {
                    $("#correo").children().attr("class", "text-danger");
                    $("#correo").parent().children("span").text("El formato es incorrecto").show();
                    return false;
                } else {
                    $("#correo").children().attr("class", "has-success ");
                    $("#correo").parent().children("span").text("").hide();
                    return true;
                }
            }

            function celularValidate() {
                var celular = document.getElementById("celular").value;
                var validaCelular = /^[0-9]{10}/;
                if (celular == null || celular.length === 0) {
                    $("#celular").children().attr("class", "text-danger");
                    $("#celular").parent().children("span").text("¡El campo está vacio!").show();
                    return false;
                } else if (!validaCelular.test(celular)) {
                    $("#celular").children().attr("class", "text-danger");
                    $("#celular").parent().children("span").text("Debe ingresar solo números").show();
                    return false;
                } else {
                    $("#celular").children().attr("class", "has-success ");
                    $("#celular").parent().children("span").text("").hide();
                    return true;
                }
            }

            function telContactoValidate() {
                var telContacto = document.getElementById("telContacto").value;
                var validaTelContacto = /^[0-9]{10}/;
                if (telContacto == null || telContacto.length === 0) {
                    $("#telContacto").children().attr("class", "text-danger");
                    $("#telContacto").parent().children("span").text("¡El campo está vacio!").show();
                    return false;
                } else if (!validaTelContacto.test(telContacto)) {
                    $("#telContacto").children().attr("class", "text-danger");
                    $("#telContacto").parent().children("span").text("Debe ingresar solo números").show();
                    return false;
                } else {
                    $("#telContacto").children().attr("class", "has-success ");
                    $("#telContacto").parent().children("span").text("").hide();
                    return true;
                }
            }

            $('#correo').blur(function correo() {
                let correo = $('#correo').val();
                if (correoE !== correo) {
                    if (correo.length) {
                        $.ajax({
                            url: '{{asset("/validaEmail")}}/' + correo,
                            type: 'GET',
                            dataType: 'json',
                            success: function (json) {
                                if (json === 1) {
                                    $("#correo").children().attr("class", "text-danger");
                                    $("#correo").parent().children("span").text("¡El correo ya existe!").show();
                                    $("#correo").val('');
                                } else {
                                    $("#correo").children().attr("class", "has-success ");
                                    $("#correo").parent().children("span").text("").hide();
                                }
                            }
                        });
                    }
                } else {
                    $("#correo").children().attr("class", "has-success ");
                    $("#correo").parent().children("span").text("").hide();
                }
            });
            $('#curp').blur(function curp() {
                let curp = $('#curp').val();

                if (curpE !== curp) {
                    if (curp.length) {
                        $.ajax({
                            url: '{{asset("/validaCurp")}}/' + curp,
                            type: 'GET',
                            dataType: 'json',
                            success: function (json) {
                                if (json === 1) {
                                    $("#curp").children().attr("class", "text-danger");
                                    $("#curp").parent().children("span").text("¡La curp ya existe!").show();
                                    $("#curp").val('');
                                } else {
                                    $("#curp").children().attr("class", "has-success ");
                                    $("#curp").parent().children("span").text("").hide();
                                }
                            }
                        });
                    }
                } else {
                    $("#curp").children().attr("class", "has-success ");
                    $("#curp").parent().children("span").text("").hide();
                }
            });
            $('#confirmDescartar').click(function (event) {
                event.preventDefault();
                var id = {{$servidorPublico->id}}
                var confirmacion = confirm("¿Deseas descartar el registro?");
                if (confirmacion) {
                    $.ajax({
                        url: '{{asset("/ServidoresPublicos")}}/' + id,
                        type: 'DELETE',
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function () {
                            window.location.href = '{{route("ServidoresPublicos.index")}}';
                        },
                    });

                }
            });
        });
    </script>
@endsection
