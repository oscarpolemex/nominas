@extends('layouts.app')
@section('content')
    <div class="container mt-2">
        <div class="card">
            <div class="card-header"
                 style="background-color:#F1F1F1 !important;">

                @if(auth()->user())
                    <h3 class="card-title mb-0">Registro de nuevo usuario</h3>
                @else
                    <div class="float-left">
                        <h3 class="card-title mb-0">Registro de nuevo usuario</h3>
                    </div>
                    <div class="float-right">
                        <h6>
                            <span class="badge badge-secondary badge-lg ml-auto px-4" data-toggle="collapse"
                                  href="#collapseExample" role="button" aria-expanded="false"
                                  aria-controls="collapseExample">
                                AYUDA
                            </span>
                        </h6>
                    </div>
                @endif
            </div>
            <div class="collapse" id="collapseExample">
                <div class="card-body" style="font-size: 14px; color: #000000!important;">
                    <div class="text-justify"> La Dirección de Administración y Desarrollo de Personal le sugiere
                        que antes de
                        comenzar el llenado del formulario, lea atentamente este instructivo. Todos los
                        campos deben estar completos al momento de enviar la información con datos relativos
                        únicamente al servidor público de acuerdo a las siguientes indicaciones:
                    </div>
                    <div class="mt-2"></div>
                    <ul>
                        <li><strong>Nombre completo</strong> (ingrese apellido y nombre(s), sin abreviaturas,
                            en caso de ser más de uno incluya los datos de cada uno);
                            abreviaturas, en caso
                            de ser más de uno incluya los datos de cada uno.
                        </li>

                        <li><strong>CURP</strong> (Clave Única de Registro de Población), escribir los 18 caracteres que
                            aparecen en su último comprobante impreso. En caso de que requiera actualizarla ponerse en
                            contacto con el Departamento de Personal.
                        </li>

                        <li><strong>Correo electrónico</strong> (Dirección de correo electrónico, en minúsculas y sin
                            dejar espacios en
                            blanco). Escribir la dirección de correo electrónico que el solicitante haya generado para
                            su
                            uso personal. En caso de no contar con él, deberá generar una cuenta;
                        </li>

                        <li><strong>Confirmación de correo electrónico:</strong> Dirección de correo electrónico
                            idéntica al campo
                            anterior, en minúsculas y sin dejar espacios en blanco
                        </li>

                        <li><strong>Teléfono celular</strong> (Número de contacto móvil a 10 dígitos);</li>
                        <li><strong>Teléfono de oficina</strong> (Número de contacto fijo a 10 dígitos);</li>
                        <li><strong>Extensión;</strong> Y a continuación, presione el botón <strong>Guardar</strong>.
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">

                @if(auth()->user())
                    {!! Form::open(['route'=>'ServidoresPublicos.store', 'method'=>'POST', 'files' => true, 'role' => 'form', 'id' => 'formServidorPublico']) !!}
                @else
                    {!! Form::open(['route'=>'registrarServidorPublico', 'method'=>'POST', 'files' => true, 'role' => 'form', 'id' => 'formServidorPublico']) !!}
                @endif
                @include('ServidoresPublicos.form')
                {!! Form::close() !!}
            </div>
        </div>

    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            let valCorreo = false;
            let valCurp = false;
            $('#btnSubmitForm').click(function (event) {
                event.preventDefault();
                nombreValidate();
                curpValidate();
                correoValidate();
                celularValidate();
                telContactoValidate();
                correoConfirm();
                if (nombreValidate() === true && curpValidate() === true && correoValidate() === true
                    && celularValidate() === true && telContactoValidate() === true && correoConfirm() === true) {
                    @if(auth()->user())
                    $('#formServidorPublico').submit();
                    @else
                    if ($("#aviso-check").is(':checked') && $("#terminos-check").is(':checked')) {
                        $('#formServidorPublico').submit();
                    } else {
                        swal({
                            title: 'Acepta los términos y condiciones, así como el aviso de privacidad para el uso de datos personales.',
                            icon: "warning",
                            buttons: true,
                        });
                    }
                    @endif
                }
            });

            function nombreValidate() {
                var nombre = document.getElementById("nombre").value;
                var cadenaValidate = /^[A-Za-zñÑáÁéEíÍópOúÚ. ]+$/;
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

            function correoConfirm() {
                var correo = document.getElementById("correo_confirm").value;
                if (correo == null || correo.length === 0) {
                    $("#correo_confirm").children().attr("class", "text-danger");
                    $("#correo_confirm").parent().children("span").text("¡El campo está vacio!").show();
                    return false;
                } else {
                    $("#correo_confirm").children().attr("class", "has-success ");
                    $("#correo_confirm").parent().children("span").text("").hide();
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
                    $("#celular").parent().children("span").text("¡Debe ingresar un número de telefono a 10 dígitos!").show();
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
                    $("#telContacto").parent().children("span").text("¡Debe ingresar un número de telefono a 10 dígitos!").show();
                    return false;
                } else {
                    $("#telContacto").children().attr("class", "has-success ");
                    $("#telContacto").parent().children("span").text("").hide();
                    return true;
                }
            }

            $('#correo').blur(function correo() {
                let correo = $('#correo').val();
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
            });
            $("#correo_confirm").blur(function () {
                var correo = $("#correo").val();
                var correo_confirm = $(this).val();
                if (correo_confirm.length) {
                    if (correo !== correo_confirm) {
                        $(this).children().attr("class", "text-danger");
                        $(this).parent().children("span").text("¡No coincide el correo electronico!").show();
                        $(this).val('');
                    } else {
                        $(this).children().attr("class", "has-success ");
                        $(this).parent().children("span").text("").hide();
                    }
                } else {
                    $(this).children().attr("class", "text-danger");
                    $(this).parent().children("span").text("¡No haz ingresado el correo electronico!").show();
                    $(this).val('');
                }
            });

            $('#curp').blur(function curp() {
                let curp = $('#curp').val();
                if (curp.length) {
                    $.ajax({
                        url: '{{asset("/validaCurp")}}/' + curp,
                        type: 'GET',
                        dataType: 'json',
                        success: function (json) {
                            if (json === 1) {
                                $("#curp").children().attr("class", "text-danger");
                                $("#curp").parent().children("span").text("¡La curp ya fue validada previamente!").show();
                                $("#curp").val('');
                            } else if (json === 3) {
                                $("#curp").children().attr("class", "text-danger");
                                $("#curp").parent().children("span").text("¡La curp ingresada no pertenece a un servidor público!").show();
                                $("#curp").val('');
                            } else {
                                $("#curp").children().attr("class", "has-success ");
                                $("#curp").parent().children("span").text("").hide();
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection
