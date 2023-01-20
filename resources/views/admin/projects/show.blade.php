@extends('layouts.app')

@section('title')
    |Admin - Dettaglio
@endsection

@section('content')
    <div class="show container d-flex justify-content-center align-items-center flex-column">
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                <p>{{ session('message') }}</p>
            </div>
        @endif

        <div class="dc-card d-flex align-items-center">
            <div class="card-image">
                <img src="{{asset('storage/'.$project->cover_image)}}" class="card-img-top" alt="{{ $project->image_original_name }}">
                <i class="image-name">{{$project->image_original_name}}</i>
            </div>

            <div class="card-body p-4">
                <h5 class="card-title fw-bold text-center text-uppercase text-primary">{{ $project->name }}</h5>
                <h6 class="mt-3 fw-semibold"><i class="fa-solid fa-book me-1"></i>Riepilogo:</h6>
                <p class="card-text">{!! $project->summary !!}</p>
                <ul class="ps-0">
                    <li class="text-capitalize"><span class="fw-semibold"><i
                                class="fa-solid fa-building me-1"></i>Cliente:</span> {{ $project->client_name }}</li>
                </ul>
                <div class="buttons mt-5">
                    <a class="btn btn-warning" title="edit" href="{{ route('admin.projects.edit', $project) }}"><i
                            class="fa-solid fa-pen"></i></i></a>
                    @include('admin.partials.delete-form')
                </div>
            </div>
        </div>
        <div class="actions my-4">
            <a href="{{ route('admin.projects.index') }}" class="btn btn-primary"><i class="fa-solid fa-list me-1"></i>Lista
                Progetti</a>
        </div>
    </div>
@endsection
