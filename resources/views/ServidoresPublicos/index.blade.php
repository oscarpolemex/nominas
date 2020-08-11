@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header bg-info  border-0 py-3 d-flex align-items-center"
                 style="background-color:#F1F1F1 !important;">
                <img src="{{url('IMG/escuela.png')}}" class="rounded-circle align-self-start mr-3" width="45px">
                <div class="col-11">
                    <h3 class="card-title mb-0">SERVIDORES PUBLICOS</h3>
                </div>
                <div class="1">
                    <button class="btn btn-primary mr-5" onclick="location.href='{{route('ServidoresPublicos.create')}}'">
                        <i class="fa fa-pencil"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table class="table" style="font-size:150%">
                    <tr>
                        <th>CURP</th>
                        <th>Nombre</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                    @foreach($servidoresPublicos as $item)
                        <tr>
                            <td>{{$item->curp}}</td>
                            <td>{{$item->nombre}}</td>
                            <td>{{$item->c_electronico}}</td>
                            <td>
                                <button class="btn btn-warning btn-sm" onclick="location.href='{{route('ServidoresPublicos.edit',$item->id)}}'"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-success btn-sm"><i class="fa fa-file"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
