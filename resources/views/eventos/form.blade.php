<div class="form-row">
    <div class="form-group col-md-12">
        {!! Form::label('nombre_evento', 'Nombre del evento:') !!}
        {!! Form::text('nombre_evento',null,['class'=>'form-control', 'placeholder'=>'',  'id' => 'nombre-evento']) !!}
        <span class="text-danger" style="font-size:150%"></span>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        {!! Form::label('fecha_inicio', 'Fecha de inicio:') !!}
        {!! Form::date('fecha_inicio',null,['class'=>'form-control', 'placeholder'=>'',  'id' => 'fecha-inicio']) !!}
        <span class="text-danger" style="font-size:150%"></span>
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('fecha_fin', 'Fecha de fin:') !!}
        {!! Form::date('fecha_fin',null,['class'=>'form-control', 'placeholder'=>'',  'id' => 'fecha-fin']) !!}
        <span class="text-danger" style="font-size:150%"></span>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-12">
        {!! Form::label('descripcion_evento', 'Descripción:') !!}
        {!! Form::textarea('descripcion_evento',null,['class'=>'form-control', 'placeholder'=>'',  'id' => 'descripcion']) !!}
        <span class="text-danger" style="font-size:150%"></span>
    </div>
</div>
<div class="form-row text-center">
    @yield('validar')
    <div class="col">
        {{ Form::button('<i>Guardar</i>', ['type' => 'submit', 'class' => 'btn btn-primary', 'id' => 'btnSubmitForm'] )  }}
    </div>
</div>

