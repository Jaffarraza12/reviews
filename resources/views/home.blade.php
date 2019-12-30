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
                        <td><label class="switch">
                            <input onclick="ChangeStatus('review',{{$rev->id}},this)" type="checkbox" @if($rev->status ) checked @endif />
                            <span class="slider round"></span>
                          </label></td>
                        <td><a class="pointer" title="View Review" onclick="ViewPop('review',{{$rev->id}},this)"><i class="fa fa-search"></i></a></td>
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
                        <th></th>
                    </tr>
                    @foreach($questions as $question)
                        <tr>
                          <td>{{$question->name}}</td>
                          <td>{{$question->email}} </td>
                          <td>{{$question->answerCount}}</td>
                          <td><label class="switch">
                              <input onclick="ChangeStatus('question',{{$question->id}},this)" type="checkbox" @if($question->status ) checked @endif />
                              <span class="slider round"></span>
                            </label></td>
                          <td><a class="pointer" title="View Review" data-toggle="modal" data-target="#viewReview"><i class="fa fa-search"></i></a></td>

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
                       <th> </th>
                   </tr>
                   @foreach($contacts as $cont)
                       <tr>
                         <td>{{$cont->name}}</th>
                         <td>{{$cont->email}} </td>
                         <td>{{$cont->phone_number}}</td>
                         <td>{{date('M d y',strtotime($cont->created_at))}}</td>
                         <td><a class="pointer" title="View Review" data-toggle="modal" data-target="#viewReview"><i class="fa fa-search"></i></a></td>

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
                     <th></th>
                 </tr>

                 @foreach($warranties as $warranty)
                     <tr>
                       <td>{{$warranty->first_name .' '.$warranty->last_name}}</td>
                       <td>{{$warranty->email}} </td>
                       <td>{{$warranty->purchase_from}}</td>
                       <td><a class="pointer" title="View Review" data-toggle="modal" data-target="#viewReview"><i class="fa fa-search"></i></a></td>

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
                          <th></th>
                      </tr>
                      @foreach($complains as $complain)
                          <tr>
                            <td>{{$complain->name }}</td>
                            <td>{{$complain->order}} </td>
                            <td>{{$complain->type}}</td>
                            <td><a class="pointer" title="View Review" data-toggle="modal" data-target="#viewReview"><i class="fa fa-search"></i></a></td>

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
                            <td>{{$ret->company_name }}</td>
                            <td>{{$ret->name }} </td>
                            <td>{{$ret->phone_number }} </td>
                            <td>{{$ret->email }} </td>
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
                           <th></th>
                       </tr>
                       @foreach($products as $product)
                           <tr>
                             <td>{{$product->name }}</td>
                             <td>{{$product->email}} </td>
                             <td>{{$product->model}}</td>
                             <td>{{$product->price}}</td>
                             <td><a class="pointer" title="View Review" data-toggle="modal" data-target="#viewReview"><i class="fa fa-search"></i></a></td>
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
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<script>
function ChangeStatus(type,id,elem){
  sta= 0
  path = ''
  if($(elem).is(':checked')){sta =1} else {sta =0}
  if(type=='review'){
    path = "/public/api/review/"+id
  } else if(type=='question'){
    path = "/public/api/question/"+id
  }
  $.ajax({
  url: path,
  method: "POST",
  data: { 'status': sta,'id':id,'_method':'PUT' }
}).done(function() {
  $( this ).addClass( "done" );
});


}

function ViewPop(type,id,elem){
  path = ''
  if(type=='review'){
    path = "/public/review/html/"+id
  } elseif(type=='question'){
    path = "/public/question/html/"+id
  }
   $.ajax({
   url: path,
   method: "GET",
   data: { 'id':id,'_method':'GET' }
 }).done(function(resp) {
   rep = $.parseJSON(resp)
   $('.modal-body').html(rep.html)
   $('#exampleModalLabel').html(type.toUpperCase())
   $('#viewReview').modal('show')

 })


}

</script>


@endsection
