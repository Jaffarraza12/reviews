@extends('layouts.app')

@section('content')
<div  id="Rapp" class="container">
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
                    @foreach ($reviews as $rev)
                    <tr >
                        <td>{{$rev->name}}</td>
                        <td>{{$rev->product}}</td>
                        <td>{{$rev->vote}} <i class="fa fa-star"></i></td>
                        <td>{{date('M d y',strtotime($rev->created_at))}}</td>
                        <td><input type="checkbox"  data-toggle="toggle"></td>
                    </tr>
                    @endforeach
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
                        <th>Email </th>
                        <th>Number of Answer</th>
                        <th>Publish </th>
                    </tr>
                    @foreach($questions as $question)
                        <tr>
                          <th>{{$question->name}}</th>
                          <th>{{$question->email}} </th>
                          <th>{{$question->answerCount}}</th>
                          <th>{{date('M d y',strtotime($question->created_at))}}</th>
                      </tr>
                  @endforeach

                </table>
            </div>
        </div>
    </div>

    </div>



</div>



@endsection
