@extends('layouts.page')

@section('page.content')

    <div class="container">
        <div class="row justify-center">
            <div class="col-md-10">
                <div class="card shadow">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
