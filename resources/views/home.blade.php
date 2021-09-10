@extends('layouts.app')
@section("content")
    <div class="container mt-2">
        <div class="row">
            <div class="col col-sm-12 col-lg-4">
                <!-- User Statistics -->
                <div class="card user-statistics-card animate fadeLeft">
                    <div class="card-header">
                        <h5 class="ml-1 mt-1 mb-0">
                            Solicitudes de registro
                        </h5>
                    </div>
                    <div class="card-content">
                        <h3 class="ml-3 mt-2">Total: {{$solicitudes}}</h3>
                    </div>
                </div>
            </div>
            <div class="col col-sm-12 col-lg-4">
                <!-- User Statistics -->
                <div class="card user-statistics-card animate fadeLeft">
                    <div class="card-header">
                        <h5 class="ml-1 mt-1 mb-0">
                            Usuarios validados
                        </h5>
                    </div>
                    <div class="card-content">
                        <h3 class="ml-3 mt-2">Total: {{$validado}}</h3>
                    </div>
                </div>
            </div>
            <div class="col col-sm-12 col-lg-4">
                <!-- User Statistics -->
                <div class="card user-statistics-card animate fadeLeft">
                    <div class="card-header">
                        <h5 class="ml-1 mt-1 mb-0">
                            Archivos cargados
                        </h5>
                    </div>
                    <div class="card-content">
                        <h3 class="ml-3 mt-2">Total: {{$archivos}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

