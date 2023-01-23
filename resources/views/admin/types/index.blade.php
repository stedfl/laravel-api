@extends('layouts.app')

@section('title')
    | Admin - Tipi
@endsection

@section('content')
    <div class="container-fluid h-100 d-flex justify-content-center">
        <div class="main-wrap w-50 h-100 py-5">
            <div class="title d-flex align-items-center mb-3">
                <h1 class="me-5 fs-5">GESTIONE TIPI</h1>
            </div>
            @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {!! session('message') !!}
                </div>
            @endif

            <table class="table bg-white">
                <thead>
                    <tr>
                        <th scope="col">Tipo</th>
                        <th scope="col">Totale Progetti</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($types as $type)
                        <tr>
                            <td scope="row">
                                <form class="d-flex w-50" action="" method="post">
                                    <input class="form-control border-0 w-75" type="text" name="name" value="{{$type->name}}">
                                    <button class="btn btn-warning ms-2" type="submit"><i class="fa-solid fa-pen-to-square"></i></button>
                                </form>
                            </td>
                            <td>
                                <span class="badge text-bg-success">{{count($type->projects)}}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
