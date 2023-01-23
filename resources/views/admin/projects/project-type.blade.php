@extends('layouts.app')

@section('title')
    | Admin - Progetti per Tipo
@endsection

@section('content')
    <div class="container-fluid h-100 d-flex justify-content-center">
        <div class="main-wrap w-75 h-100 py-5">
            <div class="title d-flex align-items-center mb-3">
                <h1 class="me-5 fs-5">LISTA PROGETTI PER TIPOLOGIA</h1>
            </div>

            <table class=" table bg-white table-striped">
                <thead>
                    <tr>
                        <th scope="col">Tipologia</th>
                        <th scope="col">Progetto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($types as $type)
                        <tr>
                            <td scope="row">
                                <span class="badge text-bg-info text-capitalize fs-6">{{ $type->name }}</span>
                            </td>
                            <td>
                                <ul>
                                    @foreach ($type->projects as $project)
                                        <li class="text-capitalize">
                                            <a href="{{route('admin.projects.show', $project)}}">{{ $project->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
