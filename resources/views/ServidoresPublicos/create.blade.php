@extends('layouts.app')
@section('content')
    <div class="container mt-2">
        <div class="card">
            <div class="card-header bg-info  border-0 py-3 d-flex align-items-center"
                 style="background-color:#F1F1F1 !important;">
                <img src="{{url('IMG/escuela.png')}}" class="rounded-circle align-self-start mr-3" width="45px">
                <div>
                    <h3 class="card-title mb-0">AGREGAR</h3>
                </div>
            </div>
            <div class="card-body">
                {!! Form::open(['route'=>'ServidoresPublicos.store', 'method'=>'STORE', 'files' => true, 'role' => 'form', 'id' => 'formServidorPublico']) !!}
                <div class="form-group">
                    {!! Form::label('nombre', 'Nombre completo:') !!}
                    {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'',  'id' => 'nombre']) !!}
                    <span class="help-block text-danger "></span>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        {!! Form::label('curp', 'Curp:') !!}
                        {!! Form::text('curp',null,['class'=>'form-control', 'placeholder'=>'',  'id' => 'curp']) !!}
                        <span class="help-block text-danger text-lg-left"></span>
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('correo', 'Correo electronico:') !!}
                        {!! Form::text('correo',null,['class'=>'form-control', 'placeholder'=>'',  'id' => 'correo']) !!}
                        <span class="help-block text-danger text-lg-left"></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        {!! Form::label('celular', 'Telefono celular:') !!}
                        {!! Form::text('celular',null,['class'=>'form-control', 'placeholder'=>'',  'id' => 'celular']) !!}
                        <span class="help-block text-danger text-lg-left"></span>
                    </div>
                    <div class="form-group col-md-4">
                        {!! Form::label('telContacto', 'Telefono de contacto:') !!}
                        {!! Form::text('telContacto',null,['class'=>'form-control', 'placeholder'=>'',  'id' => 'telContacto']) !!}
                        <span class="help-block text-danger text-lg-left"></span>
                    </div>
                    <div class="form-group col-md-2">
                        {!! Form::label('ext', 'Extensión:') !!}
                        {!! Form::text('ext',null,['class'=>'form-control', 'placeholder'=>'',  'id' => 'ext']) !!}
                        <span class="help-block text-danger text-lg-left"></span>
                    </div>
                </div>
                <div class="form-row text-center">
                    <div class="col-12">
                        {{ Form::button('<i>Enviar</i>', ['type' => 'submit', 'class' => 'btn btn-primary', 'id' => 'btnSubmitForm'] )  }}
                    </div>
                </div>
                {!! Form::close() !!}
                <form class="val">

                </form>
            </div>
        </div>

    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('#btnSubmitForm').click(function (event) {
                event.preventDefault();
                nombreValidate();
                curpValidate();
                correoValidate();
                celularValidate();
                telContactoValidate();
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
                if (curp == null || curp.length === 0) {
                    $("#curp").children().attr("class", "text-danger");
                    $("#curp").parent().children("span").text("¡El campo está vacio!").show();
                    return false;
                } else if (!cadenaValidate.test(curp)) {
                    $("#curp").children().attr("class", "text-danger");
                    $("#curp").parent().children("span").text("No contiene el formato correcto").show();
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


        });    </script>
@endsection
