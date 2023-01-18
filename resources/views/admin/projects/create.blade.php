@extends('layouts.app')

@section('title')
    | Admin - Nuovo Progetto
@endsection

@section('content')
    <div class="container h-100 w-100 d-flex justify-content-center align-items-center p-3">
        <div class="main-wrap w-50">
            <h1 class="title">Nuovo Progetto</h1>
            <form action="{{ route('admin.projects.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="name"
                        placeholder="Scrivi qui il nome del progetto">
                </div>
                <div class="mb-3">
                    <label for="client_name" class="form-label">Cliente</label>
                    <input type="text" class="form-control" name="client_name" value="{{ old('client_name') }}"
                        id="client_name" placeholder="Scrivi qui il nome del cliente">
                </div>
                <div class="mb-3">
                    <label for="summary" class="form-label">Riepilogo</label>
                    <textarea class="form-control" name="summary" id="summary" placeholder="Scrivi qui il riepilogo">
                    </textarea>
                </div>
                <div class="mb-3">
                    <label for="cover_image" class="form-label">Immagine</label>
                    <input type="text" class="form-control" name="cover_image" value="{{ old('cover_image') }}"
                        id="cover_image" placeholder="Scrivi l'url dell'immagine">
                </div>
                <button type="submit" class="btn btn-info">Invia</button>
            </form>
        </div>
    </div>
@endsection
