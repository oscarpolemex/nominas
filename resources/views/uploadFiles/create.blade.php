@extends('layouts.app')
@section('content')
    <div class="container mt-2">
        <div class="card">
            <div class="card-header bg-info  border-0 py-3 d-flex align-items-center"
                 style="background-color:#F1F1F1 !important;">
                <div>
                    <h3 class="card-title mb-0">ARCHIVOS</h3>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('uploadFiles.store')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div>
                                <label>Tipo de pago:</label>
                                <select class="form-control" name="tipo_pago" id="tipoPago">
                                    @foreach($tipoRecibo as $item)
                                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="descripcion">Número consecutivo de pago:</label>
                            <input type="text" name="consecutivo" value="{{$numeroRecibo}}" id="consecutivo"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="form-row custom-file">
                        <input type="file" class="custom-file-input" name="file[]" id="fileInput" multiple>
                        <label class="custom-file-label" for="customFile" data-browse="Cargar">Selecciona
                            archivo</label>
                    </div>
                    <div class="form-row text-center mt-3">
                        <div class="col-12">
                            {{ Form::button('<i>Enviar</i>', ['type' => 'submit', 'class' => 'btn btn-primary', 'id' => 'btnSubmitForm'] )  }}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        var consecutivoTemp = $('#consecutivo').val();
        $("#btnSubmitForm").attr('disabled',true);

        $(document).ready(function () {
            $('#tipoPago').change(function () {
                tipoPago(consecutivoTemp);
            });

            function tipoPago(consecutivo) {
                var tipo = parseInt($('#tipoPago').val());
                if (tipo !== 1) {
                    $('#consecutivo').val("");
                    $('#consecutivo').attr('disabled', true);
                } else {
                    $('#consecutivo').val(consecutivo);
                    $('#consecutivo').removeAttr('disabled', true);

                }
            }
            $("#fileInput").change(function(){
                $("#btnSubmitForm").prop("disabled", this.files.length === 0);
            });
        });
    </script>
@endsection

