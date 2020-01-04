@extends('layouts.app')

@section('content')
<div  id="Rapp" class="container">
   <div class="form-group">
      <label for="usr">Name:</label>
      <input type="text" class="form-control" id="usr">
    </div>
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
                            <td><a class="pointer" title="View Review"  onclick="ViewPop('complain',{{$complain->id}},this)"><i class="fa fa-search"></i></a></td>

                        </tr>
                        @endforeach

                  </table>
                  <div class="width:400px;margin:auto;text-align:center;">{{$complains->links()  }}</div>
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


@endsection
