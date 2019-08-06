<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $review['5star'] = $this->aggregate($filter);
        $filter['vote'] = 4 ;
        $review['4star'] = $this->aggregate($filter);
        $filter['vote'] = 3 ;
        $review['3star'] = $this->aggregate($filter);
        $filter['vote'] = 2 ;
        $review['2star'] = $this->aggregate($filter);
        $filter['vote'] = 1 ;
        $review['1star'] = $this->aggregate($filter);
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
        $review->update($request->all());

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

        if ($filter['operation'] == 'c') {
            return $review->count();
        } else if($filter['operation'] == 'a'){
            return $review->avg('vote');
        }
    }
}
