@extends('layouts.app')

@section('style')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div id="container-body" class="container">
        <h1 class="title">Tabla Incidencias</h1>
        <div class="table-responsive">
            <table class="table table-sm table-hover">
                <thead class="thead-dark">
                    <tr>
                        {{-- <th scope="col">ID</th> --}}
                        <th scope="col">Descripcion</td>
                        <th scope="col">Tipo</td>
                        <th scope="col">MedioPago</td>
                        <th scope="col">Monto</td>
                        <th scope="col">Fecha</td>
                    </tr>
                </thead>
                <tbody>
                @forelse ($incidencias as $incidencia)
                <tr>
                    {{-- <th scope="row">{{ $incidencia->id }}</td> --}}
                    <td>{{ $incidencia->desc }}</td>
                    <td>{{ $incidencia->tipo->nombre }}</td>
                    <td>{{ $incidencia->medioPago->nombre }}</td>
                    <td>
                        $
                        @if ($incidencia->tipo_incidencia_id == 1)
                            <span class="badge badge-pill badge-success">{{ $incidencia->monto }}</span>
                        @else
                            <span class="badge badge-pill badge-danger">{{ $incidencia->monto }}</span>
                        @endif 
                    </td>
                    <td>{{ $incidencia->created_at }}</td>
                </tr>
                @empty
                    <td>No hay incidencias!</td>
                @endforelse
                </tbody>
            </table>
        </div>
       
        <nav aria-label="Search results pages">
            <ul class="pagination  pagination-sm justify-content-center">
                <li class="page-item">
                    {{ $incidencias->links() }}
                </li>
            </ul>
        </nav>
        

    
    </div>
@endsection
