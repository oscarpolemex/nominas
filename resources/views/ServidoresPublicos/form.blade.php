<div class="form-group">
    {!! Form::label('nombre', 'Nombre completo:') !!}
    {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'',  'id' => 'nombre']) !!}
    <span class="text-danger" style="font-size:150%"></span>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        {!! Form::label('curp', 'Curp:') !!}
        {!! Form::text('curp',null,['class'=>'form-control text-uppercase', 'placeholder'=>'',  'id' => 'curp']) !!}
        <span class="text-danger" style="font-size:150%"></span>
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('c_electronico', 'Correo electronico:') !!}
        {!! Form::text('c_electronico',null,['class'=>'form-control', 'placeholder'=>'',  'id' => 'correo']) !!}
        <span class="text-danger" style="font-size:150%"></span>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        {!! Form::label('telefono_celular', 'Telefono celular:') !!}
        {!! Form::text('telefono_celular',null,['class'=>'form-control', 'placeholder'=>'',  'id' => 'celular']) !!}
        <span class="text-danger" style="font-size:150%"></span>
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('telefono_contacto', 'Telefono de contacto:') !!}
        {!! Form::text('telefono_contacto',null,['class'=>'form-control', 'placeholder'=>'',  'id' => 'telContacto']) !!}
        <span class="text-danger" style="font-size:150%"></span>
    </div>
    <div class="form-group col-md-2">
        {!! Form::label('extension_contacto', 'Extensión:') !!}
        {!! Form::text('extension_contacto',null,['class'=>'form-control', 'placeholder'=>'',  'id' => 'ext']) !!}
        <span class="text-danger" style="font-size:150%"></span>
    </div>
</div>
<div class="form-row text-center">
    <div class="col-12">
        {{ Form::button('<i>Enviar</i>', ['type' => 'submit', 'class' => 'btn btn-primary', 'id' => 'btnSubmitForm'] )  }}
    </div>
</div>
