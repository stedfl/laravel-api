@extends('layouts.app')

@section('title')
    | Admin - Modifica
@endsection

@section('content')
    <div class="container w-100 d-flex justify-content-center px-2 py-5 create-editing">
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
            <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
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
                    <label for="type" class="form-label">Tipo </label>
                    <select class="form-select" aria-label="Default select example" name='type_id'>
                        <option value="">Selezionare tipo di progetto</option>
                        @foreach ($types as $type)
                            <option @if ($type->id == old('type_id', $project->type?->id)) selected @endif value="{{ $type->id }}" class="text-capitalize">
                                {{ $type->name }}</option>
                        @endforeach
                    </select>
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
                    <label for="cover_image" class="form-label">Immagine</label>
                    <input type="file" onchange="showImage(event)"
                        class="form-control @error('cover_image') is-invalid @enderror" name="cover_image" id="cover_image">
                    @error('cover_image')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <div class="thumb mt-2">
                        <img id="thumb_upload" src="{{ asset('storage/' . $project->cover_image) }}"
                            alt="{{ $project->image_original_name }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Modifica</button>
                <a class="btn btn-danger" href="{{ route('admin.projects.index') }}">Annulla e Torna alla Lista</a>
            </form>
        </div>
    </div>

    <script>
        ClassicEditor
            .create(document.querySelector('#summary'))
            .catch(error => {
                console.error(error);
            });

        function showImage(event) {
            const tagImage = document.getElementById('thumb_upload');
            tagImage.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
