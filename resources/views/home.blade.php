@extends('layouts.app')

@section('content')
<div  id="app" class="container">
    <div class="row justify-content-center">
    <div class="col">
            <div class="card">

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
    <br/>

    <div class="row justify-content-center">
    <div class="col">
        <div class="card">
            <div class="card-header">Recent Reviews</div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>Name</th>
                        <th>Product</th>
                        <th>Vote</th>
                        <th>Date </th>
                        <th>Publish </th>
                    </tr>
                    <tr v-for="rev in review">
                        <td>[[rev.name]]</td>
                        <td>[[rev.product]]</td>
                        <td>[[rev.vote]] <i class="fa fa-star"></i></td>
                        <td></td>
                        <td><input type="checkbox"  data-toggle="toggle"></td>
                    </tr>
                </table>

            </div>

        </div>
    </div>

    <div class="col">
        <div class="card">
            <div class="card-header">Recent Questions</div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Question</th>
                        <th>Number of Answer/th>
                        <th>Publish </th>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    </div>



</div>



<script src="{{ asset('js/home.js') }}"></script>
@endsection
