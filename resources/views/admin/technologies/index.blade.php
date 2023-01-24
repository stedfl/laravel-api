@extends('layouts.app')

@section('title')
    | Admin - Tecnologie
@endsection

@section('content')
    <div class="container-fluid h-100 d-flex justify-content-center index-tech">
        <div class="main-wrap w-75 h-100 py-5">
            <div class="title">
                <h1 class="fs-5 mb-4">GESTIONE TECNOLOGIE</h1>
                <form class="input-group mb-3" action="{{ route('admin.technologies.store') }}" method="post">
                    @csrf
                    <div class="me-3">
                        <label for="name" class="form-label me-1">Nome *</label>
                        <input type="text" name="name" class="form-control" placeholder="Scrivi il nome"
                            aria-label="Recipient's username" aria-describedby="button-addon2">
                    </div>
                    <div class="me-3">
                        <label for="logo" class="form-label me-1">Logo</label>
                        <input type="text" name="logo" class="form-control" placeholder="Inserisci l'url del logo">
                    </div>
                    <div class="me-3">
                        <label for="thumb" class="form-label me-1">Miniatura</label>
                        <div class="d-flex">
                            <input type="text" name="thumb" class="form-control"
                                placeholder="Inserisci l'url della miniatura">
                            <button class="btn btn-secondary ms-4" type="submit"><i
                                    class="fa-regular fa-square-plus"></i></button>
                        </div>

                    </div>

                </form>
            </div>
            @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {!! session('message') !!}
                </div>
            @endif
            <table class="table bg-white border-collapse">
                <thead>
                    <tr>
                        <th scope="col">Tecnologia</th>
                        <th scope="col">Logo</th>
                        <th scope="col">Miniatura</th>
                        <th scope="col">Totale Progetti</th>
                        <th scope="col">Eliminazione</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($technologies as $technology)
                        <tr>
                            <td class="form-name pe-4">
                                <form class="d-flex justify-content-between me-2"
                                    action="{{ route('admin.technologies.update', $technology) }}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <input class="form-control border-0 w-75 text-capitalize" type="text" name="name"
                                        value="{{ $technology->name }}">
                                    <button class="btn btn-warning ms-2" type="submit"><i
                                            class="fa-solid fa-pen-to-square"></i></button>
                                </form>
                            </td>
                            <td>
                                @if ($technology->logo)
                                    <img src="{{ $technology->logo }}" alt="{{ $technology->name }}">
                                    <a data-bs-toggle="modal" data-bs-target="#modal-{{ "logo-$technology->id" }}">
                                        <i class="fa-solid fa-pencil text-warning ms-1"></i>
                                    </a>
                                    @include('admin.partials.edit-images', [
                                        'entity' => 'logo',
                                    ])
                                @else
                                    <a data-bs-toggle="modal" data-bs-target="#modal-{{ "logo-$technology->id" }}">
                                        <i class="fa-solid fa-circle-plus text-warning"></i>
                                    </a>
                                    @include('admin.partials.edit-images', [
                                        'entity' => 'logo',
                                    ])
                                @endif
                            </td>
                            <td>
                                @if ($technology->thumb)
                                    <img src="{{ $technology->thumb }}" alt="thumb {{ $technology->name }}">
                                    <a data-bs-toggle="modal" data-bs-target="#modal-{{ "thumb-$technology->id" }}">
                                        <i class="fa-solid fa-pencil text-warning ms-1"></i>
                                    </a>
                                    @include('admin.partials.edit-images', [
                                        'entity' => 'thumb',
                                    ])
                                @else
                                    <a data-bs-toggle="modal" data-bs-target="#modal-{{ "thumb-$technology->id" }}">
                                        <i class="fa-solid fa-circle-plus text-warning"></i>
                                    </a>
                                    @include('admin.partials.edit-images', [
                                        'entity' => 'thumb',
                                    ])
                                @endif
                            </td>
                            <td>
                                <span class="badge text-bg-success">{{ count($technology->projects) }}</span>
                            </td>
                            <td>
                                @include('admin.partials.delete-form', [
                                    'entity' => $technology,
                                    'title' => 'tecnologia del Progetto',
                                    'message_modal' => "Confermi l'eliminazione della tecnologia <span class=\"fw-bolder text-capitalize\"> $technology->name</span>?",
                                    'route' => 'technologies',
                                ])
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
