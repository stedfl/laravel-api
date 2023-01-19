@extends('layouts.app')

@section('title')
    | Admin - Dashboard
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-header">{{ __('Admin') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h1>Benvenuto {{ Auth::user()->name }}!</h1>

                        <p>Hai creato
                            <a href="{{route('admin.projects.index')}}">{{ $total_projects }}</a> progetti!
                            <i class="fa-solid fa-face-laugh-beam"></i>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
