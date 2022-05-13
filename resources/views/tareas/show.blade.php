@extends('app')

@section('content')
    <div class="container w-25 border p-4 mt-4">
        <form action="{{route('tareas-update', ['id'=> $tarea->id])}}" method="POST">
            @method('PATCH')
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
                <input type="text" name="nombre" class="form-control" value="{{$tarea->nombre}}">
            </div>
            <select name="categoria_id" class="form-select">
                @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">Crear nueva tarea</button>
        </form>

    </div>
@endsection