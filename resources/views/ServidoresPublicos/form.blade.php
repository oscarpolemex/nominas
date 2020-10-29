<div class="form-row">
    <div class="form-group col-md-6">
        {!! Form::label('nombre', 'Nombre completo:') !!}
        {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'',  'id' => 'nombre']) !!}
        <span class="text-danger" style="font-size:150%"></span>
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('curp', 'CURP:') !!}
        {!! Form::text('curp',null,['class'=>'form-control text-uppercase', 'placeholder'=>'',  'id' => 'curp']) !!}
        <span class="text-danger" style="font-size:150%"></span>
    </div>
</div>
<div class="form-row">

    <div class="form-group col-md-6">
        {!! Form::label('c_electronico', 'Correo electronico:') !!}
        {!! Form::text('c_electronico',null,['class'=>'form-control', 'placeholder'=>'',  'id' => 'correo']) !!}
        <span class="text-danger" style="font-size:150%"></span>
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('c_electronico_confirm', 'Confirmar correo electronico:') !!}
        {!! Form::text('c_electronico_confirm',null,['class'=>'form-control', 'placeholder'=>'',  'id' => 'correo_confirm']) !!}
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
        {!! Form::label('telefono_contacto', 'Telefono de oficina:') !!}
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
    @yield('validar')
    <div class="col">
        {{ Form::button('<i>Guardar</i>', ['type' => 'submit', 'class' => 'btn btn-primary', 'id' => 'btnSubmitForm'] )  }}
    </div>
</div>

