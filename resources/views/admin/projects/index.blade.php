@extends('layouts.app')

@section('title')
    | Admin - Progetti
@endsection

@section('content')
    <div class="container-fluid h-100 d-flex justify-content-center">
        <div class="main-wrap w-75 h-100 py-4">
            <div class="title d-flex align-items-center mb-3">
                <h1 class="me-5 fs-5">LISTA PROGETTI</h1>
                <a class="btn btn-success" href="{{route('admin.projects.create')}}"><i class="fa-solid fa-plus"></i></a>
            </div>
            @if(session('is_deleted'))
                <div class="alert alert-success" role="alert">
                    {{session('is_deleted')}}
                </div>
            @endif



            <table class=" table bg-white table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <th scope="row">{{$project->id}}</th>
                            <td class="text-uppercase">{{$project->name}}</td>
                            <td>{{$project->client_name}}</td>
                            <td>
                                <a class="btn btn-info" title="show" href="{{route('admin.projects.show', $project)}}"><i
                                        class="fa-solid fa-eye"></i></a>
                                <a class="btn btn-warning" title="edit" href="{{route('admin.projects.edit', $project)}}"><i
                                        class="fa-solid fa-pen"></i></i></a>
                                @include('admin.partials.delete-form')
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$projects->links()}}
        </div>

    </div>
@endsection
