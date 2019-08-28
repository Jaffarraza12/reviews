<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Complain;

class ComplainController extends Controller
{
    //
    public function store(Request $request)
    {
        $complain = Complain::create($request->all());
        return response()->json($complain, 200);
    }
}
