@extends('layouts.app')
@section('content')
    <div class="container mt-2">
        <div class="card">
            <div class="card-header bg-info  border-0 py-3 d-flex align-items-center"
                 style="background-color:#F1F1F1 !important;">
                <div>
                    <h3 class="card-title mb-0">ELIMINAR SERVIDORES PUBLICOS</h3>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('eliminaServidoresPublicos')}}" method="POST" enctype="multipart/form-data"
                      id="form">
                    {{csrf_field()}}
                    <div class="form-row custom-file">
                        <input type="file" class="custom-file-input" name="file" id="fileInput">
                        <label class="custom-file-label" for="customFile" data-browse="Cargar">Selecciona
                            archivo</label>
                    </div>
                    <div class="form-row text-center mt-3">
                        <div class="col-12">
                            {{ Form::button('<i>Eliminar</i>', ['type' => 'submit', 'class' => 'btn btn-primary', 'id' => 'btnSubmitForm'] )  }}
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
            $("#btnSubmitForm").click(function (event) {
                event.preventDefault();
                const confirmDelete = confirm("¿Estás seguro que quieres eliminar la información?");
                if (confirmDelete) {
                    $("#form").submit();
                }
            })
        });
    </script>
@endsection

