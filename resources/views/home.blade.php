@extends('layouts.app')

@section('content')
<div class="container">
    <div id="app" class="row justify-content-center">
        <div class="col-md-2">
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
                <table>
                    <tr>
                        <th>Product</th>
                        <th>Person</th>
                        <th>Vote</th>
                        <th>Date </th>
                        <th>Publish </th>
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
<script>
    $(function() {
        $('#toggle-one').bootstrapToggle();
    })
</script>
