@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header bg-info  border-0 py-3 d-flex align-items-center"
             style="background-color:#F1F1F1 !important;">
            <img src="{{url('IMG/escuela.png')}}" class="rounded-circle align-self-start mr-3" width="45px">
            <div>
                <h3 class="card-title mb-0">AGREGAR</h3>
            </div>
        </div>
    </div>
    <div class="container">
        {!! Form::open(['route'=>'ServidoresPublicos.store', 'method'=>'STORE', 'files' => true, 'role' => 'form']) !!}
        <div class="card">
            <div class="row">
                <div class="col-2">
                    {!! Form::label('nombre', 'Nombre completo:', array('class' => 'negrita')) !!}
                </div>
                <div class="col-10">
                    {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'Juan Perez Lopez', 'required' => 'required']) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    {!! Form::label('curp', 'Curp:', array('class' => 'negrita')) !!}
                </div>
                <div class="col-4">
                    {!! Form::text('curp',null,['class'=>'form-control', 'placeholder'=>'', 'required' => 'required']) !!}
                </div>

                <div class="col-2">
                    {!! Form::label('cuenta', 'Ultimos 6 dígitos cuenta bancaria:', array('class' => 'negrita')) !!}
                </div>
                <div class="col-4">
                    {!! Form::text('cuenta',null,['class'=>'form-control', 'placeholder'=>'', 'required' => 'required']) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    {!! Form::label('email', 'Correo electronico:', array('class' => 'negrita')) !!}
                </div>
                <div class="col-4">
                    {!! Form::text('email',null,['class'=>'form-control', 'placeholder'=>'', 'required' => 'required']) !!}
                </div>

                <div class="col-2">
                    {!! Form::label('celular', 'Telefono celular:', array('class' => 'negrita')) !!}
                </div>
                <div class="col-4">
                    {!! Form::text('celular',null,['class'=>'form-control', 'placeholder'=>'', 'required' => 'required']) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    {!! Form::label('password', 'Contraseña:', array('class' => 'negrita')) !!}
                </div>
                <div class="col-10">
                    {!! Form::password('password',null,['class'=>'form-control', 'placeholder'=>'', 'required' => 'required']) !!}
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
