@extends('layouts.app')

@section('content')
<div class="container">
    <div id="app" class="row justify-content-center">
        <div class="col-md-10">
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

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Recent Reviews</div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>Product</th>
                        <th>Person</th>
                        <th>Vote</th>
                        <th>Date </th>
                        <th>Publish </th>
                    </tr>
                    <tr v-for="r in reviews">
                        <th>[[r.product]]</th>
                        <th>[[r.name]]</th>
                        <th>[[r.vote]]</th>
                        <th>[[r.created_at]] </th>
                        <th><input  :checked="r.status"  data-toggle="toggle"> </th>
                    </tr>

                </table>
                <li v-for="r in reviews">
                   [[r.product]]<br/>
                   [[r.name]]<br/>
                   [[r.vote]]<br/>
                   [[r.created_at]] <br/>
                   <input  :checked="r.status"  data-toggle="toggle"> <br/>
                </li>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Recent Questions</div>
            <div class="card-body">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Question</th>
                        <th>Vote</th>
                        <th>Date </th>
                        <th>Publish </th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    </div>


</div>
@endsection

