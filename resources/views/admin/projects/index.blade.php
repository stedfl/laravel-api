@extends('layouts.app')

@section('title')
    | Admin - Progetti
@endsection

@section('content')
    <div class="container-fluid h-100 d-flex justify-content-center">
        <div class="main-wrap w-75 h-100 py-4">
            <div class="title d-flex align-items-center">
                <h1 class="mb-3 me-5">Lista Progetti</h1>
                <a class="btn btn-success" href="#"><i class="fa-solid fa-plus"></i></a>
            </div>
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
                            <td>{{$project->name}}</td>
                            <td>{{$project->client_name}}</td>
                            <td>bottoni</td>
                            <td>
                                <a class="btn btn-primary" title="show" href="{{route('admin.projects.show', $project->id)}}"><i
                                        class="fa-solid fa-eye"></i></a>
                                <a class="btn btn-warning" title="edit" href="#"><i
                                        class="fa-solid fa-pen"></i></i></a>


                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$projects->links()}}
        </div>

    </div>
@endsection
