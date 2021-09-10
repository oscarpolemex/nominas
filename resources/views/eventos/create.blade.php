@extends("layouts.app")
@section("content")
    <div class="container mt-2">
        <div class="card">
            <div class="card-header" style="background-color:#F1F1F1 !important;">
                <h3 class="card-title mb-0">AGREGAR EVENTO</h3>
            </div>
            <div class="card-body">
                {!! Form::open(['route'=>'eventos.store', 'method'=>'POST', 'files' => true, 'role' => 'form', 'id' => 'formServidorPublico']) !!}
                    @include("eventos.form")
                {!! Form::close() !!}
            </div>
        </div>

    </div>
@endsection
