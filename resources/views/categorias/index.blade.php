@extends('app')

@section('content')
    <div class="container w-25 border p-4 mt-4">
        <form action="{{route('categorias.store')}}" method="POST">
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
                <input type="text" name="nombre" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="color" class="form-label">Color Categoria</label>
                <input type="color" name="color" class="form-control" title="Elige tu color">
            </div>
            <button type="submit" class="btn btn-primary">Crear categoria</button>
        </form>

        <div>
            @foreach ($categorias as $categoria)
                <div class="row py-1">
                    <div class="col-md-9 d-flex align-items-center">
                        <a href="{{ route('categorias.show', ['categoria' => $categoria->id]) }}">
                            <span class="color-container" style="background-color: {{ $categoria->color }}"></span> {{ $categoria->nombre }}
                        </a>
                    </div>

                    <div class="col-md-3 d-flex justify-content-end">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal{{$categoria->id}}">
                            Eliminar
                        </button>
                    </div>
                </div>
                

                <!-- Modal -->
                <div class="modal fade" id="modal{{$categoria->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar Categoria</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Al eliminar la categoría <strong>{{ $categoria->nombre }}</strong> se eliminan todas las tareas asignadas a la misma. 
                        ¿Está seguro que desea eliminar la categoría <strong>{{ $categoria->nombre }}</strong>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <form action="{{ route('categorias.destroy', ['categoria' => $categoria->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                    </div>
                </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection