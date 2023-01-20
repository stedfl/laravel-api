@extends('layouts.app')

@section('title')
    | Admin - Nuovo Progetto
@endsection

@section('content')
    <div class="container w-100 d-flex justify-content-center px-2 py-5 create-editing">
        <div class="main-wrap w-50">
            <h1 class="title fs-3">Nuovo Progetto</h1>
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nome *</label>
                    <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" id="name" placeholder="Scrivi qui il nome del progetto">
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="client_name" class="form-label">Cliente *</label>
                    <input type="text" class="form-control @error('client_name') is-invalid @enderror" name="client_name"
                        value="{{ old('client_name') }}" id="client_name" placeholder="Scrivi qui il nome del cliente">
                    @error('client_name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="summary" class="form-label">Riepilogo *</label>
                    <textarea class="form-control @error('summary') is-invalid @enderror" name="summary" id="summary"
                        placeholder="Scrivi qui il riepilogo del progetto">{{ old('summary') }}</textarea>
                    @error('summary')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="cover_image" class="form-label">Immagine</label>
                    <input type="file" onchange="showImage(event)"
                        class="form-control @error('cover_image') is-invalid @enderror" name="cover_image" id="cover_image">
                    @error('cover_image')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <div class="thumb mt-2">
                        <img id="thumb_upload" src="" alt="">
                    </div>
                </div>
                <button type="submit" class="btn btn-info">Invia</button>
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
