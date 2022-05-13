@extends('app')

@section('content')
    <div class="container w-25 border p-4 mt-4">
        <form action="{{route('categorias.update', ['categoria'=>$categoria->id])}}" method="POST">
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

            @error('color')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre Categoria</label>
                <input type="text" name="nombre" class="form-control" value="{{$categoria->nombre}}">
            </div>
            <div class="mb-3">
                <label for="color" class="form-label">Color Categoria</label>
                <input type="color" name="color" class="form-control" title="Elige tu color" value="{{$categoria->color}}">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar categoria</button>
        </form>

        <div>
            @if ($categoria->tareas->count()>0)
                @foreach ($categoria->tareas as $tarea)
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
            @else
                No hay tareas para esta categoria
            @endif
        </div>
    </div>
@endsection