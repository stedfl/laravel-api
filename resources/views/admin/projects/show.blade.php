@extends('layouts.app')

@section('title')
    |Admin - Dettaglio
@endsection

@section('content')
    <div class="show container d-flex justify-content-center align-items-center flex-column">
        <div class="dc-card d-flex align-items-center">
            <img src="{{ $project->cover_image }}" class="card-img-top" alt="{{ $project->name }}">
            <div class="card-body p-4">
                <h5 class="card-title fw-bold text-center text-uppercase text-primary">{{ $project->name }}</h5>
                <h6 class="mt-3 fw-semibold"><i class="fa-solid fa-book me-1"></i>Riepilogo:</h6>
                <p class="card-text">{!! $project->summary !!}</p>
                <ul class="ps-0">
                    <li class="text-capitalize"><span class="fw-semibold"><i class="fa-solid fa-building me-1"></i>Cliente:</span> {{ $project->client_name }}</li>
                </ul>
                <a class="btn btn-warning mt-5" title="edit" href="{{route('admin.projects.edit', $project)}}"><i
                    class="fa-solid fa-pen"></i></i></a>
            </div>
        </div>
        <div class="actions my-4">
            <a href="{{route('admin.projects.index')}}" class="btn btn-primary"><i class="fa-solid fa-list me-1"></i>Lista Progetti</a>
        </div>
    </div>
@endsection
