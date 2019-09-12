@extends('layouts.app')

@section('content')
<div class="container">
    <div id="app" class="row justify-content-center">
    <div class="col-md-12">
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
    <br/>
    <div class="clearfix"></div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Recent Reviews</div>
            <div class="card-body">
                [[data]]

                <table class="table">
                    <tr>
                        <th>Name</th>
                        <th>Product</th>
                        <th>Vote</th>
                        <th>Date </th>
                        <th>Publish </th>
                    </tr>
                    <tr v-for="rev in items">
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

