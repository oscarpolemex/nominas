<div class="form-row">
    <div class="form-group col-md-6">
        {!! Form::label('nombre', 'Nombre completo:') !!}
        {!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'P. EJ. CARLOS PÉREZ SÁNCHEZ',  'id' => 'nombre']) !!}
        <span class="text-danger" style="font-size:150%"></span>
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('curp', 'CURP:') !!}
        {!! Form::text('curp',null,['class'=>'form-control text-uppercase', 'placeholder'=>'P. EJ. XAXX010101XAXAXA01',  'id' => 'curp']) !!}
        <span class="text-danger" style="font-size:150%"></span>
    </div>
</div>
<div class="form-row">

    <div class="form-group col-md-6">
        {!! Form::label('c_electronico', 'Correo electronico:') !!}
        {!! Form::text('c_electronico',null,['class'=>'form-control', 'placeholder'=>'P. EJ. XX@YY.COM',  'id' => 'correo']) !!}
        <span class="text-danger" style="font-size:150%"></span>
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('c_electronico_confirm', 'Confirmar correo electronico:') !!}
        {!! Form::text('c_electronico_confirm',null,['class'=>'form-control', 'placeholder'=>'P. EJ. XX@YY.COM',  'id' => 'correo_confirm']) !!}
        <span class="text-danger" style="font-size:150%"></span>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        {!! Form::label('telefono_celular', 'Telefono celular:') !!}
        {!! Form::text('telefono_celular',null,['class'=>'form-control', 'placeholder'=>'P. EJ. 7222796400',  'id' => 'celular']) !!}
        <span class="text-danger" style="font-size:150%"></span>
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('telefono_contacto', 'Telefono de oficina:') !!}
        {!! Form::text('telefono_contacto',null,['class'=>'form-control', 'placeholder'=>'P. EJ. 7222796400',  'id' => 'telContacto']) !!}
        <span class="text-danger" style="font-size:150%"></span>
    </div>
    <div class="form-group col-md-2">
        {!! Form::label('extension_contacto', 'Extensión:') !!}
        {!! Form::text('extension_contacto',null,['class'=>'form-control', 'placeholder'=>'P. EJ. 4444',  'id' => 'ext']) !!}
        <span class="text-danger" style="font-size:150%"></span>
    </div>
</div>
<div class="form-row text-center">
    @yield('validar')
    <div class="col">
        {{ Form::button('Enviar', ['type' => 'submit', 'class' => 'btn btn-submit text-light', 'id' => 'btnSubmitForm', "style" => "float: right;"] )  }}
    </div>
</div>

