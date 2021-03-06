<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Http\Models\Review;

class ReviewsController extends Controller
{
    //
    public function index(Request $request)
    {
        $review = array();
        $filter = array();
        $rev = Review::where('status',1);
        if(isset($request->product)){
             $rev->where('product','=',$request->product);
             $filter['product'] =$request->product;
        }
        $filter['operation'] = 'c';
        $review['total_reviews'] = $this->aggregate($filter);
        $filter['operation'] = 'a';
        $review['avg_rating'] = $this->aggregate($filter);
        $filter['operation'] = 'c';
        $filter['vote'] = 5 ;
        $review['star5'] = $this->aggregate($filter);
        $filter['vote'] = 4 ;
        $review['star4'] = $this->aggregate($filter);
        $filter['vote'] = 3 ;
        $review['star3'] = $this->aggregate($filter);
        $filter['vote'] = 2 ;
        $review['star2'] = $this->aggregate($filter);
        $filter['vote'] = 1 ;
        $review['star1'] = $this->aggregate($filter);
        $filter['recommend'] = 1;
        unset($filter['vote']);
         $review['total_recommend'] = $this->aggregate($filter);
        $review['reviews'] = $rev->orderBy('id','desc')->get();
        return response()->json($review,200);
    }

    public function show(Review $review)
    {
        return $review;
    }

    public function store(Request $request)
    {

        $review = Review::create($request->all());

        return response()->json($review, 201);
    }

    public function update(Request $request, Review $review)
    {
        $req = array(
          'status' => $request->status);

        $review->where('id',$request->id )->update($req);

        return response()->json($review, 200);
    }

    public function delete(Review $review)
    {
        $review->delete();

        return response()->json(null, 204);
    }

    private function aggregate($filter)
    {
        $review = Review::where('status', 1);
        if (isset($filter['product'])) {
            $review->where('product', '=', $filter['product']);
        }
        if (isset($filter['vote']) && $filter['vote'] <> ''  ) {
            $review->where('vote', '=', $filter['vote']);
        }
        if (isset($filter['recommend']) && $filter['recommend'] <> ''  ) {
             $review->where('recommend', '=', $filter['recommend']);
        }

        if ($filter['operation'] == 'c') {
            return $review->count();
        } else if($filter['operation'] == 'a'){
            return $review->avg('vote');
        }
    }

    public function helpful(Request $request){
        Review::where('id',$request->id)->increment('helpful',1);
        return response()->json(Review::where('id',$request->id)->first(),200);
    }
    public function nohelpful(Request $request){
        Review::where('id',$request->id)->increment('nohelpful',1);
        return response()->json(Review::where('id',$request->id)->first(),200);
    }


    public function grid(Request $request)
    {
        if(isset($request->product)) {
            $review = array();
            foreach ($request->product as $product)
                $review[$product] = array();

            $rev = Review::where('status', 1)->whereIn('product', $request->product);
            foreach ($rev->get() as $r) {
                $filter = array();
                $filter['product'] = $r->product;
                $filter['operation'] = 'a';
                $review[$r->product]['avg_rating'] = number_format($this->aggregate($filter), 2);
                $filter['operation'] = 'c';
                $review[$r->product]['total_reviews'] = number_format($this->aggregate($filter), 2);
            }
            return response()->json($review, 200);
        } else {
            abort(404);
        }
    }

    public function HTMLBLOCK(Request $request){
      $html = '';
      $status = '';
      $review = Review::where('id',$request->id)->first();
      if($review->staus) {
        $status= 'Active';
      } else {
        $status= 'Non active';
      }
      $html .= '<div class="row">
          <div class="col-md-3">Title</div>
          <div class="col-md-9">'.$review->title.'</div>
      </div><div class="row">
          <div class="col-md-3">Comment</div>
          <div class="col-md-9">'.$review->review.'</div>
      </div><div class="row">
          <div class="col-md-3">Location</div>
          <div class="col-md-9">'.$review->location.'</div>
      </div><div class="row">
          <div class="col-md-3">Email</div>
          <div class="col-md-9">'.$review->email.'</div>
      </div><div class="row">
          <div class="col-md-3">Overall Rating</div>
          <div class="col-md-9">'.$review->vote.'<icon class="fa fa-star"></i></div>
      </div><div class="row">
          <div class="col-md-3">Quality Rating</div>
          <div class="col-md-9">'.$review->quality_vote.'<icon class="fa fa-star"></i></div>
      </div><div class="row">
          <div class="col-md-3">Performance Rating</div>
          <div class="col-md-9">'.$review->performance_vote.'<icon class="fa fa-star"></i></div>
      </div><div class="row">
          <div class="col-md-3">Features Rating</div>
          <div class="col-md-9">'.$review->features_vote.'<icon class="fa fa-star"></i></div>
          </div><div class="row">
              <div class="col-md-3">Recommeds</div>
              <div class="col-md-9">'.$review->recommend.'<icon class="fa fa-star"></i></div>
              </div><div class="row">
                  <div class="col-md-3">Status</div>
                  <div class="col-md-9">'.$status.'<icon class="fa fa-star"></i></div>
                  </div><div class="row">
                      <div class="col-md-3">Helpful</div>
                      <div class="col-md-9">'.$review->helpful.'</div>
                      </div><div class="row">
                          <div class="col-md-3">Non Helpful</div>
                          <div class="col-md-9">'.$review->nohelpful.'</div>
                          </div><div class="row">
                              <div class="col-md-3">Created at</div>
                              <div class="col-md-9">'.date('d M Y',strtotime($review->created_at)).'</div>
                              </div>';

            $json['html'] =  $html;
            echo json_encode($json);
    }

    function GetAllReviews(Request $request){
      $per_page = 15;
      if($request->page <> null) {
          $currentPage =  $request->page;
          Paginator::currentPageResolver(function () use ($currentPage) {
              return $currentPage;
          });
      }
      if($request->name <> ""){
          $reviews = Review::where('name','like','%'.$request->name.'%')->Orderby('id','desc')->paginate($per_page);
        } else {
          $reviews = Review::Orderby('id','desc')->paginate($per_page);
        }
        return response()->json($reviews, 200);

    }
}
