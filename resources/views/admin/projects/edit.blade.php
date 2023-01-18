@extends('layouts.app')

@section('title')
    | Admin - Modifica
@endsection

@section('content')
    <div class="container h-100 w-100 d-flex justify-content-center align-items-center p-3">
        <div class="main-wrap w-50">
            <h1 class="title text-capitalize fs-3">Modifica Progetto "{{$project->name}}"</h1>
            <form action="{{ route('admin.projects.update', $project) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $project->name) }}" id="name"
                        placeholder="Modifica qui il nome del progetto">
                </div>
                <div class="mb-3">
                    <label for="client_name" class="form-label">Cliente</label>
                    <input type="text" class="form-control" name="client_name" value="{{ old('client_name', $project->client_name) }}"
                        id="client_name" placeholder="Modifica qui il nome del cliente">
                </div>
                <div class="mb-3">
                    <label for="summary" class="form-label">Riepilogo</label>
                    <textarea class="form-control" name="summary" id="summary" placeholder="Modifica qui il riepilogo">
                        {{$project->summary}}
                    </textarea>
                </div>
                <div class="mb-3">
                    <label for="cover_image" class="form-label">Immagine</label>
                    <input type="text" class="form-control" name="cover_image" value="{{ old('cover_image', $project->cover_image) }}"
                        id="cover_image" placeholder="Modifica l'url dell'immagine">
                </div>
                <button type="submit" class="btn btn-warning">Invia</button>
                <a class="btn btn-danger" href="{{route('admin.projects.index')}}">Annulla e Torna alla Lista</a>
            </form>
        </div>
    </div>
@endsection
