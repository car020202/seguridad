@extends('layouts.app')

@section('content')
<div class="container-fluid bg-dark text-white" style="min-height: 100vh;"> <!-- Fondo gris oscuro -->
    <div class="row justify-content-center pt-5">
        <div class="col-md-8">
            <div class="card bg-light shadow"> <!-- Fondo claro para que contraste con el fondo oscuro -->
                <div class="card-header bg-primary text-white">{{ __('Lista de Autos') }}</div> <!-- Encabezado con color primario -->
                
                <div class="card-body">
                    <h3>Autos</h3>
                    <form action="{{ route('tasks.store') }}" method="POST" class="mb-3">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" name="name" placeholder="Nuevo Auto" required>
                            <button type="submit" class="btn btn-success">Agregar</button>
                        </div>
                    </form>

                    <ul class="list-group">
                        @foreach ($tasks as $task)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="d-inline-flex">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" class="form-control me-2" name="name" value="{{ $task->name }}" required>
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                </form>

                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline-flex">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
