@extends('app')

@section('content')
    <div class="container w-25 border p-4 mt-4">
        <form action="{{route('tareas')}}" method="POST">
            @csrf

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @error('nombre')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>     
            @enderror

            <div class="mb-3">
                <label for="nombre" class="form-label">Tarea</label>
                <input type="text" name="nombre" class="form-control" >
            </div>
            <select name="categoria_id" class="form-select">
                @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">Crear nueva tarea</button>
        </form>

        <div>
            @foreach ($tareas as $tarea)
                <div class="row py-1">
                    <div class="col-md-9 d-flex align-items-center">
                        <a href="{{ route('tareas-show', ['id' => $tarea->id]) }}">{{$tarea->nombre}}</a>
                    </div>

                    <div class="col-md-3 d-flex justify-content-end">
                        <form action="{{ route('tareas-destroy', [$tarea->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection