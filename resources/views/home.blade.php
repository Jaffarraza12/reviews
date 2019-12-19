@extends('layouts.app')

@section('content')
<style>
@media only screen and (max-width: 720px)  {

  .card{
    margin-bottom: 20px;
  }

  .table{
    display: block;
    overflow: hidden;
    overflow-x: scroll;;
  }

}


</style>
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
                          <th><input type="checkbox"  data-toggle="toggle"></th>
                      </tr>
                  @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    </div>

    <div class="clearfix"></div>
    <br/>

    <div class="row justify-content-center">
       <div class="col">
         <div class="card">
             <div class="card-header">Contact Us Quries</div>
             <div class="card-body">
               <table class="table">
                   <tr>
                       <th>Name</th>
                       <th>Email </th>
                       <th>Phone</th>
                       <th>Publish Date </th>
                   </tr>
                   @foreach($contacts as $cont)
                       <tr>
                         <th>{{$cont->name}}</th>
                         <th>{{$cont->email}} </th>
                         <th>{{$cont->phone_number}}</th>
                         <th>{{date('M d y',strtotime($cont->created_at))}}</th>
                     </tr>
                     @endforeach

               </table>
             </div>
       </div>

     </div>
     <br/>
     <div class="col">
       <div class="card">
           <div class="card-header">Warranty Claims</div>
           <div class="card-body">
             <table class="table">
                 <tr>
                     <th>Full Name</th>
                     <th>Email </th>
                     <th>Purchase From</th>
                 </tr>
                 @foreach($warranties as $warranty)
                     <tr>
                       <th>{{$warranty->first_name .' '.$warranty->last_name}}</th>
                       <th>{{$warranty->email}} </th>
                       <th>{{$warranty->purchase_from}}</th>
                   </tr>
                   @endforeach

             </table>
           </div>
     </div>

   </div>

    </div>



</div>



@endsection
