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
        {!! Form::label('telefono_celular', 'Telfono celular:') !!}
        {!! Form::text('telefono_celular',null,['class'=>'form-control', 'placeholder'=>'P. EJ. 7222796400',  'id' => 'celular']) !!}
        <span class="text-danger" style="font-size:150%"></span>
    </div>
    <div class="form-group col-md-4">
        {!! Form::label('telefono_contacto', 'Teléfono de oficina:') !!}
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
    @if(!auth()->user())
        <div class="col-lg-4">
        </div>
        <div class="col-lg-5 col-sm-12">
            <p style="float: left;">
                <label id="terminos">
                    <input type="checkbox" name="terminos" id="terminos-check" class="filled-in"/>
                    <span style="color: #9c024c">Términos y condiciones de uso</span>
                </label>
            </p>
            <p class="ml-lg-4" style="float: left;">
                <label id="aviso">
                    <input type="checkbox" id="aviso-check" class="filled-in"/>
                    <span style="color: #9c024c">Aviso de privacidad</span>
                </label>
            </p>
        </div>

    @endif
    <div class="col-lg-2 btn-enviar">
        {{ Form::button('Enviar', ['type' => 'submit', 'class' => 'btn btn-submit text-light', 'id' => 'btnSubmitForm', "style" => "float: right;!important"] )  }}
    </div>
</div>

<div class="modal bd-example-modal-lg" id="modal-terminos" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Terminos y condiciones de uso</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cerrar-terminos">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10">
                        <p class="text-justify text-dark" style="font-size: 15px;">De conformidad con lo
                            establecido en los
                            artículos 71 de la Ley del
                            Trabajo de
                            los Servidores
                            Públicos del Estado y Municipios; 94 fracción IV y 96 de la Ley Orgánica del Poder
                            Legislativo
                            del
                            Estado Libre y Soberano de México; 160 del Reglamento del Poder Legislativo del Estado Libre
                            y
                            Soberano de México; 56 del Reglamento de las Condiciones Generales de Trabajo del Poder
                            Legislativo
                            del Estado de México; 14 fracción II del Reglamento Interno de la Secretaría de
                            Administración y
                            Finanzas del Poder Legislativo del Estado de México; el servidor público al realizar el
                            registro
                            y
                            uso del Portal de Gestión Interno con URL: <strong>https:\\polemex.gob.mx</strong>,
                            reconoce y acepta que recibirá por
                            parte del Poder Legislativo del Estado de México, su recibo de nómina correspondiente a la
                            percepción por sus servicios prestados a esta institución.
                            Del mismo modo, acepta que este será el único medio para recibirlo, así como los token de
                            acceso
                            y
                            notificaciones por correo electrónico con información relacionada a la misma o información
                            diversa
                            por la Dirección de Administración y Desarrollo de Personal de interés para el servidor.</p>
                    </div>
                    <div class="col-1"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-submit text-light" id="aceptar-terminos">Aceptar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal bd-example-modal-lg" id="modal-aviso" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Aviso de privacidad</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cerrar-aviso">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="embed-responsive embed-responsive-21by9">
                    <iframe class="embed-responsive-item"
                            src="https://administracionyfinanzasplem.gob.mx/docs/ap/AP_DADP.pdf"></iframe>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-submit text-light" id="aceptar-aviso">Aceptar</button>
            </div>
        </div>
    </div>
</div>


@section('scripts')
    @parent
    <script type="text/javascript">
        $(document).ready(function () {
            $("#terminos").click(function () {
                $("#modal-terminos").show();
            });
            $("#aceptar-terminos").click(function () {
                $("#terminos-check").prop("checked", true);
                $("#cerrar-terminos").click();
            });

            $("#cerrar-terminos").click(function () {
                $("#modal-terminos").hide();
            });

            $("#aviso").click(function () {
                $("#modal-aviso").show();
            });
            $("#aceptar-aviso").click(function () {
                $("#aviso-check").prop("checked", true);
                $("#cerrar-aviso").click();
            });

            $("#cerrar-aviso").click(function () {
                $("#modal-aviso").hide();
            });
        });
    </script>
@endsection
