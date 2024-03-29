@extends('layouts.app')
@section('content')
    <div class="container mt-2">
        <div class="card">
            <div class="card-header bg-info  border-0 py-3 d-flex align-items-center"
                 style="background-color:#F1F1F1 !important;">
                <div>
                    <h3 class="card-title mb-0">CARGAR SOLICITUD</h3>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('solicitud_prestamos.store')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-row custom-file">
                        <input type="file" class="custom-file-input" name="file" id="fileInput">
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
@section('scripts')
    <script>
        $("#btnSubmitForm").attr('disabled', true);
        $(document).ready(function () {
            $("#fileInput").change(function () {
                $("#btnSubmitForm").prop("disabled", this.files.length === 0);
            });
        });
    </script>
@endsection

