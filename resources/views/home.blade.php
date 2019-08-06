@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <nav style="background: #e5e5e5">
                <ul>
                    <li>Home</li>
                    <li>Add Review</li>
                    <li>List Review</li>
                    <li>Question & Answer</li>
                    <li>View Recommendation</li>
                </ul>
            </nav>
        </div>
        <div class="col-md-8">
            <div class="card">
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
