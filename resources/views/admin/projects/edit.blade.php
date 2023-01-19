@extends('layouts.app')

@section('title')
    | Admin - Modifica
@endsection

@section('content')
    <div class="container h-100 w-100 d-flex justify-content-center align-items-center p-3 create-editing">
        <div class="main-wrap w-50">
            <h1 class="title text-capitalize fs-3">Modifica Progetto "{{ $project->name }}"</h1>
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.projects.update', $project) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="name" class="form-label">Nome *</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name', $project->name) }}" id="name"
                        placeholder="Modifica qui il nome del progetto">
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="client_name" class="form-label">Cliente *</label>
                    <input type="text" class="form-control @error('client_name') is-invalid @enderror" name="client_name"
                        value="{{ old('client_name', $project->client_name) }}" id="client_name"
                        placeholder="Modifica qui il nome del cliente">
                    @error('client_name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="summary" class="form-label">Riepilogo *</label>
                    <textarea class="form-control @error('summary') is-invalid @enderror" name="summary" id="summary"
                        placeholder="Modifica qui il riepilogo del progetto">{{ old('summary', $project->summary) }}</textarea>
                    @error('summary')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="cover_image" class="form-label">Immagine *</label>
                    <input type="text" class="form-control @error('cover_image') is-invalid @enderror" name="cover_image"
                        value="{{ old('cover_image', $project->cover_image) }}" id="cover_image"
                        placeholder="Modifica l'url dell'immagine">
                    @error('cover_image')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Modifica</button>
                <a class="btn btn-danger" href="{{ route('admin.projects.index') }}">Annulla e Torna alla Lista</a>
            </form>
        </div>
    </div>

    <script>
        ClassicEditor
            .create( document.querySelector( '#summary' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>


@endsection
