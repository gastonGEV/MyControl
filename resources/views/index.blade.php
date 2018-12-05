@extends('layouts.app')

@section('style')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div id="container-body" class="container">
        @if(count($incidencias) == 0)
            <h1 class="title">{{ __('messages.incidences') }}</h1>
        @else
            <div>
                <h1 class="title">{{ __('messages.incidences') }}:
                @if (old('month') !== null)
                    {{ date("F", mktime(0, 0, 0,  old('month') , 1 , 0 )) }}
                @endif
                @if (old('year') !==null)
                    {{ date("Y", mktime(0, 0, 0, 1 , 1 , old('year') )) }} 
                @endif 
                </h1>
            </div>
        @endif
        <form method="POST" action="{{ route('search') }}">
            @csrf
            <div class="toolbar">
                <div class="div-toolbar">
                    <label class="label-toolbar">{{ __('messages.day') }}:</label>
                    <input class="txt-input{{ $errors->has('email') ? ' is-invalid' : '' }}" name="day" type="text" value="{{ old('day') }}" autocomplete="off">
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('day') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="div-toolbar">
                    <label>{{ __('messages.month') }}:</label>
                    <input class="txt-input{{ $errors->has('email') ? ' is-invalid' : '' }}" name="month" type="text" value="{{ old('month') }}" autocomplete="off">
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('month') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="div-toolbar">
                    <label>{{ __('messages.year') }}:</label>
                    <input class="txt-input{{ $errors->has('email') ? ' is-invalid' : '' }}" name="year" type="text" value="{{ old('year') }}" autocomplete="off">
                     @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('year') }}</strong>
                        </span>
                    @endif
                </div>
                <button class="btn btn-dark" type="submit"> 
                    {{ __('messages.find') }}
                </button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-sm table-hover">
                <thead class="thead-dark">
                    <tr>
                        {{-- <th scope="col"><p>ID</p></th> --}}
                        <th scope="col"><p class="text">{{ __('messages.description') }}</p></th>
                        <th scope="col"><p class="text">{{ __('messages.type') }}</p></th>
                        <th scope="col"><p class="text">{{ __('messages.methodPage') }}</p></th>
                        <th scope="col"><p class="text">{{ __('messages.mount') }}</p></th>
                        <th scope="col"><p class="text">{{ __('messages.date') }}</p></th>
                    </tr>
                </thead>
                <tbody>
                @if(isset($incidencias))
                @forelse ($incidencias as $incidencia)
                <tr>
                    {{-- <th scope="row"><p>{{ $incidencia->id }}</p></td> --}}
                    <td><p class="text">{{ $incidencia->desc }}</p></td>
                    <td><p class="text">{{ $incidencia->tipo->nombre }}</p></td>
                    <td><p class="text">{{ $incidencia->medioPago->nombre }}</p></td>
                    <td>
                        @if ($incidencia->tipo_incidencia_id == 1)
                            <span class="badge badge-pill badge-success"><p class="text">$ {{ $incidencia->monto }}</p></span>
                        @else
                            <span class="badge badge-pill badge-danger"><p class="text">$ {{ $incidencia->monto }}</p></span>
                        @endif 
                    </td>
                    <td><p class="text">{{ $incidencia->created_at }}</p></td>
                </tr>
                @empty
                <tr>
                    <td><p class="text">No hay incidencias!</p></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                @endforelse
                @endif
                </tbody>
            </table>
        </div>
       
        {{-- @if(isset($incidencias))
        <nav aria-label="Search results pages">
            <ul class="pagination  pagination-sm justify-content-center">
                <li class="page-item">
                    {{ $incidencias->links() }}
                </li>
            </ul>
        </nav>
        @endif --}}

    
    </div>
@endsection
