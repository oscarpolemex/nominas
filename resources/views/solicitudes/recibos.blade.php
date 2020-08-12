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
              @if($servidor->recibos)
              
                <table class="table">
    <thead>
    <tr>
      <th scope="col"> Tipo de Recibo </th>
      <th scope="col"> Número de Recibo </th>
      <th scope="col"> Fecha </th>
      <th scope="col"> Documento </th>
    </tr>
    </thead>
    <tbody>
        @foreach($servidor->recibos as $item)
          <tr> 
             <td>{{$item->tipoRecibo->nombre}}</td>
             <td>{{$item->consecutivo}}</td>
             <td>{{$item->created_at}}</td>
             <td>{{$item->documentos->nombre}}</td>
             <td>{{$item->documentos->nombre}}</td>
             <td><button class="btn btn sm fa fa-search"></button></td>
        @endforeach
    </tbody>
</table>
              @else
                <h1>No hay documentos</h1>
              @endif
            </div>
        </div>
    </div>

@endsection