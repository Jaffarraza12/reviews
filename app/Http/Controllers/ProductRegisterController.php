<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\ProductRegister;

class ProductRegisterController extends Controller
{
    //
    public function store(Request $request)
    {
        $pr= ProductRegister::create($request->all());
        return response()->json($pr, 200);
    }
}
