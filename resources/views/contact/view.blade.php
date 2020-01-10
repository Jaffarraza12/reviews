@extends('layouts.app')
@section('content')
<div  id="Rapp" class="container">
    <a href="{{url('/home')}}" class="btn btn-light">BACK</a>
    <div class="row justify-content-center">
        <div class="col">
          <contact-component></contact-component>
          </div>
      </div>
</div>
@endsection
