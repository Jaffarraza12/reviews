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
                        <th> </th>

                    </tr>
                    @foreach ($reviews as $rev)
                    <tr >
                        <td>{{$rev->name}}</td>
                        <td>{{$rev->product}}</td>
                        <td>{{$rev->vote}} <i class="fa fa-star"></i></td>
                        <td>{{date('M d y',strtotime($rev->created_at))}}</td>
                        <td><input type="checkbox"  data-toggle="toggle">  </td>
                        <td><a class="pointer" title="View Review" data-toggle="modal" data-target="#viewReview"><i class="fa fa-search"></i></a></td>
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


        <div class="clearfix"></div>
        <br/>

        <div class="row justify-content-center">

          <div class="col">
            <div class="card">
                <div class="card-header">Complain Box</div>
                <div class="card-body">
                  <table class="table">
                      <tr>
                          <th>Full Name</th>
                          <th>Order Date</th>
                          <th>Type</th>
                      </tr>
                      @foreach($complains as $complain)
                          <tr>
                            <th>{{$complain->compay_name }}</th>
                            <th>{{$complain->order}} </th>
                            <th>{{$complain->type}}</th>
                        </tr>
                        @endforeach

                  </table>
                </div>
              </div>
          </div>
          <div class="col">
            <div class="card">
                <div class="card-header">Retailer Quries</div>
                <div class="card-body">
                  <table class="table">
                      <tr>
                          <th>Company</th>
                          <th>Name</th>
                          <th>Phone</th>
                          <th>Email</th>
                      </tr>
                      @foreach($retailer as $ret)
                          <tr>
                            <th>{{$ret->company_name }}</th>
                            <th>{{$ret->name }} </th>
                            <th>{{$ret->phone_number }} </th>
                            <th>{{$ret->email }} </th>
                        </tr>
                      @endforeach

                  </table>
                </div>
              </div>


          </div>



        </div>

        <div class="clearfix"></div>
        <br/>

        <div class="row justify-content-center">
           <div class="col">
             <div class="card">
                 <div class="card-header">Product Registration</div>
                 <div class="card-body">
                   <table class="table">
                       <tr>
                           <th> Name</th>
                           <th>Email</th>
                           <th>Product</th>
                           <th>Price</th>
                       </tr>
                       @foreach($products as $product)
                           <tr>
                             <th>{{$product->name }}</th>
                             <th>{{$product->email}} </th>
                             <th>{{$product->model}}</th>
                             <th>{{$product->price}}</th>
                         </tr>
                         @endforeach

                   </table>
                 </div>
               </div>


           </div>
        </div>





</div>
<div class="modal fade" id="viewReview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>






@endsection
